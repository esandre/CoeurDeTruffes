<?php

/**
 * Un attribut Href ( lien )
 *
 * @author kryzaal
 */

class App_HtmlTags_Attribute_Href extends App_HtmlTags_Attribute {
    
    protected $_valueType = "string";
    
    public function __construct($value) {
        parent::__construct('href', $value);
    }
    
    public function __toString() {
        return $this->getName() . '="' . $this->getValue() . '"';
    }
    
    public static function make($pageCode)
    {
        if(!is_string($pageCode)) throw new Exception("Page Code must be a string !");
        $code = explode("_",$pageCode,3);
        $keys = array("module","controller","action");
        $pageCodeArray = array_combine($keys, $code);
        
        $module = !empty($pageCodeArray['module']) ? $pageCodeArray['module'] : "splash" ;
        $controller = !empty($pageCodeArray['controller']) ? $pageCodeArray['controller'] : "index" ;
        $action = !empty($pageCodeArray['action']) ? $pageCodeArray['action'] : "index" ;
        
        $hrefStr = 
                '/'.$module
                .'/'.$controller
                .'/'.$action;
        
        return (string) $hrefStr;
    }
}