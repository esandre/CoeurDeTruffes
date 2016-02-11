<?php

/**
 * Modéle writeOnly pour les mentions legales
 *
 * @author kryzaal
 */
class Application_Model_About_Legal_Writer {

    protected $_localeLanguageTable;
    protected $_aboutLegalTable;
    protected $_aboutLegalTranslateTable;

    public function __construct() {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
        $this->_aboutLegalTable = new Application_Model_DbTable_About_About();
        $this->_aboutLegalTranslateTable = new Application_Model_DbTable_About_About_Translate();
    }

    public function insert(Application_Model_About_Legal_Writer_Data $data) {
        try {
            $this->_aboutLegalTable->getAdapter()->beginTransaction();

            $this->_aboutLegalTable->insert(array(
                "date" => $data->getDate()->toString('yyyy-MM-dd hh:mm:ss'),
                "active" => $data->getActive()
            ));

            $articleId = $this->_aboutLegalTable->lastInsertId();

            $locales = $data->getLocales();
            if (!empty($locales)) {
                foreach ($locales as $locale => $content) {
                    if (!$this->_localeLanguageTable->exists($locale)) {
                        throw new Application_Model_Exception("$locale is not in DB");
                    }
                    $this->_aboutLegalTranslateTable->insertRow($locale, $articleId, $content);
                }
            }

            $this->_aboutLegalTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_aboutLegalTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't insert about", null, $e);
        }
    }

    public function toggleActive($id) {
        $this->_aboutLegalTable->update(array("active" => new Zend_Db_Expr("!active")), 'id = ' . intval($id));
    }

}