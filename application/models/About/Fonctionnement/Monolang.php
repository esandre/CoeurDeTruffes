<?php

class Application_Model_About_Fonctionnement_Monolang extends Application_Model_About_Fonctionnement {

    private $_localeCode;
    protected $_text;
    protected $_locale;

    public function __construct($setId, $locale, $overridesActiveField = false) {

        $this->_localeCode = $locale;

        if (empty($this->_localeCode)) {
            throw new Application_Model_Exception("Locale Code is empty");
        }

        try {
            parent::__construct($setId, $overridesActiveField);
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new " . __CLASS__, null, $e);
        }
    }

    protected function _refresh() {
        try {
            if (!$this->_localeLanguageTable->exists($this->_localeCode)) {
                throw new Application_Model_Exception("Locale " . $this->_localeCode . " does not exists in the Db");
            }

            if (!$this->_setTable->exists($this->_setId)) {
                throw new Application_Model_Exception("{$this->_entityName} Set " . $this->_setId . " does not exists in the Db");
            }

            if (!$this->_setTable->isActive($this->_setId) && !$this->_overridesActiveField) {
                throw new Application_Model_Exception("{$this->_entityName} Set " . $this->_setId . " is not active in the Db");
            }

            $TrRow = $this->_translateTable->getByFonctionnementIdAndLocale($this->_setId, $this->_localeCode);
            $Row = $this->_setTable->get($this->_setId);

            $this->_id = $TrRow['id'];
            $this->_locale = $this->_localeCode;
            $this->_text = $TrRow['text'];
            $this->_date = new Zend_Date($Row['date'], "yyyy-MM-dd hh:mm:ss");
            $this->_active = $Row['active'];

            if (empty($this->_text)) {
                throw new Application_Model_Exception
                        ("{$this->_entityName} Text empty for locale {$this->_localeCode} and {$this->_entityName} set {$this->_setId}");
            }

            if (empty($this->_date)) {
                throw new Application_Model_Exception
                        ("{$this->_entityName} Date empty for locale {$this->_localeCode} and {$this->_entityName} set {$this->_setId}");
            }
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't refresh Data for this {$this->_entityName} model.", null, $e);
        }
    }

    public static function fetchAll($overridesActiveField) {
        $translateTable = new Application_Model_DbTable_About_Fonctionnement_Translate();
        if ($overridesActiveField) {
            $translateTableContent = $translateTable->fetchAll();
        } else {
            $select = $translateTable->select();
            $select->where('active = 1');
            $translateTableContent = $translateTable->fetchAll($select);
        }
        $articles = array();
        foreach ($translateTableContent as $article) {
            $articles[] = new self($article['article_id'], $article['locale'], $overridesActiveField);
        }
        return $articles;
    }

    public static function getLatestByLocale($locale){
        try{
            $cgvSet = new Application_Model_DbTable_About_Fonctionnement();
            $id = $cgvSet->getLatestId();

            $model =  new self($id, $locale);
            if(!$model instanceof self){
                throw new Application_Model_Exception("Can't create a Fonctionnement Model Object");
            } else {
                return $model;
            }
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get latest Fonctionnement for locale $locale", null, $e);
        }
    }

    public function getText($refresh = false) {
        try {
            if ($refresh) {
                $this->_refresh();
            }
            return $this->_text;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get {$this->_entityName} Text", null, $e);
        }
    }

    public function getLocale($refresh = false) {
        try {
            if ($refresh) {
                $this->_refresh();
            }
            return $this->_locale;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get {$this->_entityName} Locale", null, $e);
        }
    }

}