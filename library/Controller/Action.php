<?php

/**
 * Description of Redirect_Short
 *
 * @author kryzaal
 */
class App_Controller_Action extends Zend_Controller_Action {
    
    protected function _redirect($module,$controller = null,$action = null,$params = null)
    {
        $router = $this->getFrontController()->getRouter();
        return $this->_redirect(
                $router->assemble(
                        array('module' => $module,'controller' => $controller,'action' => $action,'params' => $params)
                        ),
                array('prependBase' => false)
        );
    }
}
