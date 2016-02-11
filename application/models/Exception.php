<?php

/**
 * Exception mére pour les modéles
 *
 * @author kryzaal
 */
class Application_Model_Exception extends Zend_Exception{

    public function __construct($msg = '', $code = 0, Exception $previous = null) {
        parent::__construct($msg, $code, $previous);
    }
}