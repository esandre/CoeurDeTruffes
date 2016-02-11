<?php

/**
 * Représente une balise <img></img> en PHP
 *
 * @author kryzaal
 */

class App_HtmlTags_Tag_Img extends App_HtmlTags_Tag{
    
    public function __construct($value) {
        parent::__construct("img", $value);
    }
    
    public function __toString() {
        return "<img" . $this->getAttrString() . ">" . $this->getValue() . "</img>";
    }
}