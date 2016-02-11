<?php

/**
 * Représente une entrée dans la table Emplacement
 *
 * @author kryzaal
 */

class Application_Model_Emplacement extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_row_id;
    protected $_column_id;
    protected $_client_id;
    protected $_code_deblocage_id;
    protected $_arbre_id;
    
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
    
    public function setColumnId($id)
    {
        $this->_column_id = (int) $id;
        return $this;
    }
 
    public function getColumnId()
    {
        return (int) $this->_column_id;
    }
    
    public function setClientId($id)
    {
        $this->_client_id = (int) $id;
        return $this;
    }
 
    public function getClientId()
    {
        return (int) $this->_client_id;
    }
    
    public function setCodeDeblocageId($id)
    {
        $this->_code_deblocage_id = (int) $id;
        return $this;
    }
 
    public function getCodeDeblocageId()
    {
        return (int) $this->_code_deblocage_id;
    }
    
    public function setArbreId($id)
    {
        $this->_arbre_id = (int) $id;
        return $this;
    }
 
    public function getArbreId()
    {
        return (int) $this->_arbre_id;
    }

}