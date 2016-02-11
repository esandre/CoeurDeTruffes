<?php

/**
 * Element de formulaire permettant de choisir entre les groupes d'accés disponibles
 *
 * @author kryzaal
 */

class Form_Field_AccessGroup_Radio extends Zend_Form_Element_Radio{
    
    /**
     * Contructeur, prend le nom interne, le titre et la description du champ.
     * Peut egalement prendre la valeur par defaut.
     * 
     * @param string $internalName
     * @param string $label
     * @param string $description
     * @param string $default
     */
    public function __construct($internalName,$label,$description,$default = false) {
        parent::__construct($internalName);
        
        $formattedArray = array();
        
        $this->setLabel($label)
            ->setDescription($description);
        if($default !== false) $this->setValue($default);
        
        $model = new Application_Model_Access_AccessGroupMapper;
        $accessGroupArray = $model->fetchAll();
        unset($model);
        
        foreach($accessGroupArray as $accessGroup)
        {
            $formattedArray[$accessGroup->getName()] 
                    = $accessGroup->getUsualName();
        }
        if(array_key_exists('all', $formattedArray)) unset ($formattedArray['all']);
        
        unset ($accessGroupArray);
        
        $this->setMultiOptions($formattedArray);  
    } 
}
