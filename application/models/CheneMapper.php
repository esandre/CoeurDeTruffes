<?php

/**
 * Mapper de la table Chene
 *
 * @author kryzaal
 */

class Application_Model_CheneMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Chene';
        parent::__construct();
    }
 
    public function save(Application_Model_Chene $model)
    {
        $data = array(
            'date_plantation'    => $model->getDatePlantation(),
            'date_mort'          => $model->getDateMort(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Chene $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setDatePlantation($row->date_plantation)
            ->setDateMort($row->date_mort);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Chene();
            $model->setId($row->id)
                ->setDatePlantation($row->date_plantation)
                ->setDateMort($row->date_mort);
            $entries[] = $entry;
        }
        return $entries;
    }
}