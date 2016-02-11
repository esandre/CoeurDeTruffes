<?php

/**
 * Représente une entrée dans la table AccessGroup2Resource
 *
 * @author kryzaal
 */
class Application_Model_Access_AccessGroup2Resource extends Application_Model_Utils_DbRowObject{
    
    protected $_id;
    protected $_group_id;
    protected $_resource_id;
    protected $_allow;
    protected $_if_drop;
   
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
    
    public function setGroupId($id)
    {
        $this->_group_id = (int) $id;
        return $this;
    }
 
    public function getGroupId()
    {
        return (int) $this->_group_id;
    }
    
    public function setResourceId($id)
    {
        $this->_resource_id = (int) $id;
        return $this;
    }
 
    public function getResourceId()
    {
        return (int) $this->_resource_id;
    }
    
    public function setAllow($bool)
    {
        $this->_allow = (bool) $bool;
        return $this;
    }
 
    public function getAllow()
    {
        return (bool) $this->_allow;
    }
    
    public function setIfDrop($str)
    {
        $this->_if_drop = (string) $str;
        return $this;
    }
    
    public function getIfDrop()
    {
        return (string) $this->_if_drop;
    }
    
}

