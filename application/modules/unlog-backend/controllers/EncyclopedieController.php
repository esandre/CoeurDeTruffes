<?php

class UnlogBackend_EncyclopedieController extends Zend_Controller_Action{

    public function indexAction() {

        try {

            $this->view->heads = $this->_indexGetHeads();
            $this->view->content = Application_Model_Encyclopedie_Article_Multilang::fetchAll(true);
            $this->view->resources = Application_Model_Resources::get(array(
                "modifButton" => "img_button_modif_png",
                "deleteButton" => "img_button_delete_png",
                "activateButton" => "img_button_activate_png",
                "desactivateButton" => "img_button_desactivate_png",
                "addButton" => "img_button_add_png",
                "returnButton" => "img_button_return_png"
            ));

        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception("Error in Action : unlog-backend | encyclopedie | index", null, $e);
        }

    }

    /**
     *  Renvoie les titres nécessaires a la balise thead
     *  @return array
     */
    private function _indexGetHeads(){
        $localesModel = new Application_Model_DbTable_Locale_Language();
        $locales = $localesModel->getList();
        unset($localesModel);

        $heads = array(
            "actions" => "Actions",
            "date" => "Date de parution",
            "active" => "Visible"
        );
        foreach ($locales as $locale) {
            $title = "Titre $locale";
            $text = "Texte $locale";
            $heads['titre_' . $locale] = $title;
            $heads['text_' . $locale] = $text;
        }
        return $heads;
    }

    public function addArticleAction() {
        $params = $this->getRequest()->getParams();

        try{
            $form = new Form_Unlog_Backend_Encyclopedie_Article_Add();
            $form->populate($params);

            if(!empty($params['Form_Unlog_Backend_Encyclopedie_Article_Add_Submit']) && $form->isValid($params)) {

                $data = new Application_Model_Encyclopedie_Article_Writer_Data(
                        $params['Form_Unlog_Backend_Encyclopedie_Article_Add_Date'],
                        $params['Form_Unlog_Backend_Encyclopedie_Article_Add_Active']
                        );

                foreach($params as $key => $param) {
                    if(preg_match("#^Form_Unlog_Backend_Encyclopedie_Article_Add_Titre_#", $key)){
                        $localeCode = substr($key, strlen("Form_Unlog_Backend_Encyclopedie_Article_Add_Titre_"));
                        $data->addLocale($localeCode, $param, $params['Form_Unlog_Backend_Encyclopedie_Article_Add_Text_' . $localeCode]);
                    }
                }

                $model = new Application_Model_Encyclopedie_Article_Writer();
                $model->insert($data);
                $this->_forward("index", "encyclopedie", "unlog-backend");
            }
            $this->view->form = $form;

        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception
                    ("Error in Action : unlog-backend | encyclopedie | addArticle", null, $e);
        }
    }

    public function delArticleAction() {
        $params = $this->getRequest()->getParams();

        try{

            $form = new Form_Unlog_Backend_Encyclopedie_Article_Delete();
            $form->populate($params);

            if(!empty($params['Form_Unlog_Backend_Encyclopedie_Article_Delete_Yes']) &&
                $params['Form_Unlog_Backend_Encyclopedie_Article_Delete_Yes'] == "Oui") {

                $model = new Application_Model_Encyclopedie_Article_Writer();
                $model->delete($params['id']);

                $this->_forward("index", "encyclopedie", "unlog-backend");
            } elseif(!empty($params['Form_Unlog_Backend_Encyclopedie_Article_Delete_No']) &&
                $params['Form_Unlog_Backend_Encyclopedie_Article_Delete_No'] == "Non") {
                $this->_forward("index", "encyclopedie", "unlog-backend");
            }
            $this->view->form = $form;

        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception
                    ("Error in Action : unlog-backend | encyclopedie | addArticle", null, $e);
        }
    }

    public function modifArticleAction() {
        $params = $this->getRequest()->getParams();

        try{

            $form = new Form_Unlog_Backend_Encyclopedie_Article_Modif();

            if(empty($params['Form_Unlog_Backend_Encyclopedie_Article_Modif_Submit'])) {
                $source = new Application_Model_DbTable_Encyclopedie_Article_Translate();
                $rows = $source->getByArticleId($params['id']);
                foreach($rows as $row){
                    $params['Form_Unlog_Backend_Encyclopedie_Article_Modif_Titre_' . $row['locale']] =
                        $row['titre'];

                    $params['Form_Unlog_Backend_Encyclopedie_Article_Modif_Text_' . $row['locale']] =
                        $row['text'];
                }
            }

            $form->populate($params);

            if(!empty($params['Form_Unlog_Backend_Encyclopedie_Article_Modif_Submit']) && $form->isValid($params)) {

                $data = new Application_Model_Encyclopedie_Article_Writer_Data("01/01/2000 10:10", 0);

                foreach($params as $key => $param) {
                    if(preg_match("#^Form_Unlog_Backend_Encyclopedie_Article_Modif_Titre_#", $key)){
                        $localeCode = substr($key, strlen("Form_Unlog_Backend_Encyclopedie_Article_Modif_Titre_"));
                        $data->addLocale($localeCode, $param, $params['Form_Unlog_Backend_Encyclopedie_Article_Modif_Text_' . $localeCode]);
                    }
                }

                $model = new Application_Model_Encyclopedie_Article_Writer();
                $model->update($params['id'], $data);
                $this->_forward("index", "encyclopedie", "unlog-backend");
            }
            $this->view->form = $form;

        } catch (Zend_Exception $e) {
            throw new Zend_Controller_Action_Exception
                    ("Error in Action : unlog-backend | encyclopedie | modifArticle", null, $e);
        }
    }

    public function toggleArticleStatusAction() {
        $id = $this->getRequest()->getParam('id');
        $model = new Application_Model_Encyclopedie_Article_Writer();
        $model->toggleActive($id);
        $this->_forward("index", "encyclopedie", "unlog-backend");
    }

}