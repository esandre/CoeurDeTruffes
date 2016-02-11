<?php

/**
 * Element de formulaire permettant de saisir et de verifier la validité d'un code postal.
 *
 * @author kryzaal
 */

class Form_Field_Adresse_PostalField extends Zend_Form_Element_Text{
    
    /**
     * Contructeur, prend le nom interne, le titre et la description du champ.
     * Peut egalement prendre la valeur par defaut.
     * 
     * @param string $internalName
     * @param string $label
     * @param string $description
     * @param string $default
     */
    public function __construct($internalName,$label,$description,$default = false) {
        parent::__construct($internalName);
        
        $this->setLabel($label)
            ->setDescription($description);
        if($default !== false) $this->setValue($default);
        
        $this->setAttrib('size', '5')
                ->addFilter('StripTags')
                ->addValidator('Alnum');
    } 
}
