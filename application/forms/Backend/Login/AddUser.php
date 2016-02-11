<?php

/**
 * Formulaire d'ajout d'utilisateur
 * 
 * @author : Kryzaal
 */
class Form_Backend_Login_AddUser extends Zend_Form {

    public function __construct($options = null) {
        parent::__construct($options);

        $translator = $this->getTranslator();
        
        $this->setName('login_adduser')
                ->setAction('/backend/login/adduser')
                ->setMethod('post');

        $role =         new Form_Field_AccessGroup_Radio('role','Role :',"Le role de l'utilisateur");
        $role           ->setRequired(true);

        $login =        new Form_Field_Login_LoginField('login','Login :',"Le login de l'utilisateur");
        $login          ->setRequired(true);

        $password =     new Form_Field_Login_PasswordField('password','Mot de passe :',"Le mot de passe de l'utilisateur");
        $password       ->setRequired(true);

        $name =         new Form_Field_Personne_NomField('name',"Nom :","Le nom de la personne");
        $name           ->setRequired(true);

        $surname =      new Form_Field_Personne_PrenomField('surname',"Prenom :","Le prenom de la personne");
        $surname        ->setRequired(true);

        $adress_l1 =    new Form_Field_Adresse_LigneField('addr_l1',"Adresse Ligne 1 : ","La 1ere ligne d'adresse");
        $adress_l1      ->setRequired(true);

        $adress_l2 =    new Form_Field_Adresse_LigneField('addr_l2',"Adresse Ligne 2 : ","La 2eme ligne d'adresse");
        $adress_l2      ->setRequired(false);

        $postal =       new Form_Field_Adresse_PostalField('postal', 'Code postal :', "Le Code postal");
        $postal         ->setRequired(true);
        
        $ville =        new Form_Field_Adresse_VilleField('ville', 'Ville :', "La Ville");
        $ville          ->setRequired(true);
        
        $country =      new Form_Field_Adresse_CountryField('country', "Pays :", "Le Pays");
        $country        ->setRequired(true);
        
        $submit =       new Zend_Form_Element_Submit("adduser_submit");
        $submit         ->setLabel($translator->translate("submit"));

        $this->addElements(array(
            $role,
            $login,
            $password,
            $name,
            $surname,
            $adress_l1,
            $adress_l2,
            $postal,
            $ville,
            $country,
            $submit
        ));
    }
}