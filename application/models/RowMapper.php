<?php

/**
 * Mapper de la table Row
 * 
 * @author : Kryzaal
 */

class Application_Model_RowMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Row';
        parent::__construct();
    }
 
    public function save(Application_Model_Row $model)
    {
        $data = array(
            'row_id' => $model->getRowId()
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Row $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setRowId($row->row_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Row();
            $model->setId($row->id)
                ->setRowId($row->row_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}