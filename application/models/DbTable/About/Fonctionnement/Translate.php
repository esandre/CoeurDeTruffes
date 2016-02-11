<?php

/**
 * Lien vers la table About_Fonctionnement_Translate de la base
 *
 * @author kryzaal
 */

class Application_Model_DbTable_About_Fonctionnement_Translate extends Zend_Db_Table_Abstract {

    protected $_name = 'About_Fonctionnement_Translate';

    public function getByFonctionnementIdAndLocale($id, $locale) {
        try {
            $select = $this->select();
            $select->where('`fonctionnement_id` = ?', intval($id));
            $select->where('`locale` = ?', $locale);
            $select->limit(1);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception
                        ("No " . $this->_name . " row available for fonctionnement_id : $id and locale : $locale");
            }

            return $row;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to get CGVs for fonctionnement_id : $id and locale : $locale", null, $e);
        }
    }

    /**
     *  Renvoie les lignes pour le set $id
     * @param int $id
     * @return array $rows
     * @throws Application_Model_DbTable_Exception
     */
    public function getByFonctionnementId($id) {
        try {
            $select = $this->select();
            $select->where('`fonctionnement_id` = ?', intval($id));
            $rows = $this->fetchAll($select);

            if (empty($rows)) {
                throw new Application_Model_DbTable_Exception
                        ("No " . $this->_name . " row available for fonctionnement_id : $id");
            }

            return $rows;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to get fonctionnements for fonctionnement_id : $id", null, $e);
        }
    }

    /**
     * Insére un ligne pour une clé secondaire et un texte
     * @param string $locale
     * @param int $articleId
     * @param string $text
     * @throws Application_Model_DbTable_Exception
     */
    public function insertRow($locale, $articleId, $text = '') {
        try {
            $row = array();

            $row['locale'] = $locale;
            $row['text'] = $text;
            $row['fonctionnement_id'] = $articleId;

            $this->insert($row);
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to insert a translation for locale : $locale", null, $e);
        }
    }

}