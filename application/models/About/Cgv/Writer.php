<?php

/**
 * Modéle writeOnly pour les about
 *
 * @author kryzaal
 */
class Application_Model_About_Cgv_Writer {

    protected $_localeLanguageTable;
    protected $_aboutCgvTable;
    protected $_aboutCgvTranslateTable;

    public function __construct() {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
        $this->_aboutCgvTable = new Application_Model_DbTable_About_Cgv();
        $this->_aboutCgvTranslateTable = new Application_Model_DbTable_About_Cgv_Translate();
    }

    public function insert(Application_Model_About_Cgv_Writer_Data $data) {
        try {
            $this->_aboutCgvTable->getAdapter()->beginTransaction();

            $this->_aboutCgvTable->insert(array(
                "date" => $data->getDate()->toString('yyyy-MM-dd hh:mm:ss'),
                "active" => $data->getActive()
            ));

            $articleId = $this->_aboutCgvTable->lastInsertId();

            $locales = $data->getLocales();
            if (!empty($locales)) {
                foreach ($locales as $locale => $content) {
                    if (!$this->_localeLanguageTable->exists($locale)) {
                        throw new Application_Model_Exception("$locale is not in DB");
                    }
                    $this->_aboutCgvTranslateTable->insertRow($locale, $articleId, $content);
                }
            }

            $this->_aboutCgvTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_aboutCgvTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't insert cgv", null, $e);
        }
    }

    public function toggleActive($id) {
        $this->_aboutCgvTable->update(array("active" => new Zend_Db_Expr("!active")), 'id = ' . intval($id));
    }

}