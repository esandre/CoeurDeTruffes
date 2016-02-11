<?php

/**
 * Mapper de la table Intervenant2Truffiere
 *
 * @author kryzaal
 */

class Application_Model_Intervenant2TruffiereMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Intervenant2Truffiere';
        parent::__construct();
    }
 
    public function save(Application_Model_Intervenant2Truffiere $model)
    {
        $data = array(
            'truffiere_id'    => $model->getTruffiereId(),
            'intervenant_id' => $model->getIntervenantId(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Intervenant2Truffiere $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setTruffiereId($row->truffiere_id)
            ->setIntervenantId($row->intervenant_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Intervenant2Truffiere();
            $model->setId($row->id)
                ->setTruffiereId($row->truffiere_id)
                ->setIntervenantId($row->intervenant_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}