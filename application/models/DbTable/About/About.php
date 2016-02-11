<?php

/**
 * Lien vers la table About_About de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_About_About extends Zend_Db_Table_Abstract {

    protected $_name = 'About_About';

    public function lastInsertId() {
        return $this->getAdapter()->lastInsertId($this->_name);
    }

    /**
     *  Renvoie l'id du set de About le plus récent.
     *  @return int $id
     *  @throws Application_Model_DbTable_Exception
     */
    public function getLatestId() {
        $latest = $this->getLatest();
        return intval($latest['id']);
    }

    /**
     * Renvoie la ligne la plus récente
     * @return mixed $row
     * @throws Application_Model_DbTable_Exception
     */
    public function getLatest() {
        try {
            $select = $this->select();
            $select->where('active = ?', 1);
            $select->order('date DESC');
            $select->limit(1);
            $row = $this->fetchRow($select);

            if (empty($row)) {
                throw new Application_Model_DbTable_Exception("No " . $this->_name . " row available");
            }

            return $row;
        } catch (Zend_Db_Exception $e) {
            throw new Application_Model_DbTable_Exception("Fails to get latest Abouts from base", null, $e);
        } catch (Application_Model_DbTable_Exception $e) {
            throw new Application_Model_DbTable_Exception("Fails to get latest Abouts", null, $e);
        }
    }

    /**
     * Vérifie si le set est actif
     * @param int $id
     * @return boolean $active
     * @throws Application_Model_DbTable_Exception
     */
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
            throw new Application_Model_DbTable_Exception("Can't know if about set $id is active or not", null, $e);
        }
    }

    /**
     * Vérifie si la campagne existe
     * @param int $id
     * @return boolean $exists
     * @throws Application_Model_DbTable_Exception
     */
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
            throw new Application_Model_DbTable_Exception("Can't know if about set [$id] exists", null, $e);
        }
    }

    /**
     * Renvoie le set a cet id
     * @param int $id
     * @return mixed $row
     * @throws Application_Model_DbTable_Exception
     */
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
            throw new Application_Model_DbTable_Exception("Can't fetch About set $id", null, $e);
        }
    }

}
