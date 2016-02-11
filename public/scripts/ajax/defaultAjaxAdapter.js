/*
 * defaultAjaxAdapter : L'adaptateur AJAX majeur
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function defaultAjaxAdapter()
{
    this.parent = new ajaxAdapterInterface;
    this.response = null;
    this.responseCode = 0;

    this.sendPost = function(page,paramsArray)
    {
        this.parent.xhr.open('POST', page);
        this.parent.xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        var paramsString = '';
        for(var i = 0; i != paramsArray.length; i++)
        {
            if((i%2) == 0 || (i == 0)) paramsString += paramsArray[i] + "=";
            else paramsString += paramsArray[i] + "&";
        }
        this.parent.xhr.send(paramsString.substr(0,paramsString.length-1));
        alert("");
    }
    
    this.sendGet = function(page,paramsArray)
    {
        var paramsString;
        
        for(var param in paramsArray)
        {
            paramsString += encodeURIComponent(param[0]) + "=" + encodeURIComponent(param[1]) + "&";
        }
        
        this.parent.xhr.open('GET', page + "?" + paramsString.substr(0,paramsString.length-1));
        this.parent.xhr.send(null);
    };

}
