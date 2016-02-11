<?php

/**
 * Controller gérant toute la partie encyclopedie sur la truffe.
 *
 * @author kryzaal
 */
class Frontend_EncyclopedieController extends App_Controller_Action{
    
    public function indexAction()
    {
        $params = $this->getRequest()->getParams();
        $id = 1;
        
        $this->view->articleId = $id;
    }
    
    public function listeAction()
    {
        $this->view->layout = false;
        $limit = $this->getRequest()->getParam('limit');
        $model = new Application_Model_Logic_EncyclopedieMapper;
        $articles = $model->getShort();
        unset($model);
        $newArticles = array();
        for($i=0;$i<$limit;$i++){
            if(count($articles))
            {
                $id = array_rand($articles);
                $newArticles[]= $articles[$id]->__toArray();
                unset($articles[$id]);
            }
            else $newArticles[]= null;
        }
        $this->view->list = $newArticles;
    }
    
    public function afficherAction()
    {
        $id = $this->getRequest()->getParam('id');
        if(empty($id)) $this->_redirect('frontend','encyclopedie','index');
        $this->view->layout = false;
        
        $mapper = new Application_Model_Logic_EncyclopedieMapper;
        $model = new Application_Model_Logic_Encyclopedie;
        
        $mapper->find($id, $model);
        $this->view->article = $model->__toArray();
        
        if(!$this->getRequest()->getParam('partial') == 1)
        {
            $session = new Zend_Session_Namespace;
            $lang = "text_".$session->locale;
            $this->view->article['text'] = $this->view->article[$lang];
        }
        unset($this->view->article['text_fr'],$this->view->article['text_en'],$this->view->article['text_cn']);
        
    }
}