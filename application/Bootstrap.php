<?php

/**
 * Bootstrap de l'application
 *
 * @author kryzaal
 * @package Bootstrap
 */

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initAutoload()
    {
        $loader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath'  => APPLICATION_PATH,
            'resourceTypes' => array(
                'patch' => array(
                    'path'      => 'patchs',
                    'namespace' => 'Patch',
                ),
                'lib' => array(
                    'path'  => '../library',
                    'namespace' => 'App',
                ),
            )));
        $this->setResourceLoader($loader);
        return $loader;
    }

    protected function _initDispatcher()
    {
        require_once(APPLICATION_PATH . "/patchs/Dispatcher.php");
        $dispatcher = new Application_Patch_Dispatcher();
        Zend_Controller_Front::getInstance()->setDispatcher($dispatcher);
        return $dispatcher;
    }

    protected function _initSession()
    {
        $session = new Zend_Session_Namespace;
        return $session;
    }

    protected function _initView()
    {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->headTitle('Truffes');
        $view->headLink()->appendStylesheet('/css/main.css');
        $view->addHelperPath(APPLICATION_PATH . '/helpers', 'View_Helper');
        $view->addHelperPath(APPLICATION_PATH . '/modules/frontend/views/helpers', 'View_Helper');

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
            'ViewRenderer'
        );
        $viewRenderer->setView($view);

        return $view;
    }

    protected function _initMenus()
    {
        $container['mainMenu'] = new Zend_Navigation(include ROOT_PATH . "/application/configs/navigation.php");
        Zend_Registry::set('mainMenu', $container['mainMenu']);
        $container['footer'] = new Zend_Navigation(include ROOT_PATH . "/application/configs/links/footer.php");
        Zend_Registry::set('footer', $container['footer']);
        return $container;
    }

    protected function _initLocale()
    {
        Zend_Loader::loadClass('Zend_Locale');
        Zend_Locale::setDefault('fr');
        $session = new Zend_Session_Namespace;

        $session->locale = !empty($session->locale) ? $session->locale : DEFAULT_LOCALE;
        $translator = new Zend_Translate(
            array(
                'adapter' => 'array',
                'content' => APPLICATION_PATH . '/languages/'.$session->locale.'.php',
                'locale'  => $session->locale
            )
        );

        Zend_Validate_Abstract::setDefaultTranslator($translator);
        Zend_Form::setDefaultTranslator($translator);
        Zend_Validate::setDefaultTranslator($translator);
        Zend_Registry::set("Zend_Translate", $translator);
    }

    protected function _initHashing()
    {
        $adminSalt = "6c78dad5a0ce33caf102e9c6af49b8a6";
        $clientSalt = "ae01484d0b139f612c5d59877dd3856b";

        Zend_Registry::set("md5_salt_admin", $adminSalt);
        Zend_Registry::set("md5_salt_client", $clientSalt);
    }
}

