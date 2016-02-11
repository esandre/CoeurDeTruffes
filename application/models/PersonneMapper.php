<?php

/**
 * Mapper de la table Personne
 *
 * @author kryzaal
 */
class Application_Model_PersonneMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'Personne';
        parent::__construct();
    }
 
    public function save(Application_Model_Personne $model)
    {
        $data = array(
            'id'        => $model->getId(),
            'nom'       => $model->getNom(),
            'prenom'    => $model->getPrenom(),
            'adresse_id'=> $model->getAdresseId()
        );
        
        $id = $model->getId();
        if (empty($id)) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Personne $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setNom($row->nom)
            ->setPrenom($row->prenom)
            ->setAdresseId($row->adresse_id);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Personne();
            $model->setId($row->id)
                ->setNom($row->nom)
                ->setPrenom($row->prenom)
                ->setAdresseId($row->adresse_id);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function getId(Application_Model_Personne $model) {
        $select = $this->getDbSelectObject();
        $select->where("nom = ?", $model->getNom())
                ->where("prenom = ?", $model->getPrenom())
                ->where("adresse_id = ?", $model->getAdresseId())
                ->order("id DESC");
        $resultSet = $select->query()->fetch();
        $res = var_export($model, true);
        if(empty($resultSet)) throw new Exception("No matching row in table `Personne` ! {$res}");
        else return($resultSet['id']);
    }
}