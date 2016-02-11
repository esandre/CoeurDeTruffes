<?php

/**
 * Lien vers la table News_Article de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_News_Article extends Zend_Db_Table_Abstract {

    protected $_name = 'News_Article';

    /**
     * Renvoie les ID concernés, ordonnés par date en decroissant
     * @param type $offset
     * @param type $limit
     * @return type
     * @throws Application_Model_DbTable_Exception 
     */
    public function getIdsByOffsetAndDate($offset, $limit) {
        try {
            $select = $this->select();
            $select->where('visible = ?', 1);
            $select->order('date DESC');
            $select->limit($limit, $offset);
            $rows = $this->fetchAll($select);

            if (empty($rows)) {
                throw new Application_Model_DbTable_Exception("No " . $this->_name . " rows available");
            }
            
            $ids = array();
            foreach($rows as $row) {
                $ids[] = $row['id'];
            }
            return $ids;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception("Fails to get latest news from base", null, $e);
        } catch (Application_Model_DbTable_Exception $e) {
            throw new Application_Model_DbTable_Exception("Fails to get latest news", null, $e);
        }
    }
    
    public function isActive($id){
        try {
            $select = $this->select();
            $select->where('visible = ?', 1);
            $select->where('id = ?', $id);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                return false;
            } else {
                return true;
            }
        } catch(Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't know if news set $id is active or not", null, $e);
        }
    }
    
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
            throw new Application_Model_DbTable_Exception("Can't know if news set [$id] exists", null, $e);
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
            throw new Application_Model_DbTable_Exception("Can't fetch news set $id", null, $e);
        }
    }

}
