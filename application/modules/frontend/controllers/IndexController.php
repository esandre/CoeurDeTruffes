<?php

/**
 * Controller gérant la partie non loguée et quasi statique de l'appli
 *
 * @author kryzaal
 * @package Frontend
 */
class Frontend_IndexController extends Zend_Controller_Action
{
    /**
     * Index de Frontend, la page d'acceuil, rien de spécial du texte et des
     * liens vers d'autres pages.
     */
    public function indexAction()
    {
        $router = $this->getFrontController()->getRouter();
        $resourceModel = new Application_Model_Resources_GetResources;
        $resourceList = $resourceModel->getResources('frontend','index','index');
        
        $this->view->links = array(
            "frontend_present_what" => 'go_what',
            "frontend_wiki_index" => 'go_wiki',
        );
    }
    
    /**
     * Descriptions, une sorte de mini encyclopedie sur les truffes
     * @zend_param title string
     */
    public function descriptionAction()
    {
        $title = $this->getParam('title');
        $this->view->title = empty($title)? 'index' : $title; 
    }
    
    public function aboutAction()
    {
        
    }
}