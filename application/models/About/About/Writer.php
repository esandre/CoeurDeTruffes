<?php

/**
 * Modéle writeOnly pour les about
 *
 * @author kryzaal
 */
class Application_Model_About_About_Writer {

    protected $_localeLanguageTable;
    protected $_aboutAboutTable;
    protected $_aboutAboutTranslateTable;

    public function __construct() {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
        $this->_aboutAboutTable = new Application_Model_DbTable_About_About();
        $this->_aboutAboutTranslateTable = new Application_Model_DbTable_About_About_Translate();
    }

    public function insert(Application_Model_About_About_Writer_Data $data) {
        try {
            $this->_aboutAboutTable->getAdapter()->beginTransaction();

            $this->_aboutAboutTable->insert(array(
                "date" => $data->getDate()->toString('yyyy-MM-dd hh:mm:ss'),
                "active" => $data->getActive()
            ));

            $articleId = $this->_aboutAboutTable->lastInsertId();

            $locales = $data->getLocales();
            if (!empty($locales)) {
                foreach ($locales as $locale => $content) {
                    if (!$this->_localeLanguageTable->exists($locale)) {
                        throw new Application_Model_Exception("$locale is not in DB");
                    }
                    $this->_aboutAboutTranslateTable->insertRow($locale, $articleId, $content);
                }
            }

            $this->_aboutAboutTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_aboutAboutTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't insert about", null, $e);
        }
    }

    public function toggleActive($id) {
        $this->_aboutAboutTable->update(array("active" => new Zend_Db_Expr("!active")), 'id = ' . intval($id));
    }

}