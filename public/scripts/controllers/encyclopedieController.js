/*
 * EncyclopedieController
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function encyclopedieController()
{
    this.model = new encyclopedieMapper("http://truffes.localhost/");
    
    this.afficherArticleAction = function(node,id)
    {
        var response = this.model.getArticle(id);
        var element = document.querySelector(node);
        
        //Appel de la vue
        encyclopedieArticleView(element,
            {
                title:          response.title,
                description:    response.description,
                text:           response.text
            }
        );
    };
    
    this.afficherListeAction = function(node,rows,columns)
    {
        var response = this.model.getList(rows*columns);
        var element = document.querySelector(node);
        
        //@todo : remplir les tableaux onCLick et content avec response
        
        //Appel de la vue
        encyclopedieMenuView(element,
            {
                rows: rows,
                columns: columns,
                onClick: onCLick,
                content: content
            }
        );
    }
    
    this.afficherShort = function(id)
    {
        if(id) return id.title;
        else return "&nbsp;";
    }
    
    this.getOnClick = function(id)
    {
        if(id) return " onClick='ctrl.afficherArticleAction(\"#encyclopedie article\"," + id.id + ")'";
        else return "";
    }
}
    
    



