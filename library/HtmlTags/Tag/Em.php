<?php

/**
 * Représente une balise <em></em> en PHP
 *
 * @author kryzaal
 */

class App_HtmlTags_Tag_Em extends App_HtmlTags_Tag{
    
    public function __construct($value) {
        parent::__construct("em", $value);
    }
    
    public function __toString() {
        return "<em" . $this->getAttrString() . ">" . $this->getValue() . "</em>";
    }
}