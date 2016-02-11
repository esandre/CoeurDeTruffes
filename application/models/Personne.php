<?php

/**
 * Représente une entrée dans la table Personne
 *
 * @author kryzaal
 */
class Application_Model_Personne extends Application_Model_Utils_DbRowObject{
        
    protected $_id;
    protected $_nom;
    protected $_prenom;
    protected $_adresse_id;
    
    public function __construct(array $options = null)
    {
        parent::__construct($options);
    }
    
    public function valid()
    {
        if(!empty($this->_nom) &&
            !empty($this->_prenom) &&
            !empty($this->_adresse_id)
        )
            return true;
        else return false;
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

    public function setNom($str)
    {
        $this->_nom = (string) $str;
        return $this;
    }
 
    public function getNom()
    {
        return (string) $this->_nom;
    }
    
    public function setPrenom($str)
    {
        $this->_prenom = (string) $str;
        return $this;
    }
 
    public function getPrenom()
    {
        return (string) $this->_prenom;
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
}