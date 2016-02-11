<?php

/**
 * Formulaire de login pour la partie admin
 * 
 * @author : Kryzaal
 */

class Form_Backend_Login_Prompt extends Zend_Form {
    
    public function __construct($options = null)
    {
        parent::__construct($options);
        
        $translator = $this->getTranslator();
        
        $this->setName('login_prompt')
            ->setAction('/backend/login/prompt')
            ->setMethod('post');

        $login = new Zend_Form_Element_Text('login');
        $login->setLabel($translator->translate("login"))
            ->setAttrib('size', '32')
            ->setRequired(true)
            ->addFilters(array(
                'StripTags',
                'StringTrim',
                'StringtoLower',
            ));

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel($translator->translate("password"))
            ->setAttrib('size', '32')
            ->setRequired(true)
            ->addFilter('StripTags');

        $submit = new Zend_Form_Element_Submit("prompt_submit");
        $submit->setLabel($translator->translate("submit"));
                
        $this->addElements(array(
            $login,
            $password,
            $submit
        ));  
    }
}