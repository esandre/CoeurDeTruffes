<?php

/**
 * Description of IndexController
 *
 * @author kryzaal
 */
class Backend_IndexController extends Zend_Controller_Action{
    
    public function indexAction()
    {
        $session = new Zend_Session_Namespace;
        $this->view->groupName = $session->currentUser['group']['name'];
        $this->view->links = array();
        switch($this->view->groupName)
        {
            case "admin":
                $this->view->links ["Ajouter un utilisateur"] = $this->getFrontController()
                                                        ->getRouter()
                                                        ->assemble(array(
                                                            'module' => 'backend',
                                                            'controller' => 'login',
                                                            'action' => 'adduser'));
                $this->view->links ["Modifier un utilisateur"] = $this->getFrontController()
                                                        ->getRouter()
                                                        ->assemble(array(
                                                            'module' => 'backend',
                                                            'controller' => 'login',
                                                            'action' => 'modifyuser'));
            case "intervenant":
                $this->view->links ["Bannir un utilisateur"] = $this->getFrontController()
                                                        ->getRouter()
                                                        ->assemble(array(
                                                            'module' => 'backend',
                                                            'controller' => 'login',
                                                            'action' => 'banlist'));
                break;
        }
    }
}