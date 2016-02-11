<?php

class Application_Model_Encyclopedie_Article_Multilang extends Application_Model_Encyclopedie_Article {

    private $_contents = array();

    public function __construct($setId, $overridesActiveField = false) {
        try{
            parent::__construct($setId, $overridesActiveField);

        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new Model_Encyclopedie_Article_Multilang", null, $e);
        }
    }

    protected function _refresh() {
        try{
            if(!$this->_encyclopedieArticleTable->exists($this->_encyclopedieArticleId)){
                throw new Application_Model_Exception("Article Set " . $this->_encyclopedieArticleId . " does not exists in the Db");
            }

            if(!$this->_encyclopedieArticleTable->isActive($this->_encyclopedieArticleId) && !$this->_overridesActiveField){
                throw new Application_Model_Exception("Article Set " . $this->_encyclopedieArticleId . " is not active in the Db");
            }

            $aboutRow = $this->_encyclopedieArticleTable->get($this->_encyclopedieArticleId);

            $this->_id = $aboutRow['id'];
            $this->_date = new Zend_Date($aboutRow['date'], "yyyy-MM-dd hh:mm:ss");
            $this->_active = $aboutRow['active'];

            if(empty($this->_date)){
                throw new Application_Model_Exception
                        ("Article Date empty for locale {$this->_localeCode} and Article set {$this->_encyclopedieArticleId}");
            }

            $availableTranslates = $this->_encyclopedieArticleTranslateTable->getByArticleId($this->_encyclopedieArticleId);
            foreach($availableTranslates as $translate){
                $this->_contents[$translate['locale']] = array(
                    "id" => $translate['id'],
                    "titre" => $translate['titre'],
                    "text" => $translate['text']
                );
            }

        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't refresh Data for this Article model.", null, $e);
        }
    }

    public static function fetchAll($overridesActiveField){
        $table = new Application_Model_DbTable_Encyclopedie_Article();

        if($overridesActiveField){
            $tableContent = $table->fetchAll();
        } else {
            $select = $table->select();
            $select->where('active = 1');
            $tableContent = $table->fetchAll($select);
        }

        $articles = array();
        foreach($tableContent as $article) {
            $articles[] = new self($article['id'], $overridesActiveField);
        }
        return $articles;
    }

    public function getText($locale, $refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            if(!array_key_exists($locale, $this->_contents)) {
                return '';
            }
            return $this->_contents[$locale]['text'];
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Text for locale $locale", null, $e);
        }
    }

    public function getTitre($locale, $refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            if(!array_key_exists($locale, $this->_contents)) {
                return '';
            }
            return $this->_contents[$locale]['titre'];
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Titre for locale $locale", null, $e);
        }
    }

    public function getTranslateId($locale, $refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_contents[$locale]['id'];
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article id for locale $locale", null, $e);
        }
    }
}