<?php

/**
 * La classe commune a tout attribut.
 *
 * @author kryzaal
 */

abstract class App_HtmlTags_Attribute {
    
    protected $_name;
    protected $_value;
    protected $_valueType = "string";
    
    protected function __construct($name,$value)
    {
        $this->_name = $name;
        $this->_value = $value;
    }
    
    public function __toString()
    {
        return;
    }
    
    public function setValue($value)
    {
        if($this->isConform($this->_value))
            $this->_value = $value;
    }
    
    public function getName()
    {
        return $this->_name;
    }
    
    public function getValue()
    {
        return $this->_value;
    }
    
    protected function isConform($value)
    {
        $methodName = "is_" . $this->_valueType;
        return $methodName($value);
    }
}