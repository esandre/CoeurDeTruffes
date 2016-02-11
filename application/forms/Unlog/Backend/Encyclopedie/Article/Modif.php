<?php

class Form_Unlog_Backend_Encyclopedie_Article_Modif extends Zend_Form {

    protected $_name = "Form_Unlog_Backend_Encyclopedie_Article_Modif";
    private $_localeLanguageTable;

    public function __construct($options = null) {
        $this->_localeLanguageTable = new Application_Model_DbTable_Locale_Language();

        parent::__construct($options);

        $this->addElements($this->_buildTranslateFields());
        $this->addElements($this->_buildElements());
    }

    private function _buildElements() {

        $submit = new Zend_Form_Element_Submit($this->_name . "_Submit");
        $submit->setLabel("Modifier");
        $submit->addDecorators(array(
                "br" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "br",
                "noAttribs" => true
                )),
                "hr" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "hr",
                "noAttribs" => true
                )),
            ));

        return array(
            $submit
        );
    }

    private function _buildTranslateFields() {
        $finalArray = array();
        foreach ($this->_localeLanguageTable->getList() as $locale) {

            $titre = new Zend_Form_Element_Text($this->_name . "_Titre_" . $locale);
            $titre->setLabel("Titre " . $locale);
            $titre->addDecorators(array(
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

            $text = new Zend_Form_Element_Textarea($this->_name . "_Text_" . $locale);
            $text->setLabel("Texte " . $locale);
            $text->addDecorators(array(
                "article" => new Zend_Form_Decorator_HtmlTag(array(
                "tag" => "article",
                "closeOnly" => true
                ))
            ));

            $finalArray[] = $titre;
            $finalArray[] = $text;
        }
        return $finalArray;
    }

}