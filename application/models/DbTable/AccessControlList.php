<?php

/**
 * Lien vers la vue AccessControlList de la base
 *
 * @author kryzaal
 */

class Application_Model_DbTable_AccessControlList extends Zend_Db_Table_Abstract{
    
    protected $_name    = 'AccessControlList';
    
    protected function _setupPrimaryKey()
    {
        $this->_primary = "id";
    }
}
