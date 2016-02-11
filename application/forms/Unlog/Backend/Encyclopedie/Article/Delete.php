<?php

class Form_Unlog_Backend_Encyclopedie_Article_Delete extends Zend_Form {

    protected $_name = "Form_Unlog_Backend_Encyclopedie_Article_Delete";

    public function __construct($options = null) {

        parent::__construct($options);

        $this->addElements($this->_buildElements());
    }

    private function _buildElements() {

        $yes = new Zend_Form_Element_Submit($this->_name . "_Yes");
        $yes->setLabel("Oui");
        $yes->removeDecorator("dtDdWrapper");

        $no = new Zend_Form_Element_Submit($this->_name . "_No");
        $no->setLabel("Non");
        $no->removeDecorator("dtDdWrapper");

        return array(
            $yes,
            $no,
        );
    }
}