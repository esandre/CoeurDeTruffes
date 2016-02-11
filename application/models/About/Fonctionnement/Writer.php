<?php

/**
 * Modéle writeOnly pour les foncts
 *
 * @author kryzaal
 */
class Application_Model_About_Fonctionnement_Writer {

    protected $_localeLanguageTable;
    protected $_aboutFonctionnementTable;
    protected $_aboutFonctionnementTranslateTable;

    public function __construct() {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();
        $this->_aboutFonctionnementTable = new Application_Model_DbTable_About_Fonctionnement();
        $this->_aboutFonctionnementTranslateTable = new Application_Model_DbTable_About_Fonctionnement_Translate();
    }

    public function insert(Application_Model_About_Fonctionnement_Writer_Data $data) {
        try {
            $this->_aboutFonctionnementTable->getAdapter()->beginTransaction();

            $this->_aboutFonctionnementTable->insert(array(
                "date" => $data->getDate()->toString('yyyy-MM-dd hh:mm:ss'),
                "active" => $data->getActive()
            ));

            $articleId = $this->_aboutFonctionnementTable->lastInsertId();

            $locales = $data->getLocales();
            if (!empty($locales)) {
                foreach ($locales as $locale => $content) {
                    if (!$this->_localeLanguageTable->exists($locale)) {
                        throw new Application_Model_Exception("$locale is not in DB");
                    }
                    $this->_aboutFonctionnementTranslateTable->insertRow($locale, $articleId, $content);
                }
            }

            $this->_aboutFonctionnementTable->getAdapter()->commit();
        } catch (Zend_Exception $e) {
            $this->_aboutFonctionnementTable->getAdapter()->rollBack();
            throw new Application_Model_Exception("Can't insert about", null, $e);
        }
    }

    public function toggleActive($id) {
        $this->_aboutFonctionnementTable->update(array("active" => new Zend_Db_Expr("!active")), 'id = ' . intval($id));
    }

}