<?php

/**
 * Représente une balise <a></a> en PHP
 *
 * @author kryzaal
 */

class App_HtmlTags_Tag_A extends App_HtmlTags_Tag{
    
    public function __construct($value) {
        parent::__construct("a", $value);
    }
    
    public function __toString() {
        return "<a" . $this->getAttrString() . ">" . $this->getValue() . "</a>";
    }
}