<?php

/**
 * La partie commune a tous les Mappers factorisée ici
 * 
 * @author : Kryzaal
 */

abstract class Application_Model_Utils_DbTableMapper {
    
    protected $_dbTable;
    protected $_dbTableName;
    
    public function __construct() {
        if(empty($this->_dbTableName)) throw new Exception('No Table name provided');
        $this->setDbTable('Application_Model_DbTable_'.$this->_dbTableName);
    }
    
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
    
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_'.$this->_dbTableName);
        }
        return $this->_dbTable;
    }
    
    public function getDbSelectObject()
    {
        $select = new Zend_Db_Select($this->_dbTable->getAdapter());
        $select->from($this->_dbTableName);
        
        return $select;
    }
    
    public function delete($id)
    {
        $id = (int)$id;
        if(!empty($id))
        {
            $this->getDbTable()->delete("id = $id");
        }
    }
}