<?php

/**
 * DESCRIPTION --
 * 
 * @author : Kryzaal
 */

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        
    $this->_helper->viewRenderer->setViewSuffix('phtml');
    $errors = $this->_getParam('error_handler');
 
    switch ($errors->type) {
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        // 404 error -- controller or action not found
        $this->getResponse()->setHttpResponseCode(404);
        $this->view->message = 'Page not found';
        $this->view->code  = 404;
        if ($errors->type == Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER) {
          $this->view->info = sprintf(
                      'Unable to find controller "%s" in module "%s"',
                      $errors->request->getControllerName(),
                      $errors->request->getModuleName()
                    );
        }
        if ($errors->type == Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION) {
          $this->view->info = sprintf(
                      'Unable to find action "%s" in controller "%s" in module "%s"',
                      $errors->request->getActionName(),
                      $errors->request->getControllerName(),
                      $errors->request->getModuleName()
                    );
        }
        break;
      case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
      default:
        // application error
        $this->getResponse()->setHttpResponseCode(500);
        $this->view->message = 'Application error';
        $this->view->code  = 500;
        $this->view->info  = $errors->exception;
        break;
    }

    $this->view->title = 'Error!';
    $this->view->heading = 'Error!';
 
    // pass the environment to the view script so we can conditionally
    // display more/less information
    $this->view->env   = $this->getInvokeArg('env');
 
    // pass the actual exception object to the view
    $this->view->exception = $errors->exception;
 
    // pass the request to the view
    $this->view->request = $errors->request;
    
    }
    
    public function refusedAction()
    {
        $request = $this->getRequest();
        $params = $request->getParams();
        
        $groupsMapper = new Application_Model_Access_AccessGroupMapper;
        $actualGroup = new Application_Model_Access_AccessGroup;
        $aclMapper = new Application_Model_Access_AccessControlListMapper;
        $session = new Zend_Session_Namespace;
        
        $groupsMapper->find($session->currentUser['group']['id'], $actualGroup);
        if(!$actualGroup->getName() OR !$actualGroup->getId())
        {
            $actualGroup = new Application_Model_Access_AccessGroup();
            $actualGroup->setId($groupsMapper->getDefaultUserGroupId())
                    ->setName("all");
        }
        
        $actualAcl = $aclMapper->findRow(
                $actualGroup->getName(),
                $params['rq_module'],
                $params['rq_controller'],
                $params['rq_action']
        );
        if($actualAcl == false)
        {
            $actualAcl = new Application_Model_Access_AccessControlList(0, "admin", 
                $params['rq_module']."_".
                $params['rq_controller']."_".
                $params['rq_action'],0,0,NULL);
        }
        
        $this->view->actualAcl = $actualAcl;
        $this->view->actualGroup = $actualGroup;
    }
    
    public function banAction()
    {
        
    }
}
