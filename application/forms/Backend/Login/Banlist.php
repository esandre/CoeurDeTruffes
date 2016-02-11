<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Banlist
 *
 * @author kryzaal
 */
class Form_Backend_Login_Banlist extends Zend_Form{
    
     public function __construct($userList,$options = null) {
        parent::__construct($options);

        $translator = $this->getTranslator();
        
        $this->setName('login_banlist')
                ->setAction('/backend/login/banlist')
                ->setMethod('post');
        
        foreach($userList as $user)
        if ($user instanceof Application_Model_Access_Login)
        {
            $element = new Zend_Form_Element_Checkbox("u".$user->getId());
            $element->setLabel($user->getLogin())
                    ->setDescription("Bannir {$user->getLogin()} ?")
                    ->setRequired(true)
                    ->setValue($user->getBan());
            $this->addElement($element);
        }
        else throw new Exception("Element is not an instance of Application_Model_Access_Login");
        
        $submit = new Zend_Form_Element_Submit("banlist_submit");
        $submit->setLabel($translator->translate("submit"));

        $this->addElement($submit);
    }
}

?>
