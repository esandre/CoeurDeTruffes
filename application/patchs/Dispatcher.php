<?php

/**
 * Description of Dispatcher
 *
 * @author kryzaal
 */
class Application_Patch_Dispatcher extends Zend_Controller_Dispatcher_Standard {

    protected $_acl_model;

    protected $_autoloader;

    public function __construct(array $params = array()) {

        parent::__construct($params);
        $this->_autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Application',
            'basePath'  => APPLICATION_PATH,
            'resourceTypes' => array(
            'patch' => array(
                'path'      => 'patchs',
                'namespace' => 'Patch',)
            )));
    }

    protected function isAllowed(Zend_Controller_Request_Abstract $request)
    {
        /*$controller = $request->getControllerName();
        $module = $request->getModuleName();
        $action = $request->getActionName();

        $group = $this->getUserGroupId();

        $acl = new Application_Model_Access_AccessControlListMapper;
        return $acl->checkRights($group,$module,$controller,$action);*/
        return true;
    }

    protected function getUserGroupId()
    {
        $accGroups = $this->_autoloader->load("Access_AccessGroupMapper",'model');
        $session = new Zend_Session_Namespace();
        return ($session->currentUser['group']['id'] > 0)
                ? $session->currentUser['group']['id']
                : $accGroups->getDefaultUserGroupId();
    }

    protected function tryRedirection(Zend_Controller_Request_Abstract $request)
    {
        $controller = $request->getControllerName();
        $module = $request->getModuleName();
        $action = $request->getActionName();

        $newRequest = clone $request;
        $group = $this->getUserGroupId();

        $acl = new Application_Model_Access_AccessControlListMapper;
        $newRoad = $acl->getRedirectRoad($group,$module,$controller,$action);
        if($newRoad == NULL) throw new Exception("noredirect");

        $newRequest->setModuleName(!empty($newRoad['module'])?$newRoad['module']:'splash');
        $newRequest->setControllerName(!empty($newRoad['controller'])?$newRoad['controller']:'index');
        $newRequest->setActionName(!empty($newRoad['action'])?$newRoad['action']:'index');

        if($this->isAllowed($newRequest))
        {
            return $newRequest;
        }
        else throw new Exception("unallowed");
    }

    protected function isActualUserBan()
    {
        $session = new Zend_Session_Namespace();
        if(isset($session->currentUser) && $session->currentUser['group']['name'] != "all")
        {
            $model = new Application_Model_Access_LoginMapper;
            return $model->isBan($session->currentUser['id']);
        }
        return 0;
    }

    public function dispatch(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response)
    {
        $this->setResponse($response);

        /**
         * Get controller class
         */
        if (!$this->isDispatchable($request)) {
            $controller = $request->getControllerName();
            if (!$this->getParam('useDefaultControllerAlways') && !empty($controller)) {
                require_once 'Zend/Controller/Dispatcher/Exception.php';
                throw new Zend_Controller_Dispatcher_Exception('Invalid controller specified (' . $request->getControllerName() . ')');
            }

            $className = $this->getDefaultControllerClass($request);
        }
        else if($this->isActualUserBan())
        {
            $request->setModuleName("splash");
            $request->setControllerName("error");
            $request->setActionName("ban");
            $request->clearParams();
            $className = $this->getControllerClass($request);
        }
        else if(!$this->isAllowed($request)) {

            try
            {
                $newRequest = $this->tryRedirection($request);
                $request = $newRequest;
            }
            catch(Exception $exception)
            {
                if($exception->getMessage() == "unallowed" OR $exception->getMessage() == "noredirect"){
                    $controller = $request->getControllerName();
                    $module = $request->getModuleName();
                    $action = $request->getActionName();

                    $request->setModuleName("splash");
                    $request->setControllerName("error");
                    $request->setActionName("refused");
                    $request->clearParams();
                    $request->setParams(array(
                        "rq_controller" => $controller,
                        "rq_module" => $module,
                        "rq_action" => $action
                    ));
                }
            }
            $className = $this->getControllerClass($request);
        } else {
            $className = $this->getControllerClass($request);
            if (!$className) {
                $className = $this->getDefaultControllerClass($request);
            }
        }

        /**
         * Load the controller class file
         */
        $className = $this->loadClass($className);

        /**
         * Instantiate controller with request, response, and invocation
         * arguments; throw exception if it's not an action controller
         */
        $controller = new $className($request, $this->getResponse(), $this->getParams());
        if (!($controller instanceof Zend_Controller_Action_Interface) &&
            !($controller instanceof Zend_Controller_Action)) {
            require_once 'Zend/Controller/Dispatcher/Exception.php';
            throw new Zend_Controller_Dispatcher_Exception(
                'Controller "' . $className . '" is not an instance of Zend_Controller_Action_Interface'
            );
        }

        /**
         * Retrieve the action name
         */
        $action = $this->getActionMethod($request);

        /**
         * Dispatch the method call
         */
        $request->setDispatched(true);

        // by default, buffer output
        $disableOb = $this->getParam('disableOutputBuffering');
        $obLevel   = ob_get_level();
        if (empty($disableOb)) {
            ob_start();
        }

        try {
            $controller->dispatch($action);
        } catch (Exception $e) {
            // Clean output buffer on error
            $curObLevel = ob_get_level();
            if ($curObLevel > $obLevel) {
                do {
                    ob_get_clean();
                    $curObLevel = ob_get_level();
                } while ($curObLevel > $obLevel);
            }
            throw $e;
        }

        if (empty($disableOb)) {
            $content = ob_get_clean();
            $response->appendBody($content);
        }

        // Destroy the page controller instance and reflection objects
        $controller = null;
    }

}