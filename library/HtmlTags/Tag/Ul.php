<?php

/**
 * Représente une balise <ul></ul> en PHP
 *
 * @author kryzaal
 */

class App_HtmlTags_Tag_Ul extends App_HtmlTags_Tag{
    
    public function __construct($value) {
        parent::__construct("ul", $value);
    }
    
    public function __toString() {
        return "<ul" . $this->getAttrString() . ">" . $this->getValue() . "</ul>";
    }
}