<?php

/**
 * Element de formulaire permettant de saisir et de verifier la validité d'un mot de passe.
 *
 * @author kryzaal
 */

class Form_Field_Login_PasswordField extends Zend_Form_Element_Password{
    
    /**
     * Contructeur, prend le nom interne, le titre et la description du champ.
     * 
     * @param string $internalName
     * @param string $label
     * @param string $description
     */
    public function __construct($internalName,$label,$description) {
        parent::__construct($internalName);
        
        $this->setLabel($label)
            ->setDescription($description);
        
        $this->setAttrib('size', '32')
            ->addValidator('stringLength', false, array(6, 32))
            ->addFilter('StripTags');
    } 
}
