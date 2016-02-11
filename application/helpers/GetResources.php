<?php

/**
 * View Helper renvoyant les ressources demandées
 *
 * @author kryzaal
 * @package Global Helpers
 * @todo Vérifier si Zend ne le gére pas déja
 */

class Zend_View_Helper_GetResources {
    
    public function getResources($resources)
    {
        if(is_array($resources))
        {
            return "Resources";
        }
        else return;
    }
}