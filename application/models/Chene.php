<?php

/**
 * Représente une entrée dans la table Chene
 *
 * @author kryzaal
 */

class Application_Model_Chene extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_date_platation;
    protected $_date_mort;
    
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
    
    public function setDatePlantation($date)
    {
        $this->_date_platation = (string) $date;
        return $this;
    }
    
    public function getDatePlantation()
    {
        return (string) $this->_date_platation;
    }
    
    public function setDateMort($date)
    {
        $this->_date_mort = (string) $date;
        return $this;
    }
    
    public function getDateMort()
    {
        return (string) $this->_date_mort;
    }
}
