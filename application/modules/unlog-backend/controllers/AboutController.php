<?php

class UnlogBackend_AboutController extends Zend_Controller_Action {

    private function _getParams() {
        $params = $this->getRequest()->getParams();
        if (empty($params)) {
            throw new Zend_Controller_Request_Exception("Parameters provided are empty");
        }
        return $params;
    }

    public function indexAction() {
        try {

            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png"
            ));

        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | index", null, $e);
        }
    }

    public function aboutAction() {
        try {
            $latest = Application_Model_About_About_Multilang::getLatest();
            $locales = new Application_Model_DbTable_Locale_Language();

            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
                "modifButton" => "img_button_modif_png",
                "addButton" => "img_button_add_png",
            ));

            $this->view->actual = $latest;
            $this->view->locales = $locales->getList();
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | about", null, $e);
        }
    }

    public function addAboutAction() {

        $params = $this->_getParams();

        /**
         * Savoir si on crée un set neuf ou si l'on souhaite partir du set actuel
         */
        if (empty($params['scratch'])) {
            $params['scratch'] = false;
        }

        try {
            $form = new Form_Unlog_Backend_About_About_Add();
            $formName = "Form_Unlog_Backend_About_About_Add_";
            $locales = new Application_Model_DbTable_Locale_Language();

            if(!$params['scratch'] && empty($params[$formName . 'Submit'])) {

                $latest = Application_Model_About_About_Multilang::getLatest();
                $params[$formName . 'Date'] = $latest->getDate()->toString("dd/MM/yyyy hh:mm");
                $params[$formName . 'Active'] = $latest->getActive();

                foreach($locales->getList() as $locale) {
                    $params[$formName . 'Text_' . $locale] =
                        $latest->getText($locale);
                }

                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && !$form->isValid($params)) {
                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && $form->isValid($params)) {

                $data = new Application_Model_About_About_Writer_Data
                    ($params[$formName . 'Date'],$params[$formName . 'Active']);

                foreach($params as $key => $param) {
                    if(preg_match("#^{$formName}Text_#", $key)){
                        $localeCode = substr($key, strlen($formName . "Text_"));
                        $data->addLocale($localeCode, $params[$formName . 'Text_' . $localeCode]);
                    }
                }

                $writer = new Application_Model_About_About_Writer();

                $writer->insert($data);
                $this->_forward(
                    "about",
                    "about",
                    "unlog-backend"
                );
            }

            $this->view->form = $form;
            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
            ));
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | about", null, $e);
        }
    }

    public function fonctionnementAction() {
        try {
            $latest = Application_Model_About_Fonctionnement_Multilang::getLatest();
            $locales = new Application_Model_DbTable_Locale_Language();

            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
                "modifButton" => "img_button_modif_png",
                "addButton" => "img_button_add_png",
            ));

            $this->view->actual = $latest;
            $this->view->locales = $locales->getList();
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | fonctionnement", null, $e);
        }
    }

    public function addFonctionnementAction() {
        $params = $this->_getParams();

        /**
         * Savoir si on crée un set neuf ou si l'on souhaite partir du set actuel
         */
        if (empty($params['scratch'])) {
            $params['scratch'] = false;
        }

        try {
            $form = new Form_Unlog_Backend_About_Fonctionnement_Add();
            $formName = "Form_Unlog_Backend_About_Fonctionnement_Add_";
            $locales = new Application_Model_DbTable_Locale_Language();

            if(!$params['scratch'] && empty($params[$formName . 'Submit'])) {

                $latest = Application_Model_About_Fonctionnement_Multilang::getLatest();
                $params[$formName . 'Date'] = $latest->getDate()->toString("dd/MM/yyyy hh:mm");
                $params[$formName . 'Active'] = $latest->getActive();

                foreach($locales->getList() as $locale) {
                    $params[$formName . 'Text_' . $locale] =
                        $latest->getText($locale);
                }

                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && !$form->isValid($params)) {
                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && $form->isValid($params)) {

                $data = new Application_Model_About_Fonctionnement_Writer_Data
                    ($params[$formName . 'Date'],$params[$formName . 'Active']);

                foreach($params as $key => $param) {
                    if(preg_match("#^{$formName}Text_#", $key)){
                        $localeCode = substr($key, strlen($formName . "Text_"));
                        $data->addLocale($localeCode, $params[$formName . 'Text_' . $localeCode]);
                    }
                }

                $writer = new Application_Model_About_Fonctionnement_Writer();

                $writer->insert($data);
                $this->_forward(
                    "fonctionnement",
                    "about",
                    "unlog-backend"
                );
            }

            $this->view->form = $form;
            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
            ));
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | fonctionnement", null, $e);
        }
    }

    public function legalAction() {
        try {
            $latest = Application_Model_About_Legal_Multilang::getLatest();
            $locales = new Application_Model_DbTable_Locale_Language();

            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
                "modifButton" => "img_button_modif_png",
                "addButton" => "img_button_add_png",
            ));

            $this->view->actual = $latest;
            $this->view->locales = $locales->getList();
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | legal", null, $e);
        }
    }

    public function addLegalAction() {
        $params = $this->_getParams();

        /**
         * Savoir si on crée un set neuf ou si l'on souhaite partir du set actuel
         */
        if (empty($params['scratch'])) {
            $params['scratch'] = false;
        }

        try {
            $form = new Form_Unlog_Backend_About_Legal_Add();
            $formName = "Form_Unlog_Backend_About_Legal_Add_";
            $locales = new Application_Model_DbTable_Locale_Language();

            if(!$params['scratch'] && empty($params[$formName . 'Submit'])) {

                $latest = Application_Model_About_Legal_Multilang::getLatest();
                $params[$formName . 'Date'] = $latest->getDate()->toString("dd/MM/yyyy hh:mm");
                $params[$formName . 'Active'] = $latest->getActive();

                foreach($locales->getList() as $locale) {
                    $params[$formName . 'Text_' . $locale] =
                        $latest->getText($locale);
                }

                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && !$form->isValid($params)) {
                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && $form->isValid($params)) {

                $data = new Application_Model_About_Legal_Writer_Data
                    ($params[$formName . 'Date'],$params[$formName . 'Active']);

                foreach($params as $key => $param) {
                    if(preg_match("#^{$formName}Text_#", $key)){
                        $localeCode = substr($key, strlen($formName . "Text_"));
                        $data->addLocale($localeCode, $params[$formName . 'Text_' . $localeCode]);
                    }
                }

                $writer = new Application_Model_About_Legal_Writer();

                $writer->insert($data);
                $this->_forward(
                    "legal",
                    "about",
                    "unlog-backend"
                );
            }

            $this->view->form = $form;
            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
            ));
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | legal", null, $e);
        }
    }

    public function cgvAction() {
        try {
            $latest = Application_Model_About_Cgv_Multilang::getLatest();
            $locales = new Application_Model_DbTable_Locale_Language();

            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
                "modifButton" => "img_button_modif_png",
                "addButton" => "img_button_add_png",
            ));

            $this->view->actual = $latest;
            $this->view->locales = $locales->getList();
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | cgv", null, $e);
        }
    }

    public function addCgvAction() {
        $params = $this->_getParams();

        /**
         * Savoir si on crée un set neuf ou si l'on souhaite partir du set actuel
         */
        if (empty($params['scratch'])) {
            $params['scratch'] = false;
        }

        try {
            $form = new Form_Unlog_Backend_About_Cgv_Add();
            $formName = "Form_Unlog_Backend_About_Cgv_Add_";
            $locales = new Application_Model_DbTable_Locale_Language();

            if(!$params['scratch'] && empty($params[$formName . 'Submit'])) {

                $latest = Application_Model_About_Cgv_Multilang::getLatest();
                $params[$formName . 'Date'] = $latest->getDate()->toString("dd/MM/yyyy hh:mm");
                $params[$formName . 'Active'] = $latest->getActive();

                foreach($locales->getList() as $locale) {
                    $params[$formName . 'Text_' . $locale] =
                        $latest->getText($locale);
                }

                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && !$form->isValid($params)) {
                $form->populate($params);
            } elseif (!empty($params[$formName . 'Submit']) && $form->isValid($params)) {

                $data = new Application_Model_About_Cgv_Writer_Data
                    ($params[$formName . 'Date'],$params[$formName . 'Active']);

                foreach($params as $key => $param) {
                    if(preg_match("#^{$formName}Text_#", $key)){
                        $localeCode = substr($key, strlen($formName . "Text_"));
                        $data->addLocale($localeCode, $params[$formName . 'Text_' . $localeCode]);
                    }
                }

                $writer = new Application_Model_About_Cgv_Writer();

                $writer->insert($data);
                $this->_forward(
                    "cgv",
                    "about",
                    "unlog-backend"
                );
            }

            $this->view->form = $form;
            $this->view->resources = Application_Model_Resources::get(array(
                "returnButton" => "img_button_return_png",
            ));
        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | about | cgv", null, $e);
        }
    }
}