<?php

/**
 * Mapper de la table Truffiere
 *
 * @author kryzaal
 */
class Application_Model_TruffiereMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Truffiere';
        parent::__construct();
    }
 
    public function save(Application_Model_Truffiere $model)
    {
        $data = array(
            'nom'    => $model->getNom(),
            'adresse_id' => $model->getAdresseId(),
            'coords_id' => $model->getCoordsId()
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Truffiere $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setNom($row->nom)
            ->setAdresseId($row->adresse_id)
            ->setCoordsId($row->coords_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Truffiere();
            $model->setId($row->id)
                ->setNom($row->nom)
                ->setAdresseId($row->adresse_id)
                ->setCoordsId($row->coords_id);
            $entries[] = $entry;
        }
        return $entries;
    }
}