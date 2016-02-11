<?php

/**
 * Représente une balise <li></li> en PHP
 *
 * @author kryzaal
 */

class App_HtmlTags_Tag_Li extends App_HtmlTags_Tag{
    
    public function __construct($value) {
        parent::__construct("li", $value);
    }
    
    public function __toString() {
        return "<li" . $this->getAttrString() . ">" . $this->getValue() . "</li>";
    }
}