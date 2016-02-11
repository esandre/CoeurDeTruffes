<?php

/**
 * Lien vers la table Locale_Language de la base
 *
 * @author kryzaal
 */
class Application_Model_DbTable_Locale_Language extends Zend_Db_Table_Abstract {

    protected $_name = 'Locale_Language';
    protected $_primary = 'code';

    /**
     *  Vérifie si la locale est en base
     * @param string $locale
     * @return boolean 
     */
    public function exists($locale){
        try{
            if(empty($locale)) {
                throw new Application_Model_DbTable_Exception("Locale code is empty");
            }
            if(!is_string($locale)) {
                throw new Application_Model_DbTable_Exception("Locale [" . print_r($locale, true) . "] is not a string !");
            }

            $select = $this->select();
            $select->where('code = ?', $locale);

            $row = $this->fetchRow($select);
            if(empty($row)){
                return false;
            } else {
                return true;
            }
        } catch(Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't know if locale $locale exists", null, $e);
        }
    }
    
    public function getList() {
        try{
            $rows = $this->fetchAll();
            if(empty($rows)){
                return array();
            } else {
                $codes = array();
                foreach($rows as $row){
                    $codes[] = $row['name'];
                }
                return $codes;
            }
        } catch(Zend_Exception $e) {
            throw new Application_Model_DbTable_Exception("Can't fetch the list of existing locales", null, $e);
        }
    }

}
