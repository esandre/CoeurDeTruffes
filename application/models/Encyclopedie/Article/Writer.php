<?php

/**
 * Crée un nouvel article.
 * Modéle writeOnly.
 *
 * @author kryzaal
 */
class Application_Model_Encyclopedie_Article_Writer {

    protected $_localeLanguageTable;
    protected $_encyclopedieArticleTable;
    protected $_encyclopedieArticleTranslateTable;

    public function __construct() {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
        $this->_encyclopedieArticleTable = new Application_Model_DbTable_Encyclopedie_Article();
        $this->_encyclopedieArticleTranslateTable = new Application_Model_DbTable_Encyclopedie_Article_Translate();
    }

    public function insert(Application_Model_Encyclopedie_Article_Writer_Data $data) {
        try {
            $this->_encyclopedieArticleTable->getAdapter()->beginTransaction();

            $this->_encyclopedieArticleTable->insert(array(
                "date" => $data->getDate()->toString('yyyy-MM-dd hh:mm:ss'),
                "active" => $data->getActive()
            ));

            $articleId = $this->_encyclopedieArticleTable->lastInsertId();

            $locales = $data->getLocales();
            if(!empty($locales)) {
                foreach ($locales as $locale => $content) {
                    if(!$this->_localeLanguageTable->exists($locale)){
                        throw new Application_Model_Exception("$locale is not in DB");
                    }
                    $this->_encyclopedieArticleTranslateTable->insertRow($locale, $articleId, $content['title'], $content['text']);
                }
            }

            $this->_encyclopedieArticleTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_encyclopedieArticleTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't insert article", null, $e);
        }
    }

    public function update($id, Application_Model_Encyclopedie_Article_Writer_Data $data) {
        try {
            $this->_encyclopedieArticleTable->getAdapter()->beginTransaction();

            $this->_encyclopedieArticleTable->update(array(
                "active" => $data->getActive()
            ), 'id = ' . intval($id));

            foreach ($data->getLocales() as $locale => $content) {
                if(!$this->_localeLanguageTable->exists($locale)){
                    throw new Application_Model_Exception("$locale is not in DB");
                }
                $this->_encyclopedieArticleTranslateTable->updateRow($locale, $id, $content['title'], $content['text']);
            }

            $this->_encyclopedieArticleTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_encyclopedieArticleTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't update article", null, $e);
        }
    }

    public function delete($id) {
        try {
            $this->_encyclopedieArticleTable->getAdapter()->beginTransaction();

            $this->_encyclopedieArticleTable->delete('id = ' . intval($id));
            $this->_encyclopedieArticleTranslateTable->delete('article_id = ' . intval($id));

            $this->_encyclopedieArticleTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_encyclopedieArticleTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't delete article", null, $e);
        }
    }

    public function toggleActive($id){
        $this->_encyclopedieArticleTable->update(array("active" => new Zend_Db_Expr("!active")), 'id = ' . intval($id));
    }

}
