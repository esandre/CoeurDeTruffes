<?php

/**
 * Représente une entrée dans la table Arbre2Emplacement
 *
 * @author kryzaal
 */

class Application_Model_Arbre2Emplacement extends Application_Model_Utils_DbRowObject{
    
    protected $_id;
    protected $_emplacement_id;
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
    
    public function setEmplacementId($id)
    {
        $this->_emplacement_id = (int) $id;
        return $this;
    }
    
    public function getEmplacementId()
    {
        return (int) $this->_emplacement_id;
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