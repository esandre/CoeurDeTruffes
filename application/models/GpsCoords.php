<?php

/**
 * Représente une entrée dans la table GpsCoords
 *
 * @author kryzaal
 */

class Application_Model_GpsCoords extends Application_Model_Utils_DbRowObject{

    protected $_id;
    protected $_latitude;
    protected $_longitude;
    
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
    
    public function setLatitude($lat)
    {
        $this->_latitude = (double) $lat;
        return $this;
    }
 
    public function getLatitude()
    {
        return (double) $this->_latitude;
    }
    
    public function setLongitude($long)
    {
        $this->_longitude = (double) $long;
        return $this;
    }
 
    public function getLongitude()
    {
        return (double) $this->_longitude;
    }

}