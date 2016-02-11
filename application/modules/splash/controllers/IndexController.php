<?php

/**
 * Controller index du module Splash, page par defaut, redirige le visiteur egaré vers une page valide.
 *
 * @package Truffes
 * @author kryzaal
 */

class IndexController extends Zend_Controller_Action
{
    /**
     * Action Index, redirige vers une autre page le visiteur egaré.
     * Sera amené a gérer les fermetures du site, les banlist ...
     * 
     * @author kryzaal
     * @package Truffes
     */
    public function indexAction()
    {    
        try{ 
            //On récupére le routeur de l'application
            $router = $this->getFrontController()->getRouter();
            
            //On récupére les sessions
            $session = new Zend_Session_Namespace;
        }
        //En cas de fail ...
        catch(Exception $exception)
        {
            //On balance un message pré-mâché au visiteur ...
            if(APPLICATION_ENV == "production")
            {
                throw new Exception("Fatal Error in loading some modules","1001",$exception);
            }
            //... Ou du lourd pour les devs
        }
        
        /**
         * DEBUG SEULEMENT
         */
        $this->_redirect($router->assemble(array('module' => 'frontend','controller' => 'encyclopedie','action' => 'index')),array('prependBase' => false));
    }
}
