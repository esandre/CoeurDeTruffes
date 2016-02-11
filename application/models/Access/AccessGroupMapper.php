<?php

/**
 * Mapper de la table AccessGroup
 *
 * @author kryzaal
 */

class Application_Model_Access_AccessGroupMapper extends Application_Model_Utils_DbTableMapper
{

    public function __construct() {
        
        $this->_dbTableName = 'AccessGroup';
        parent::__construct();
    }
 
    public function save(Application_Model_Access_AccessGroup $model)
    {
        $data = array(
            'name'       => $model->getName(),
            'usual_name' => $model->getUsualName(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Access_AccessGroup $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setName($row->name)
            ->setUsualName($row->usual_name);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Access_AccessGroup();
            $entry->setId($row->id)
                ->setName($row->name)
                ->setUsualName($row->usual_name);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function getDefaultUserGroupId()
    {
        return $this->getIdFromName("all");
    }
    
    public function getIdFromName($name)
    {
        $name = (string) $name;
        $select = $this->getDbSelectObject();
        $select->where("name LIKE '$name'");
        $resultSet = $this->getDbTable()->getAdapter()->query($select->__toString())->fetchAll();
        if(count($resultSet) == 1) return $resultSet[0]['id'];
        else return 0;
    }
    
    public function getAccessGroupName($id)
    {
        $group = new Application_Model_Access_AccessGroup; 
        $this->find($id,$group);
        return $group->getName();
    }
}