<?php

/**
 * Mapper de la vue AccessControlList
 *
 * @author kryzaal
 */

class Application_Model_Access_AccessControlListMapper extends Application_Model_Utils_DbTableMapper
{

    public function __construct() {
        
        $this->_dbTableName = 'AccessControlList';
        parent::__construct();
    }
 
    public function find($id, Application_Model_Access_AccessControlList $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model = new Application_Model_Access_AccessControlList(
                $row->id,
                $row->acc_group,
                $row->acc_resource,
                $row->allow,
                $row->is_open,
                $row->if_drop
        );
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Access_AccessControlList(
                    $row->id,
                    $row->acc_group,
                    $row->acc_resource,
                    $row->allow,
                    $row->is_open,
                    $row->if_drop
            );
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function checkRights($groupId,$module,$controller = null,$action = null)
    {
        $groupMapper = new Application_Model_Access_AccessGroupMapper;
        $groupName = $groupMapper->getAccessGroupName($groupId);
        unset($groupMapper);
        
        $resultSet = $this->findRow($groupName,$module,$controller,$action);
        if(is_array($resultSet)) return $resultSet['allow'];
        
        $resultSet = $this->findRow($groupName,$module,$controller,null);
        if(is_array($resultSet)) return $resultSet['allow'];
        
        $resultSet = $this->findRow($groupName,$module,null,null);
        if(is_array($resultSet)) return $resultSet['allow'];
        
        return 0;
        
    }
    
    public function findRow($groupName,$module,$controller = null,$action = null)
    {
        $str = $module;
        $str .= empty($controller) ? "" : "_".$controller;
        $str .= empty($action) ? "" : "_".$action;
        
        $select = $this->getDbSelectObject();
        $select->where("acc_resource LIKE ?",$str)
                ->where("acc_group LIKE ?",$groupName);
        
        return $this->getDbTable()->getAdapter()->query($select->__toString())->fetch();
    }
    
    public function getRedirectRoad($groupId,$module,$controller = null,$action = null)
    {
        $groupMapper = new Application_Model_Access_AccessGroupMapper;
        $groupName = $groupMapper->getAccessGroupName($groupId);
        unset($groupMapper);
        
        $row = $this->findRow($groupName, $module, $controller, $action);
        if(is_array($row) && $row['if_drop'] != NULL)
        {
            $array = explode('_',$row['if_drop']);
            $keys = array("module","controller","action");
            return array_combine($keys, $array);
        }
        return NULL;
    }
}