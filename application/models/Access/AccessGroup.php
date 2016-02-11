<?php

/**
 * Représente une entrée dans la table AccessGroup
 *
 * @author kryzaal
 */
class Application_Model_Access_AccessGroup extends Application_Model_Utils_DbRowObject {

    protected $_id;
    protected $_name;
    protected $_usual_name;

    public function __construct(array $options = null) {
        parent::__construct($options);
    }

    public function setId($id) {
        $this->_id = (int) $id;
        return $this;
    }

    public function getId() {
        return (int) $this->_id;
    }

    public function setName($str) {
        $this->_name = (string) $str;
        return $this;
    }

    public function getName() {
        return (string) $this->_name;
    }

    public function setUsualName($str) {
        $this->_usual_name = (string) $str;
        return $this;
    }

    public function getUsualName() {
        return (string) $this->_usual_name;
    }

}

