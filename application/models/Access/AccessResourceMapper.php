<?php

/**
 * Mapper de la table AccessResourceMapper
 *
 * @author kryzaal
 */

class Application_Model_Access_AccessResourceMapper extends Application_Model_Utils_DbTableMapper
{

    public function __construct() {
        
        $this->_dbTableName = 'AccessResourceMapper';
        parent::__construct();
    }
 
    public function save(Application_Model_Access_AccessResource $model)
    {
        $data = array(
            'name'      => $model->getResName(),
            'open'          => $model->getOpen(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Access_AccessResource $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setResName($row->name)
            ->setOpen($row->open);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Access_AccessResource();
            $entry->setId($row->id)
                ->setResName($row->name)
                ->setOpen($row->open);
            $entries[] = $entry;
        }
        return $entries;
    }
}