<?php

class Secure_LoginController extends Zend_Controller_Action {

    public function loginJsonAction() {
        $session = new Zend_Session_Namespace();

        $this->view->response = array("is_log" => !empty($session->login['login']));
        $this->view->success = true;
    }

    public function adminJsonAction() {

    }

}