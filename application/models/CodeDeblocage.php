<?php

/**
 * Représente une entrée dans la table CodeDeblocage
 *
 * @author kryzaal
 */

class Application_Model_CodeDeblocage extends Application_Model_Utils_DbRowObject{
    
    protected $_id;
    protected $_gift_card;
    
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

    public function setGiftCard($bool)
    {
        $this->_gift_card = (bool) $bool;
        return $this;
    }
 
    public function getGiftCard()
    {
        return (bool) $this->_gift_card;
    }
}