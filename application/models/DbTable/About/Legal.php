<?php

/**
 * Lien vers la table About_Legal de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_About_Legal extends Zend_Db_Table_Abstract {

    protected $_name = 'About_Legal';

    public function lastInsertId() {
        return $this->getAdapter()->lastInsertId($this->_name);
    }

    /**
     *  Renvoie l'id du set de Fonctionnement le plus récent.
     *  @return int $id
     *  @throws Application_Model_DbTable_Exception
     */
    public function getLatestId() {
        try {
            $select = $this->select();
            $select->where('active = ?', 1);
            $select->order('date ASC');
            $select->limit(1);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception("No " . $this->_name . " row available");
            }

            return intval($row['id']);
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception("Fails to get latest Legal from base", null, $e);
        } catch (Application_Model_DbTable_Exception $e) {
            throw new Application_Model_DbTable_Exception("Fails to get latest Legal", null, $e);
        }
    }

    public function isActive($id){
        try {
            $select = $this->select();
            $select->where('active = ?', 1);
            $select->where('id = ?', $id);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                return false;
            } else {
                return true;
            }
        } catch(Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't know if Legal set $id is active or not", null, $e);
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
            throw new Application_Model_DbTable_Exception("Can't know if Legal set [$id] exists", null, $e);
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
            throw new Application_Model_DbTable_Exception("Can't fetch Legal set $id", null, $e);
        }
    }

}
