<?php

/**
 * Mapper de la table ProductionAnnuelle
 *
 * @author kryzaal
 */

class Application_Model_ProductionAnnuelleMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'ProductionAnnuelle';
        parent::__construct();
    }
 
    public function save(Application_Model_ProductionAnnuelle $model)
    {
        $data = array(
            'annee'    => $model->getAnnee(),
            'chene_id' => $model->getCheneId(),
            'production' => $model->getProduction()
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_ProductionAnnuelle $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setAnnee($row->annee)
            ->setCheneId($row->chene_id)
            ->setProduction($row->production);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_ProductionAnnuelle();
            $model->setId($row->id)
                ->setAnnee($row->annee)
                ->setCheneId($row->chene_id)
                ->setProduction($row->production);
            $entries[] = $entry;
        }
        return $entries;
    }
}
