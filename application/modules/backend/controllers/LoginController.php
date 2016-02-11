<?php

/**
 * Controller gérant toute la partie login admin
 *
 * @author kryzaal
 */
class Backend_LoginController extends Zend_Controller_Action{
    
    public function adduserAction()
    {
        $params = $this->getRequest()->getParams();
        $form = new Form_Backend_Login_AddUser();
        
        if(isset($params['adduser_submit']) && $form->isValid($params))
        {
            try{
                $adresseModel = new Application_Model_Adresse();
                $personneModel = new Application_Model_Personne();
                $loginModel = new Application_Model_Access_Login();
                $userParams = new Application_Model_Virtual_User($adresseModel, $personneModel, $loginModel);
                
                $adresseModel->setLigne_1($params['addr_l1'])
                            ->setLigne_2($params['addr_l2'])
                            ->setCode_Postal($params['postal'])
                            ->setVille($params['ville'])
                            ->setPays($params['country']);
                
                $personneModel->setNom($params['name'])
                            ->setPrenom($params['surname'])
                            ->setAdresseId(0);
                
                $accgMapper = new Application_Model_Access_AccessGroupMapper;
                $loginModel->setLogin($params['login'])
                        ->setPassword($params['password'])
                        ->setAccessGroupId($accgMapper->getIdFromName($params['role']))
                        ->setPersonneId(0);
                unset ($accgMapper);
          
                $this->addUser($userParams);
                
                unset($adresseModel);
                unset($personneModel);
                unset($loginModel);
                unset($userParams);
            }
            catch(Exception $except)
            {
                $this->view->error = $except->getMessage();
            }
        }
        
        $this->view->form = $form;
    }
    
    public function banlistAction()
    {
        $userListMapper = new Application_Model_Access_LoginMapper;
        $userList = $userListMapper->fetchAll();
        unset($userList[0]);
        $banListForm = new Form_Backend_Login_Banlist($userList);
        if(isset($params['banlist_submit']) && $banListForm->isValid($params))
        {
            try{
                $array = array();
                foreach($userList as $user)
                {
                    $array[$user->getId()] = array(
                                                    "ban" => $params["u".$user->getId()],
                                                    "login" => $user->getLogin(),
                                                    "pass" => $user->getPassword(),
                                                    "personne_id" => $user->getPersonneId(),
                                                    "access_grp" => $user->getAccessGroupId(),
                                                );
                }
                $this->processBanList($array);
            }
            catch(Exception $except)
            {
                $this->view->error = $except->getMessage();
            }
        }
        
        $this->view->form = $banListForm;
    }
    
    public function modifyuserAction()
    {
        
    }
    
    public function promptAction()
    {
        $params = $this->getRequest()->getParams();
        $form = new Form_Backend_Login_Prompt;
        
        if(isset($params['prompt_submit']) && $form->isValid($params))
        {
            $return = $this->attemptLogin($params['login'],$params['password']);
            $this->view->error = $return;
        }
        
        $this->view->form = $form;
    }
    
    private function processBanList($array)
    {
        foreach($array as $key => $user)
        {
            $fullEntry = new Application_Model_Access_Login();
            $fullEntry->setId($key)
                    ->setLogin($user['login'])
                    ->setPassword($user['pass'])
                    ->setBan($user['ban'])
                    ->setAccessGroupId($user['access_grp'])
                    ->setPersonneId($user['personne_id']);
            $mapper = new Application_Model_Access_LoginMapper();
            $mapper->save($fullEntry);
        }
    }
    
    /**
     * addUser : Ajoute un utilisateur a la base a partir d'un tableau.
     * 
     * @todo : Permettre la modification de l'user avec la meme methode.
     * 
     * @param type $userParams 
     * @throws Exception $except
     */
    private function addUser(Application_Model_Virtual_User $userParams)
    {
        try{$userParams->valid();}catch(Exception $e){throw $e;}
        
        /**
         * Partie Adresse
         */
        $adresseMapper = new Application_Model_AdresseMapper;
        try{
            $adresseMapper->save($userParams->getAdresse());
            $adresse_id = $adresseMapper->getId($userParams->getAdresse());
            if(empty($adresse_id)) throw new Exception("Insert in table `Adresse` fails !");
        }
        catch(Exception $except)
        {
            throw $except;
        }
        unset ($adresseMapper);      
        
        
        /**
         * Partie Personne
         */
        $personneMapper = new Application_Model_PersonneMapper;
        try{
            $userParams->getPersonne()->setAdresseId($adresse_id);
            $testId = ($personneMapper->getId($userParams->getPersonne()));
            if(!empty($testId)){
                throw new Exception("Another entry exists with the same name");
            }
            $personneMapper->save($userParams->getPersonne());
            $personne_id = $personneMapper->getId($userParams->getPersonne());
            if(empty($personne_id)) throw new Exception("Insert in table `Personne` fails !");
        }
        catch(Exception $except)
        {
            $adresseMapper= new Application_Model_AdresseMapper;
            $adresseMapper->delete($adresse_id);
            unset ($adresseMapper);
            throw $except;
        }
        unset ($personneMapper);
        
        
        /**
         * Partie Login
         */
        $loginMapper = new Application_Model_Access_LoginMapper;
        
        try{
            $userParams->getLogin()->setPersonneId($personne_id);
            $testId = ($loginMapper->getId($userParams->getLogin()));
            if(!empty($testId)){
                throw new Exception("Another entry exists with the same name");
            }
            
            $loginMapper->save($userParams->getLogin());
            $login_id = $loginMapper->getId($userParams->getLogin());
            if(empty($login_id)) throw new Exception("Insert in table `Login` fails !");
        }
        catch(Exception $except)
        {
            $adresseMapper= new Application_Model_AdresseMapper;
            $adresseMapper->delete($adresse_id);
            unset ($adresseMapper);
            $personneMapper = new Application_Model_PersonneMapper;
            $personneMapper->delete($personne_id);
            unset ($personneMapper);
            throw $except;
        }
        unset ($loginMapper);
    }
    
    
    private function attemptLogin($pseudo,$password)
    {
        $model = new Application_Model_Access_LoginMapper;
        
        $return = $model->getByPseudo($pseudo, $password);
        if($return instanceof Application_Model_Access_Login) $this->logAsAdmin ($return);
        else switch($return)
        {
            case "badPseudo":
                return $return;
                break;
            case "badPass":
                return $return;
                break;
            default:
                throw new Exception("Unhandled login error", 1002);
                break;
        }
    }
    
    private function logAsAdmin(Application_Model_Access_Login $model)
    {
        $session = new Zend_Session_Namespace;
        
        $groupMapper = new Application_Model_Access_AccessGroupMapper;
        $group = new Application_Model_Access_AccessGroup;
        $groupMapper->find($model->getAccessGroupId(), $group);
        
        $personneMapper = new Application_Model_PersonneMapper;
        $personne = new Application_Model_Personne;
        $personneMapper->find($model->getPersonneId(), $personne);
        
        $adresseMapper = new Application_Model_AdresseMapper;
        $adresse = new Application_Model_Adresse;
        $adresseMapper->find($personne->getAdresseId(),$adresse);
        
        $session->currentUser = array(
            "id" => $model->getId(),
            "login" => $model->getLogin(),
            "personne" => array(
                "id" => $model->getPersonneId(),
                "nom" => $personne->getNom(),
                "prenom" => $personne->getPrenom(),
                "adresse" => array(
                    "id" => $personne->getAdresseId(),
                    "ligne_1" => $adresse->getLigne_1(),
                    "ligne_2" => $adresse->getLigne_2(),
                    "ville" => $adresse->getVille(),
                    "code_postal" => $adresse->getCode_Postal(),
                    "pays" => $adresse->getPays()
                )
            ),
            "group" => array(
                "id" => $model->getAccessGroupId(),
                "name" => $group->getName()  
            ),
        );
        
        $this->_redirect(
                $this->getFrontController()
                    ->getRouter()
                    ->assemble(array(
                        'module' => 'backend',
                        'controller' => 'index',
                        'action' => 'index')),
                array('prependBase' => false)
        );
    }
}