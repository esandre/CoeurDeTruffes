<?php

/**
 * Mapper de la table Adresse
 *
 * @author kryzaal
 */
class Application_Model_AdresseMapper extends Application_Model_Utils_DbTableMapper {

    public function __construct() {

        $this->_dbTableName = 'Adresse';
        parent::__construct();
    }

    public function save(Application_Model_Adresse $model) {
        $data = array(
            'id' => $model->getId(),
            'ligne_1' => $model->getLigne_1(),
            'ligne_2' => $model->getLigne_2(),
            'code_postal' => $model->getCode_Postal(),
            'ville' => $model->getVille(),
            'pays' => $model->getPays(),
        );
        $id = $model->getId();
        if (empty($id)) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Adresse $model) {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
                ->setLigne_1($row->ligne_1)
                ->setLigne_2($row->ligne_2)
                ->setCode_Postal($row->code_postal)
                ->setVille($row->ville)
                ->setPays($row->pays);
    }

    public function fetchAll() {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Adresse();
            $entry->setId($row->id)
                    ->setLigne_1($row->ligne_1)
                    ->setLigne_2($row->ligne_2)
                    ->setCode_Postal($row->code_postal)
                    ->setVille($row->ville)
                    ->setPays($row->pays);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function getId(Application_Model_Adresse $model) {
        $select = $this->getDbSelectObject();
        $select->where("ligne_1 = ?", $model->getLigne_1())
                ->where("ligne_2 = ?", $model->getLigne_2())
                ->where("code_postal = ?", $model->getCode_Postal())
                ->where("ville = ?", $model->getVille())
                ->where("pays = ?", $model->getPays())
                ->order("id DESC");
        $resultSet = $select->query()->fetch();
        if(empty($resultSet)) throw new Exception("No matching row in table `Adresse` !");
        else return($resultSet['id']);
    }

}