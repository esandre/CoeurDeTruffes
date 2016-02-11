<?php

/**
 * Mapper de la table Emplacement
 *
 * @author kryzaal
 */
class Application_Model_EmplacementMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Emplacement';
        parent::__construct();
    }
 
    public function save(Application_Model_Emplacement $model)
    {
        $data = array(
            'row_id'    => $model->getRowId(),
            'column_id' => $model->getColumnId(),
            'client_id' => $model->getClientId(),
            'code_deblocage_id' => $model->getCodeDeblocageId(),
            'arbre_id' => $model->getArbreId(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Emplacement $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setRowId($row->row_id)
            ->setColumnId($row->column_id)
            ->setClientId($row->client_id)
            ->setCodeDeblocageId($row->code_deblocage_id)
            ->setArbreId($row->arbre_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Emplacement();
            $model->setId($row->id)
                ->setColumnId($row->column_id)
                ->setClientId($row->client_id)
                ->setCodeDeblocageId($row->code_deblocage_id)
                ->setArbreId($row->arbre_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}