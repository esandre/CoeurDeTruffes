/*
 * EnclyclopedieMappel : Liaison AJAX pour l'objet Article
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function encyclopedieMapper(baseUrl)
{
    this.ajaxAdapter = new zendAjaxAdapter(baseUrl);
    
    this.getArticle = function(id)
    {
        this.ajaxAdapter.sendPost("frontend","encyclopedie","afficher",['id',id]);
        return JSON.parse(this.ajaxAdapter.parent.xhr.responseText);
    }
    
    this.getPartial = function(id)
    {
        this.ajaxAdapter.sendPost("frontend","encyclopedie","afficher",['id',id,'partial',1]);
        return JSON.parse(this.ajaxAdapter.parent.xhr.responseText);
    }
    
    this.getList = function(limit)
    {
        this.ajaxAdapter.sendPost("frontend","encyclopedie","liste",['limit',limit]);
        return JSON.parse(this.ajaxAdapter.parent.xhr.responseText);
    }
}