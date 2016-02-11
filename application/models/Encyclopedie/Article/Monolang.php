<?php

class Application_Model_Encyclopedie_Article_Monolang extends Application_Model_Encyclopedie_Article{

    private $_localeCode;

    protected $_titre;
    protected $_text;
    protected $_locale;

    public function __construct($setId, $locale, $overridesActiveField = false) {

        $this->_localeCode = $locale;

        if(empty($this->_localeCode)){
            throw new Application_Model_Exception("Locale Code is empty");
        }

        try{
            parent::__construct($setId, $overridesActiveField);
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new Model_Encyclopedie_Article_Monolang", null, $e);
        }
    }

    protected function _refresh() {
        try{
            if(!$this->_localeLanguageTable->exists($this->_localeCode)){
                throw new Application_Model_Exception("Locale " . $this->_localeCode . " does not exists in the Db");
            }

            if(!$this->_encyclopedieArticleTable->exists($this->_encyclopedieArticleId)){
                throw new Application_Model_Exception("Article Set " . $this->_encyclopedieArticleId . " does not exists in the Db");
            }

            if(!$this->_encyclopedieArticleTable->isActive($this->_encyclopedieArticleId) && !$this->_overridesActiveField){
                throw new Application_Model_Exception("Article Set " . $this->_encyclopedieArticleId . " is not active in the Db");
            }

            $aboutTrRow = $this->_encyclopedieArticleTranslateTable->getByArticleIdAndLocale($this->_encyclopedieArticleId, $this->_localeCode);
            $aboutRow = $this->_encyclopedieArticleTable->get($this->_encyclopedieArticleId);

            $this->_id = $aboutTrRow['id'];
            $this->_locale = $this->_localeCode;
            $this->_titre = $aboutTrRow['titre'];
            $this->_text = $aboutTrRow['text'];
            $this->_date = new Zend_Date($aboutRow['date'], "yyyy-MM-dd hh:mm:ss");
            $this->_active = $aboutRow['active'];

            if(empty($this->_titre)){
                throw new Application_Model_Exception
                        ("Article Title empty for locale {$this->_localeCode} and Article set {$this->_encyclopedieArticleId}");
            }

            if(empty($this->_text)){
                throw new Application_Model_Exception
                        ("Article Text empty for locale {$this->_localeCode} and Article set {$this->_encyclopedieArticleId}");
            }

            if(empty($this->_date)){
                throw new Application_Model_Exception
                        ("Article Date empty for locale {$this->_localeCode} and Article set {$this->_encyclopedieArticleId}");
            }

        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't refresh Data for this Article model.", null, $e);
        }
    }

    public static function fetchAll($overridesActiveField){
        $translateTable = new Application_Model_DbTable_Encyclopedie_Article_Translate();
        if($overridesActiveField){
            $translateTableContent = $translateTable->fetchAll();
        } else {
            $select = $translateTable->select();
            $select->where('active = 1');
            $translateTableContent = $translateTable->fetchAll($select);
        }
        $articles = array();
        foreach($translateTableContent as $article) {
            $articles[] = new self($article['article_id'], $article['locale'], $overridesActiveField);
        }
        return $articles;
    }

    public function getTitre($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_titre;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Titre", null, $e);
        }
    }

    public function getText($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_text;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Text", null, $e);
        }
    }

    public function getLocale($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_locale;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get Article Locale", null, $e);
        }
    }
}