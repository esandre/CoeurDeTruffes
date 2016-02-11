<?php

/**
 * Mapper de la table Arbre2EmplacementMapper
 *
 * @author kryzaal
 */

class Application_Model_Arbre2EmplacementMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Arbre2Emplacement';
        parent::__construct();
    }
 
    public function save(Application_Model_Arbre2Emplacement $model)
    {
        $data = array(
            'emplacement_id'    => $model->getEmplacementId(),
            'arbre_id'          => $model->getArbreId(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Arbre2Emplacement $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setEmplacementId($row->emplacement_id)
            ->setArbreId($row->arbre_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Arbre2Emplacement();
            $model->setId($row->id)
                ->setEmplacementId($row->emplacement_id)
                ->setArbreId($row->arbre_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}