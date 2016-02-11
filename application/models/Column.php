<?php

/**
 * Représente une entrée dans la table Column
 * 
 * @author : Kryzaal
 */

class Application_Model_Column extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_column_id;

    public function __construct(array $options = null)
    {
        parent::__construct($options);
    }

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }
 
    public function getId()
    {
        return (int) $this->_id;
    }
    
    public function setRowId($id)
    {
        $this->_row_id = (int) $id;
        return $this;
    }
 
    public function getRowId()
    {
        return (int) $this->_row_id;
    }
}