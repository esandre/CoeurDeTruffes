<?php

/**
 * Mapper de la table CodeDeblocage
 *
 * @author kryzaal
 */

class Application_Model_CodeDeblocageMapper extends Application_Model_Utils_DbTableMapper
{
    public function __construct() {
        $this->_dbTableName = 'CodeDeblocage';
        parent::__construct();
    }
 
    public function save(Application_Model_CodeDeblocage $model)
    {
        $data = array(
            'gift_card'    => $model->getGiftCard()
        );
 
        if (null === ($id = $model->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_CodeDeblocage $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->id)
            ->setGiftCard($row->gift_card);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_CodeDeblocage();
            $model->setId($row->id)
                ->setGiftCard($row->gift_card);
            $entries[] = $entry;
        }
        return $entries;
    }
}