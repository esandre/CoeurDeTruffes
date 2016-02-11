<?php

/**
 * Représente une entrée dans la table ProductionAnnuelle
 *
 * @author kryzaal
 */
class Application_Model_ProductionAnnuelle extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_annee;
    protected $_chene_id;
    protected $_production;
    
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

    public function setAnnee($id)
    {
        $this->_annee = (string) $id;
        return $this;
    }
 
    public function getAnnee()
    {
        return (string) $this->_annee;
    }
    
    public function setCheneId($id)
    {
        $this->_chene_id = (int) $id;
        return $this;
    }
 
    public function getCheneId()
    {
        return (int) $this->_chene_id;
    }
    
    public function setProduction($id)
    {
        $this->_production = (float) $id;
        return $this;
    }
 
    public function getProduction()
    {
        return (float) $this->_production;
    }
}