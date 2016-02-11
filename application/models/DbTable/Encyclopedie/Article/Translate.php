<?php

/**
 * Lien vers la table Encyclopedie_Article_Translate de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_Encyclopedie_Article_Translate extends Zend_Db_Table_Abstract {

    protected $_name = 'Encyclopedie_Article_Translate';

    public function getByArticleIdAndLocale($id, $locale) {
        try {
            $select = $this->select();
            $select->where('`article_id` = ?', intval($id));
            $select->where('`locale` = ?', $locale);
            $select->limit(1);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception
                        ("No " . $this->_name . " row available for article_id : $id and locale : $locale");
            }

            return $row;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to get articles for article_id : $id and locale : $locale", null, $e);
        }
    }

    public function getByArticleId($id) {
        try {
            $select = $this->select();
            $select->where('`article_id` = ?', intval($id));
            $rows = $this->fetchAll($select);

            if (empty($rows)) {
                throw new Application_Model_DbTable_Exception
                        ("No " . $this->_name . " row available for article_id : $id");
            }

            return $rows;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to get articles for article_id : $id", null, $e);
        }
    }

    public function insertRow($locale, $articleId, $title = '', $text = '') {
        try {
            $row = array();

            $row['locale'] = $locale;
            $row['titre'] = $title;
            $row['text'] = $text;
            $row['article_id'] = $articleId;

            $this->insert($row);
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to insert a translation for locale : $locale", null, $e);
        }
    }

    public function updateRow($locale, $articleId, $title = '', $text = '') {
        try {
            $row = $this->getByArticleIdAndLocale($articleId, $locale);

            if (!empty($title)) {
                $row['titre'] = $title;
            }

            if (!empty($text)) {
                $row['text'] = $text;
            }

            $this->update($row->toArray(), 'id = ' . $row['id']);
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception
                    ("Fails to insert a translation for locale : $locale", null, $e);
        }
    }

}