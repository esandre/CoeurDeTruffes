<?php

/**
 * Mapper de la table GpsCoords
 *
 * @author kryzaal
 */
class Application_Model_GpsCoordsMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'GpsCoords';
        parent::__construct();
    }
 
    public function save(Application_Model_GpsCoords $model)
    {
        $data = array(
            'latitude'    => $model->getLatitude(),
            'longitude' => $model->getLongitude(),
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_GpsCoords $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setLatitude($row->latitude)
            ->setLongitude($row->longitude);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_GpsCoords();
            $model->setId($row->id)
                ->setLatitude($row->latitude)
                ->setLongitude($row->longitude);
            $entries[] = $entry;
        }
        return $entries;
    }
}