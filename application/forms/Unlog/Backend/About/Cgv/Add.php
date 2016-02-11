<?php

/**
 * Description of Add
 *
 * @author kryzaal
 */

class Form_Unlog_Backend_About_Cgv_Add extends Zend_Form {

    protected $_name = "Form_Unlog_Backend_About_Cgv_Add";
    private $_localeLanguageTable;

    public function __construct($options = null) {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();

        parent::__construct($options);

        $this->addElements($this->_buildTranslateFields());
        $this->addElements($this->_buildElements());
    }

    private function _buildElements() {

        $date = new Zend_Form_Element_Text($this->_name . "_Date");
        $date->setLabel("Date de publication");
        $date->addValidator(new Zend_Validate_Date(array("format" => "dd/MM/yyyy hh:mm")), true);
        $date->setDescription("JJ/MM/AAAA hh:mm");
        $date->setAttrib("size", 16);
        $date->addDecorators(array(
                "br" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "br",
                "noAttribs" => true
                )),
                "hr" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "hr",
                "noAttribs" => true
                )),
            ));

        $active = new Zend_Form_Element_Checkbox($this->_name . "_Active");
        $active->setLabel("Est Actif");
        $active->removeDecorator("dtDdWrapper");

        $submit = new Zend_Form_Element_Submit($this->_name . "_Submit");
        $submit->setLabel("Creer");

        return array(
            $date,
            $active,
            $submit
        );
    }

    private function _buildTranslateFields() {
        $finalArray = array();
        foreach ($this->_localeLanguageTable->getList() as $locale) {

            $text = new Zend_Form_Element_Textarea($this->_name . "_Text_" . $locale);
            $text->setLabel("Texte " . $locale);
            $text->addDecorators(array(
                "article" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "article",
                "openOnly" => true
                )),
                "br" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "br",
                "noAttribs" => true
                )),
                "hr" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "hr",
                "noAttribs" => true
                )),
            ));

            $finalArray[] = $text;
        }
        return $finalArray;
    }

}