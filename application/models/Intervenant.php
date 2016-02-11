<?php

/**
 * Représente une entrée dans la table Intervenant
 *
 * @author kryzaal
 */

class Application_Model_Intervenant extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_personne_id;
    
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

    public function setPersonneId($id)
    {
        $this->_personne_id = (int) $id;
        return $this;
    }
 
    public function getPersonneId()
    {
        return (int) $this->_personne_id;
    }
}
