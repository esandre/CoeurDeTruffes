<?php

class Application_Model_News {

    private $_localeLanguageTable;
    private $_newsArticleTable;
    private $_newsArticleTranslateTable;
    private $_newsAuthorTable;
    
    private $_localeCode;
    private $_newsArticleId;
    private $_newsAuthorId;
    
    protected $_id;
    protected $_titre;
    protected $_text;
    protected $_author;
    protected $_date;
    protected $_locale;

    public function __construct($setId, $locale) {
        
        $this->_newsArticleId = $setId;
        $this->_localeCode = $locale;
        
        if(empty($this->_newsArticleId)){
            throw new Application_Model_Exception("News Set ID is empty");
        }
        
        if(empty($this->_localeCode)){
            throw new Application_Model_Exception("Locale Code is empty");
        }
        
        try{
            $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
            $this->_newsArticleTable = new Application_Model_DbTable_News_Article();
            $this->_newsArticleTranslateTable = new Application_Model_DbTable_News_Article_Translate();
            $this->_newsAuthorTable = new Application_Model_DbTable_News_Author();
            
            $this->_refresh();
            
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't build a new Model_News", null, $e);
        }
        
    }
    
    private function _refresh() {
        try{
            if(!$this->_localeLanguageTable->exists($this->_localeCode)){
                throw new Application_Model_Exception("Locale " . $this->_localeCode . " does not exists in the Db");
            }
            
            if(!$this->_newsArticleTable->exists($this->_newsArticleId)){
                throw new Application_Model_Exception("News Set " . $this->_newsArticleId . " does not exists in the Db");
            }
            
            if(!$this->_newsArticleTable->isActive($this->_newsArticleId)){
                throw new Application_Model_Exception("News Set " . $this->_newsArticleId . " is not active in the Db");
            }
            
            $newsArticleTrRow = $this->_newsArticleTranslateTable->getByNewsIdAndLocale($this->_newsArticleId, $this->_localeCode);
            $newsArticleRow = $this->_newsArticleTable->get($this->_newsArticleId);
            $this->_newsAuthorId = $newsArticleRow['author_id'];
            
            if(!$this->_newsAuthorTable->exists($this->_newsAuthorId)){
                throw new Application_Model_Exception("Author " . $this->_newsAuthorId . " does not exists in the Db");
            }
            
            $newsAuthorRow = $this->_newsAuthorTable->get($this->_newsAuthorId);
            
            $this->_id = $newsArticleTrRow['id'];
            $this->_locale = $this->_localeCode;
            $this->_author = $newsAuthorRow['pseudonym'];
            $this->_titre = $newsArticleTrRow['titre'];
            $this->_text = $newsArticleTrRow['text'];
            $this->_date = $newsArticleRow['date'];
            
            if(empty($this->_titre)){
                throw new Application_Model_Exception
                        ("News Title empty for locale {$this->_localeCode} and News set {$this->_newsArticleId}");
            }
            
            if(empty($this->_text)){
                throw new Application_Model_Exception
                        ("News Text empty for locale {$this->_localeCode} and News set {$this->_newsArticleId}");
            }
            
            if(empty($this->_author)){
                throw new Application_Model_Exception
                        ("Author's Pseudonym empty for locale {$this->_localeCode} and News set {$this->_newsArticleId}");
            }
            
            if(empty($this->_date)){
                throw new Application_Model_Exception
                        ("News Date empty for locale {$this->_localeCode} and News set {$this->_newsArticleId}");
            }
            
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't refresh Data for this News model.", null, $e);
        }
    }
    
    public static function getByOffsetForLocale($locale, $offset, $limit) {
        $model = new Application_Model_DbTable_News_Article();
        $ids = $model->getIdsByOffsetAndDate($offset, $limit);
        unset($model);
        
        $news = array();
        foreach($ids as $id) {
            $news[] = new self($id, $locale);
        }
        return $news;
    }
    
    public function getId($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_id;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get News ID", null, $e);
        }
    }
    
    public function getTitre($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_titre;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get News Title", null, $e);
        }
    }
    
    public function getText($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_text;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get News Text", null, $e);
        }
    }
    
    public function getAuthor($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_author;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get News Author", null, $e);
        }
    }
    
    public function getDate($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_date;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get News Date", null, $e);
        }
    }
    
    public function getLocale($refresh = false){
        try{
            if($refresh){
                $this->_refresh();
            }
            return $this->_locale;
        } catch (Zend_Exception $e) {
            throw new Application_Model_Exception("Can't get News Locale", null, $e);
        }
    }

}