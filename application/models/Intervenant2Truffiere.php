<?php

/**
 * Représente une entrée dans la table Intervenant2Truffiere
 *
 * @author kryzaal
 */
class Application_Model_Intervenant2Truffiere extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_truffiere_id;
    protected $_intervenant_id;
    
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

    public function setTruffiereId($id)
    {
        $this->_truffiere_id = (int) $id;
        return $this;
    }
 
    public function getTruffiereId()
    {
        return (int) $this->_truffiere_id;
    }
    
    public function setIntervenantId($id)
    {
        $this->_intervenant_id = (int) $id;
        return $this;
    }
 
    public function getIntervenantId()
    {
        return (int) $this->_intervenant_id;
    }
    
}