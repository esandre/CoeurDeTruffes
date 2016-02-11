<?php

/**
 * Représente une balise <hx></hx> en PHP
 *
 * @author kryzaal
 */

class App_HtmlTags_Tag_H extends App_HtmlTags_Tag{
    
    protected $_level;
    
    public function __construct($level,$value) {
        $this->_level = (int) $level;
        parent::__construct("h" . $this->_level, $value);
    }
    
    public function __toString() {
        return "<h" . $this->_level . $this->getAttrString() . ">" . $this->getValue() . "</h" . $this->_level . ">";
    }
}