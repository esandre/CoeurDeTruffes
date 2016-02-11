/*
 * EnclyclopediePartial : Représente une entrée en base pour un article de la table encyclopedie, sans le texte
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function encyclopediePartial(){
    this.id             = null;
    this.title          = null;
    this.description    = null;

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
}