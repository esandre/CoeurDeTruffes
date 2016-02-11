<?php

/**
 * Description of GetEnclyclopedieArticle
 *
 * @author kryzaal
 */
class Zend_View_Helper_GetEncyclopedieArticle {
    
    public function getEncyclopedieArticle($articleId)
    {
        if(empty($articleId)) throw new Exception("Article id must be filled !");
        
        $mapper = new Application_Model_Logic_EncyclopedieMapper;
        $model = new Application_Model_Logic_Encyclopedie;
        if (!$mapper->find($articleId, $model)) throw new Exception("No article for this id");
        
        //$model->setTextFr(BBCode_Parser::parse($model->getTextFr()));
        //$model->setTextEn(BBCode_Parser::parse($model->getTextEn()));
        //$model->setTextCn(BBCode_Parser::parse($model->getTextCn()));
        
        return $model;
    }
}