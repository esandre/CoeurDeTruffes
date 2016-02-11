/*
 * ajaxAdapterInterface : Classe commune a tous les adaptateurs AJAX
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function ajaxAdapterInterface()
{
    this.xhr = new XMLHttpRequest();
    this.response = null;
    this.responseCode = 0;
    
    this.xhr.onreadystatechange = function() {
        
        this.responseCode = this.xhr.readyState;
        
        switch(this.xhr.readyState)
        {
            case 0:
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                if(this.xhr.status == 200) this.response = this.xhr.responseText;
                break;
            default:
                break;     
        }
    };
}
