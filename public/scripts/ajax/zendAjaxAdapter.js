/*
 * zendAjaxAdapter : Un adaptateur JS fait pour le systéme module-ctrl-action
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function zendAjaxAdapter(baseUrl)
{
    this.parent = new ajaxAdapterInterface;
    this.response = null;
    this.responseCode = 0;
    this.baseUrl = baseUrl;

    this.sendPost = function(module,controller,action,paramsArray)
    {
        var page = this.makeUrl(module,controller,action);
        
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
    
    this.sendGet = function(module,controller,action,paramsArray)
    {
        var page = this.makeUrl(module,controller,action);
        
        var paramsString;
        
        for(var param in paramsArray)
        {
            paramsString += encodeURIComponent(param[0]) + "=" + encodeURIComponent(param[1]) + "&";
        }
        
        this.parent.xhr.open('GET', page + "?" + paramsString.substr(0,paramsString.length-1));
        this.parent.xhr.send(null);
    };
    
    this.makeUrl = function(module,controller,action)
    {
        if(module == "") module = "splash";
        if(controller == "") controller = "index";
        if(action == "") action = "index";
        
        return this.baseUrl + module + "/" + controller + "/" + action + "/";
    }
}