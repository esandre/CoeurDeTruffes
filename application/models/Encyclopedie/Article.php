<?php

abstract class Application_Model_Encyclopedie_Article {

    protected $_localeLanguageTable;
    protected $_encyclopedieArticleTable;
    protected $_encyclopedieArticleTranslateTable;

    protected $_encyclopedieArticleId;
    protected $_overridesActiveField;

    protected $_id;
    protected $_date;
    protected $_active;

    public function __construct($setId, $overridesActiveField = false) {

        $this->_encyclopedieArticleId = $setId;
        $this->_overridesActiveField = (bool) $overridesActiveField;

        if(empty($this->_encyclopedieArticleId)){
            throw new Application_Model_Exception("Article Set ID is empty");
        }

        try{
            $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
            $this->_encyclopedieArticleTable = new Application_Model_DbTable_Encyclopedie_Article();
            $this->_encyclopedieArticleTranslateTable = new Application_Model_DbTable_Encyclopedie_Article_Translate();

            $this->_refresh();

        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new Model_Encyclopedie_Article", null, $e);
        }
    }

    protected abstract function _refresh();

    public static abstract function fetchAll($overridesActiveField);

    public function getId($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_id;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article ID", null, $e);
        }
    }

    public function getDate($mask = "dd/MM/yyyy hh:mm", $refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_date->toString($mask);
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Date", null, $e);
        }
    }

    public function getActive($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_active;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Active status", null, $e);
        }
    }
}