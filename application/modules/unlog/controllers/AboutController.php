<?php

class Unlog_AboutController extends Zend_Controller_Action {

    public function aboutAction() {

    }

    public function aboutJsonAction() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }

        if (empty($params['locale'])) {
            throw new Zend_Controller_Request_Exception("Parameter `locale` is empty");
        }

        try {
            $model = Application_Model_About_About_Monolang::getLatestByLocale($params['locale']);
            $this->view->response = array(
                'text' => $model->getText(),
                'locale' => $model->getLocale(),
                'date' => $model->getDate()->toString('dd/MM/yyyy hh:mm')
            );
            $this->view->success = true;
            $this->view->meta = $params;
            unset($model);
        } catch (Application_Model_DbTable_Exception $e) {
            $this->view->success = false;
            $this->view->meta = array("error" => $e->getMessage());
        }
    }

    public function fonctionnementAction() {

    }

    public function fonctionnementJsonAction() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }

        if (empty($params['locale'])) {
            throw new Zend_Controller_Request_Exception("Parameter `locale` is empty");
        }

        try {
            $model = Application_Model_About_Fonctionnement_Monolang::getLatestByLocale($params['locale']);
            $this->view->response = array(
                'text' => $model->getText(),
                'locale' => $model->getLocale(),
                'date' => $model->getDate()->toString('dd/MM/yyyy hh:mm')
            );
            $this->view->success = true;
            $this->view->meta = $params;
            unset($model);
        } catch (Application_Model_DbTable_Exception $e) {
            $this->view->success = false;
            $this->view->meta = array("error" => $e->getMessage());
        }
    }

    public function legalAction() {

    }

    public function legalJsonAction() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }

        if (empty($params['locale'])) {
            throw new Zend_Controller_Request_Exception("Parameter `locale` is empty");
        }

        try {
            $model = Application_Model_About_Legal_Monolang::getLatestByLocale($params['locale']);
            $this->view->response = array(
                'text' => $model->getText(),
                'locale' => $model->getLocale(),
                'date' => $model->getDate()->toString('dd/MM/yyyy hh:mm')
            );
            $this->view->success = true;
            $this->view->meta = $params;
            unset($model);
        } catch (Application_Model_DbTable_Exception $e) {
            $this->view->success = false;
            $this->view->meta = array("error" => $e->getMessage());
        }
    }

    public function cgvAction() {

    }

    /**
     * Récupére les données nécessaires a l'affichage des CGV pour une locale donnée
     * @param locale : La locale demandée, passée en POST
     * @throws Zend_Controller_Request_Exception
     * @throws Application_Model_Exception
     */
    public function cgvJsonAction() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }

        if (empty($params['locale'])) {
            throw new Zend_Controller_Request_Exception("Parameter `locale` is empty");
        }

        try {
            $model = Application_Model_About_Cgv_Monolang::getLatestByLocale($params['locale']);
            $this->view->response = array(
                'text' => $model->getText(),
                'locale' => $model->getLocale(),
                'date' => $model->getDate()->toString('dd/MM/yyyy hh:mm')
            );
            $this->view->success = true;
            $this->view->meta = $params;
            unset($model);
        } catch (Application_Model_DbTable_Exception $e) {
            $this->view->success = false;
            $this->view->meta = array("error" => $e->getMessage());
        }
    }

    public function planAction() {

    }

    public function planJsonAction() {

    }

}