<?php

abstract class Application_Model_About_Fonctionnement {

    /**
     * Nom d'un élément, utilisé dans les exceptions surtout
     * @var string
     */
    protected $_entityName = "Fonctionnement";

    protected $_localeLanguageTable;
    protected $_setTable;
    protected $_translateTable;
    protected $_setId;

    protected $_id;
    protected $_date;
    protected $_active;

    public function __construct($setId, $overridesActiveField = false) {

        $this->_setId = $setId;

        if(empty($this->_setId)){
            throw new Application_Model_Exception("{$this->_entityName} Set ID is empty");
        }

        try{
            $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
            $this->_setTable = new Application_Model_DbTable_About_Fonctionnement();
            $this->_translateTable = new Application_Model_DbTable_About_Fonctionnement_Translate();

            $this->_refresh();

        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new " . __CLASS__, null, $e);
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
            throw new Application_Model_Exception("Can't get {$this->_entityName} ID", null, $e);
        }
    }

    public function getDate($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_date;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get {$this->_entityName} Date", null, $e);
        }
    }

    public function getActive($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_active;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get {$this->_entityName} active status", null, $e);
        }
    }
}