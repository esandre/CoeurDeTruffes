<?php

/**
 * Modéle virtuel gérant et vérifiant les informations nécessaires a la création/modif d'un utilisateur
 *
 * @author kryzaal
 */
class Application_Model_Virtual_User {
    
    private $_adresse;
    
    private $_personne;
    
    private $_login;
    
    public function __construct(Application_Model_Adresse $adresseModel,
                                Application_Model_Personne $personneModel,
                                Application_Model_Access_Login $loginModel) {
        $this->_adresse = $adresseModel;
        $this->_personne = $personneModel;
        $this->_login = $loginModel;
    }
    
    public function valid()
    {
        if(
        $this->_adresse     instanceof Application_Model_Adresse        &&
        $this->_adresse     ->valid()                                   &&
        $this->_personne    instanceof Application_Model_Personne       &&
        $this->_personne    ->valid()                                   &&
        $this->_login       instanceof Application_Model_Access_Login   &&
        $this->_login       ->valid()
        ) return true;
        else return false;
    }
    
    public function getAdresse()
    {
        return $this->_adresse;
    }
    
    public function setAdresse(Application_Model_Adresse $adresse)
    {
        $this->_adresse = $adresse;
    }
    
    public function getLogin()
    {
        return $this->_login;
    }
    
    public function setLogin(Application_Model_Access_Login $login)
    {
        $this->_login = $login;
    }
    
    public function getPersonne()
    {
        return $this->_personne;
    }
    
    public function setPersonne(Application_Model_Personne $personne)
    {
        $this->_personne = $personne;
    }
    
}