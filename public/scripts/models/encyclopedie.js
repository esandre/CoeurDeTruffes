/*
 * EnclyclopedieModel : Représente une entrée en base pour un article de la table encyclopedie
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function encyclopedieModel(){
    this.id             = null;
    this.title          = null;
    this.description    = null;
    this.text_fr        = null;
    this.text_en        = null;
    this.text_cn        = null;

    this.getId          = function(){
        return this.id;
    }
    
    this.setId          = function(id)
    {
        this.id = id;
    }
    
    this.getTitle       = function(){
        return this.title;
    }
    
    this.setTitle       = function(title)
    {
        this.title = title;
    }
    
    this.getDescription = function(){
        return this.description;
    }
    
    this.setDescription = function(desc)
    {
        this.description = desc;
    }
    
    this.getTextFr      = function(){
        return this.text_fr;
    }
    
    this.setTextFr      = function(text)
    {
        this.text_fr = text;
    }
    
    this.getTextEn      = function(){
        return this.text_en;
    }
    
    this.setTextEn      = function(text)
    {
        this.text_en = text;
    }
    
    this.getTextCn      = function(){
        return this.text_cn
    }
    
    this.setTextCn      = function(text)
    {
        this.text_cn = text;
    }
}