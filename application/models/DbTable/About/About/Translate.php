<?php

/**
 * Lien vers la table About_About_Translate de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_About_About_Translate extends Zend_Db_Table_Abstract {

    /**
     * Le nom de la table
     * @var string $_name;
     */
    protected $_name = 'About_About_Translate';

    /**
     *  Renvoie la ligne identifiée par la clé secondaire about_id et locale
     * @param int $id
     * @param string $locale
     * @return mixed $row
     * @throws Application_Model_DbTable_Exception
     */
    public function getByAboutIdAndLocale($id, $locale) {
        try {
            $select = $this->select();
            $select->where('`about_id` = ?', intval($id));
            $select->where('`locale` = ?', $locale);
            $select->limit(1);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception
                        ("No " . $this->_name . " row available for about_id : $id and locale : $locale");
            }

            return $row;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to get CGVs for about_id : $id and locale : $locale", null, $e);
        }
    }

    /**
     *  Renvoie les lignes pour le set $id
     * @param int $id
     * @return array $rows
     * @throws Application_Model_DbTable_Exception
     */
    public function getByAboutId($id) {
        try {
            $select = $this->select();
            $select->where('`about_id` = ?', intval($id));
            $rows = $this->fetchAll($select);

            if (empty($rows)) {
                throw new Application_Model_DbTable_Exception
                        ("No " . $this->_name . " row available for about_id : $id");
            }

            return $rows;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to get CGVs for about_id : $id", null, $e);
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
            $row['about_id'] = $articleId;

            $this->insert($row);
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to insert a translation for locale : $locale", null, $e);
        }
    }

}