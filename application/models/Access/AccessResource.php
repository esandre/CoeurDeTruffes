<?php

/**
 * Représente une entrée dans la table AccessResource
 *
 * @author kryzaal
 */
class Application_Model_Access_AccessResource extends Application_Model_Utils_DbRowObject{
    
    protected $_id;
    protected $_name;
    protected $_open;
   
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
    
    public function setResName($str)
    {
        $this->_name = (string) $str;
        return $this;
    }
 
    public function getResName()
    {
        return (string) $this->_name;
    }
    
    public function setOpen($bool)
    {
        $this->_open = (bool) $str;
        return $this;
    }
 
    public function getOpen()
    {
        return (bool) $this->_open;
    }
    
}

