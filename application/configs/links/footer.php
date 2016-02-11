<?php
/** modif */
return array(
    array(
    'type' => 'mvc',
    'label' => "Contact",
    'id' => "footer_contact",
    'class' => "footer_element",
    'order' => 1,
    'action' => 'index',
    'controller' => 'contact',
    'module' => 'frontend'
    ),
    array(
    'type' => 'mvc',
    'label' => "FAQ",
    'id' => "footer_faq",
    'class' => "footer_element",
    'order' => 2,
    'action' => 'faq',
    'controller' => 'contact',
    'module' => 'frontend'
    ),
    array(
    'type' => 'mvc',
    'label' => "Condition générales de vente",
    'id' => "footer_cgv",
    'class' => "footer_element",
    'order' => 4,
    'action' => 'cgv',
    'controller' => 'about',
    'module' => 'frontend'
    ),
    array(
    'type' => 'mvc',
    'label' => "Mentions Légales",
    'id' => "footer_legal",
    'class' => "footer_element",
    'order' => 6,
    'action' => 'legal',
    'controller' => 'about',
    'module' => 'frontend'
    ),
    array(
    'type' => 'mvc',
    'label' => "&copy 2012 Coeur de Truffes",
    'id' => "footer_cdt",
    'class' => "footer_element",
    'order' => 7,
    'action' => 'index',
    'controller' => 'about',
    'module' => 'frontend'
    ),
);
