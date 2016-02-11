<?php

class Unlog_EncyclopedieController extends Zend_Controller_Action{
    
    public function articleAction() {
        
    }
    
    public function articleJsonAction() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }

        if (empty($params['locale'])) {
            throw new Zend_Controller_Request_Exception("Parameter `locale` is empty");
        }
        
        if (empty($params['id'])) {
            throw new Zend_Controller_Request_Exception("Parameter `id` is empty");
        }

        try {
            $model = new Application_Model_Encyclopedie_Article_Monolang($params['id'], $params['locale']);
            $this->view->response = array(
                'titre' => $model->getTitre(),
                'text' => $model->getText(),
                'locale' => $model->getLocale(),
                'date' => $model->getDate()
            );
            $this->view->success = true;
            $this->view->meta = $params;
            unset($model);
        } catch (Application_Model_DbTable_Exception $e) {
            $this->view->success = false;
            $this->view->meta = array("error" => $e->getMessage());
        }
    }

}