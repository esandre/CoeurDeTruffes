<?php

/**
 * Représente une entrée dans la table Adresse
 *
 * @author kryzaal
 */
class Application_Model_Adresse extends Application_Model_Utils_DbRowObject{
    
    protected $_id;
    protected $_ligne_1;
    protected $_ligne_2;
    protected $_code_postal;
    protected $_ville;
    protected $_pays;
   
    public function __construct(array $options = null)
    {
        parent::__construct($options);
    }
    
    public function valid()
    {
        if(!empty($this->_ligne_1) &&
            !empty($this->_code_postal) &&
            !empty($this->_ville) &&
            !empty($this->_pays)
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
    
    public function setLigne_1($str)
    {
        $this->_ligne_1 = (string) $str;
        return $this;
    }
 
    public function getLigne_1()
    {
        return (string) $this->_ligne_1;
    }
    
    public function setLigne_2($str)
    {
        $this->_ligne_2 = (string) $str;
        return $this;
    }
 
    public function getLigne_2()
    {
        return (string) $this->_ligne_2;
    }
    
    public function setCode_Postal($str)
    {
        $this->_code_postal = (string) $str;
        return $this;
    }
 
    public function getCode_Postal()
    {
        return (string) $this->_code_postal;
    }
    
    public function setVille($str)
    {
        $this->_ville = (string) $str;
        return $this;
    }
 
    public function getVille()
    {
        return (string) $this->_ville;
    }
    
    public function setPays($str)
    {
        $this->_pays = (string) $str;
        return $this;
    }
 
    public function getPays()
    {
        return (string) $this->_pays;
    }
    
}

