<?php

class Application_Model_About_About_Multilang extends Application_Model_About_About {

    private $_contents = array();

    public function __construct($setId, $overridesActiveField = false) {
        try {
            parent::__construct($setId, $overridesActiveField);
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new " . __CLASS__, null, $e);
        }
    }

    protected function _refresh() {
        try {
            if (!$this->_setTable->exists($this->_setId)) {
                throw new Application_Model_Exception
                        ("{$this->_entityName} Set " . $this->_setId . " does not exists in the Db");
            }

            if (!$this->_setTable->isActive($this->_setId) && !$this->_overridesActiveField) {
                throw new Application_Model_Exception
                        ("{$this->_entityName} Set " . $this->_setId . " is not active in the Db");
            }

            $aboutRow = $this->_setTable->get($this->_setId);

            $this->_id = $aboutRow['id'];
            $this->_date = new Zend_Date($aboutRow['date'], "yyyy-MM-dd hh:mm:ss");
            $this->_active = $aboutRow['active'];

            if (empty($this->_date)) {
                throw new Application_Model_Exception
                        ("{$this->_entityName} Date empty for locale {$this->_localeCode} and {$this->_entityName} set {$this->_setId}");
            }

            $availableTranslates = $this->_translateTable->getByAboutId($this->_setId);
            foreach ($availableTranslates as $translate) {
                $this->_contents[$translate['locale']] = array(
                    "id" => $translate['id'],
                    "text" => $translate['text']
                );
            }
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't refresh Data for this {$this->_entityName} model.", null, $e);
        }
    }

    public static function fetchAll($overridesActiveField) {
        $table = new Application_Model_DbTable_About_About();

        if ($overridesActiveField) {
            $tableContent = $table->fetchAll();
        } else {
            $select = $table->select();
            $select->where('active = 1');
            $tableContent = $table->fetchAll($select);
        }

        $articles = array();
        foreach ($tableContent as $article) {
            $articles[] = new self($article['id'], $overridesActiveField);
        }
        return $articles;
    }

    /**
     * Renvoie le plus récent
     * @return Application_Model_About_About_Multilang
     * @throws Application_Model_Exception
     */
    public static function getLatest(){
        try{
            $cgvSet = new Application_Model_DbTable_About_About();
            $id = $cgvSet->getLatestId();

            $model =  new self($id);
            if(!$model instanceof self){
                throw new Application_Model_Exception("Can't create an About Model Object");
            } else {
                return $model;
            }
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get latest About", null, $e);
        }
    }

    public function getText($locale, $refresh = false) {
        try {
            if ($refresh) {
                $this->_refresh();
            }
            if (!array_key_exists($locale, $this->_contents)) {
                return '';
            }
            return $this->_contents[$locale]['text'];
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get {$this->_entityName} Text for locale $locale", null, $e);
        }
    }

    public function getTranslateId($locale, $refresh = false) {
        try {
            if ($refresh) {
                $this->_refresh();
            }
            return $this->_contents[$locale]['id'];
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get {$this->_entityName} id for locale $locale", null, $e);
        }
    }

}