<?php

/**
 * Mapper de la table Intervenant
 *
 * @author kryzaal
 */

class Application_Model_IntervenantMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Intervenant';
        parent::__construct();
    }
 
    public function save(Application_Model_Intervenant $model)
    {
        $data = array(
            'personne_id'    => $model->getPersonneId(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Intervenant $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setPersonneId($row->personne_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Intervenant();
            $model->setId($row->id)
                ->setPersonneId($row->personne_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}