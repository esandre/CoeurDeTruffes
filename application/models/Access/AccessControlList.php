<?php

/**
 * Représente une entrée dans la vue AccessControlList
 *
 * @author kryzaal
 */
class Application_Model_Access_AccessControlList extends Application_Model_Utils_DbRowObject{
    
    protected $_id;
    protected $_acc_group;
    protected $_acc_resource;
    protected $_allow;
    protected $_is_open;
    protected $_if_drop;
   
    public function __construct($id,$acc_group,$acc_resource,$allow,$is_open,$if_drop,array $options = null)
    {
        $this->_id = $id;
        $this->_acc_group = $acc_group;
        $this->_acc_resource = $acc_resource;
        $this->_allow = $allow;
        $this->_is_open = $is_open;
        $this->_if_drop = $if_drop;
        parent::__construct($options);
    }
 
    public function getId()
    {
        return (int) $this->_id;
    }

    public function getAccGroup()
    {
        return (string) $this->_acc_group;
    }
 
    public function getAccResource()
    {
        return (string) $this->_acc_resource;
    }

    public function getAllow()
    {
        return (bool) $this->_allow;
    }
    
    public function getIsOpen()
    {
        return (bool) $this->_is_open;
    }
    
    public function getIfDrop()
    {
        return (string) $this->_if_drop;
    } 
}
