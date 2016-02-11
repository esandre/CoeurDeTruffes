<?php

/**
 * Renvoie le menu principal généré a partir du container
 *
 * @author kryzaal
 */
class Zend_View_Helper_GetMainMenu {

    public function getMainMenu($method = "json") {
        $container = Zend_Registry::get('mainMenu');
        if ($method == "json") {
            $pages = array();
            foreach ($container as $page) {
                $pages[] = array(
                    'id' => $page->getId(),
                    'href' => $page->getHref(),
                    'class' => $page->getClass(),
                    'label' => $page->getClass()
                );
            }
            return Zend_Json::encode($pages);
        } elseif ($method == "html") {
            $finalString = "";
            foreach ($container as $page) {
                $finalString .=
                        '<a href="' . $page->getHref() . '" class="' . $page->getClass() . '" id="' . $page->getId() . '">'
                        . $page->getLabel()
                        . '</a>';
            }
            return $finalString;
        } else
            throw new Zend_View_Exception("Unknown method $method to render mainMenu");
    }

}