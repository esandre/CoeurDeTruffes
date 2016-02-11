<?php

/**
 * Description of Tag
 *
 * @author kryzaal
 */
abstract class App_HtmlTags_Tag {
    
    protected $_name;
    protected $_value;
    protected $_attributes;
    
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
        if(is_string($this->_value))
            $this->_value = $value;
    }
    
    public function getName()
    {
        return $this->_name;
    }
    
    public function getValue()
    {
        return (string) $this->_value;
    }
    
    public function getAttributes()
    {
        return $this->_attributes;
    }
    
    public function addAttributes($array)
    {
        foreach($array as $key => $value)
            $this->addAttribute ($key, $value);
    }
    
    public function setAttributes($array)
    {
        foreach($array as $key => $value)
            $this->setAttribute ($key, $value);
    }
    
    public function setAttribute($key, $value)
    {
        if(!$this->isConform($value)) throw new Exception("Value is not valid !");
        $this->_attributes[$key] = $value;
    }
    
    public function addAttribute($key, App_HtmlTags_Attribute $attribute)
    {
        if(!empty($this->_attributes[$key])) throw new Exception ("Already something for this key !");
        if(!$this->isConform($attribute)) throw new Exception("Value is not valid !");
        $this->_attributes[$key] = $attribute;
    }
    
    public function getAttribute($key)
    {
        if(!isset($this->_attributes[$key])) throw new Exception("No attribute for the key $key");
        return $this->_attributes[$key];
    }
    
    public function delAttribute($key)
    {
        if(!isset($this->_attributes[$key])) throw new Exception("No attribute for the key $key");
        unset ($this->_attributes[$key]);
    }

    protected function isConform($value)
    {
        if($value instanceof App_HtmlTags_Attribute) return 1;
        return 0;
    }
    
    protected function getAttrString()
    {
        if(empty($this->_attributes)) return;
        $string = (string) " ";
        foreach($this->_attributes as $attribute)
        {
            $string .= $attribute->__toString() . " ";
        }
        
        return $string;
    }
}