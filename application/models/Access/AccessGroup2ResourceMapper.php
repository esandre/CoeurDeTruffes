<?php

/**
 * Mapper de la table AccessGroup2Resource
 *
 * @author kryzaal
 */

class Application_Model_Access_AccessGroup2ResourceMapper extends Application_Model_Utils_DbTableMapper
{

    public function __construct() {
        
        $this->_dbTableName = 'AccessGroup2Resource';
        parent::__construct();
    }
 
    public function save(Application_Model_Access_AccessGroup2Resource $model)
    {
        $data = array(
            'group_id'      => $model->getGroupId(),
            'resource_id'   => $model->getResourceId(),
            'allow'         => $model->getAllow(),
            'if_drop'       => $model->getIfDrop(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Access_AccessGroup2Resource $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setGroupId($row->group_id)
            ->setResourceId($row->resource_id)
            ->setAllow($row->allow)
            ->setIfDrop($row->if_drop);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Access_AccessGroup2Resource();
            $entry->setId($row->id)
                ->setGroupId($row->group_id)
                ->setResourceId($row->resource_id)
                ->setAllow($row->allow)
                ->setIfDrop($row->if_drop);
            $entries[] = $entry;
        }
        return $entries;
    }
}