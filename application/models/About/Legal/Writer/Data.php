<?php

class Application_Model_About_Legal_Writer_Data {
    private $_date;
    private $_active;
    private $_locales;

    public function __construct($date, $active = true) {

        $validate = new Zend_Validate_Date(array("format" => "dd/MM/yyyy hh:mm"));
        if(!$validate->isValid($date)) {
            throw new Application_Model_Exception("Date $date is not valid !");
        } else {
            $this->_date = new Zend_Date($date, "dd/MM/yyyy hh:mm");
        }
        unset($validate);

        $this->_active = (bool) $active;
    }

    public function addLocale($locale, $text) {
        if(strlen($locale) != 5) {
            throw new Application_Model_Exception("$locale invalid");
        }

        $this->_locales[$locale] = $text;
    }

    /**
     * Renvoie la date de publication
     * @return Zend_Date $date
     */
    public function getDate() {
        return $this->_date;
    }

    public function getActive() {
        return $this->_active;
    }

    public function getLocale($key) {
        if(!array_key_exists($key, $this->_locales)){
            return array();
        }
        return $this->_locale[$key];
    }

    public function getLocales() {
        return $this->_locales;
    }
}