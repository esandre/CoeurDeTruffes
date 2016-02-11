<?php

/**
 * Lien vers la table Encyclopedie_Article de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_Encyclopedie_Article extends Zend_Db_Table_Abstract {

    protected $_name = 'Encyclopedie_Article';

    public function lastInsertId() {
        return $this->getAdapter()->lastInsertId($this->_name);
    }

    public function isActive($id) {
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
        } catch (Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't know if Article set $id is active or not", null, $e);
        }
    }

    public function exists($id) {
        try {
            $select = $this->select();
            $select->where('id = ?', $id);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                return false;
            } else {
                return true;
            }
        } catch (Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't know if Article set [$id] exists", null, $e);
        }
    }

    public function get($id) {
        try {
            $select = $this->select();
            $select->where('id = ?', $id);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception("No " . $this->_name . " row available for id $id");
            } else {
                return $row;
            }
        } catch (Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't fetch Article set $id", null, $e);
        }
    }

}