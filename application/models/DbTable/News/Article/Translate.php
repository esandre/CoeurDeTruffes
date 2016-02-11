<?php

/**
 * Lien vers la table News_Article_Translate de la base
 *
 * @author kryzaal
 */

class Application_Model_DbTable_News_Article_Translate extends Zend_Db_Table_Abstract {

    protected $_name = 'News_Article_Translate';

    public function getByNewsIdAndLocale($id, $locale) {
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
                    ("Fails to get news for article_id : $id and locale : $locale", null, $e);
        }
    }

}