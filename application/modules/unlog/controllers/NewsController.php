<?php

class Unlog_NewsController extends Zend_Controller_Action{

    public function newsAction() {
        
    }
    
    public function newsJsonAction() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }

        if (empty($params['locale'])) {
            throw new Zend_Controller_Request_Exception("Parameter `locale` is empty");
        }
        
        if (empty($params['limit'])) {
            throw new Zend_Controller_Request_Exception("Parameter `limit` is empty");
        }
        
        if (empty($params['offset'])) {
            $params['offset'] = 0;
        }

        try {
            $models = Application_Model_News::getByOffsetForLocale
                    ($params['locale'], $params['offset'], $params['limit']);
            
            $response = array();
            foreach($models as $model) {
                $response[] = array(
                'titre' => $model->getTitre(),
                'text' => $model->getText(),
                'author' => $model->getAuthor(),
                'locale' => $model->getLocale(),
                'date' => $model->getDate()
                );
            }
            
            if(!empty($response)) {
                $this->view->response = $response;
                $this->view->success = true;
                $this->view->meta = $params;
            } else {
                $this->view->success = false;
                $this->view->meta = array("error" => "Empty News set");
            }
            
            unset($model);
        } catch (Application_Model_DbTable_Exception $e) {
            $this->view->success = false;
            $this->view->meta = array("error" => $e->getMessage());
        }
    }
}