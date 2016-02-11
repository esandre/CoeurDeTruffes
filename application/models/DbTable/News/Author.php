<?php

/**
 * Lien vers la table News_Author de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_News_Author extends Zend_Db_Table_Abstract {

    protected $_name = 'News_Author';
    
    public function exists($id){
        try {
            $select = $this->select();
            $select->where('id = ?', $id);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                return false;
            } else {
                return true;
            }
        } catch(Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't know if author [$id] exists", null, $e);
        }
    }
    
    public function get($id){
        try {
            $select = $this->select();
            $select->where('id = ?', $id);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception("No " . $this->_name . " row available for id $id");
            } else {
                return $row;
            }
        } catch(Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't fetch author $id", null, $e);
        }
    }

}