<?php

/**
 * Représente une entrée dans la table Truffiere
 *
 * @author kryzaal
 */
class Application_Model_Truffiere extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_nom;
    protected $_adresse_id;
    protected $_coords_id;
    
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

    public function setNom($id)
    {
        $this->_nom = (string) $id;
        return $this;
    }
 
    public function getNom()
    {
        return (string) $this->_nom;
    }
    
    public function setAdresseId($id)
    {
        $this->_adresse_id = (int) $id;
        return $this;
    }
 
    public function getAdresseId()
    {
        return (int) $this->_adresse_id;
    }
    
    public function setCoordsId($id)
    {
        $this->_coords_id = (float) $id;
        return $this;
    }
 
    public function getCoordsId()
    {
        return (float) $this->_coords_id;
    }
    
}
