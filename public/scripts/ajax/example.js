
function myObject(){
    this.ajaxAdapter = new zendAjaxAdapter("http://example.com/");
    
    this.ajaxAdapter.sendPost("module","controller","action",['key1', 'param1', 'key2', 'param2']);
    var responseObject = JSON.parse(this.ajaxAdapter.parent.xhr.responseText);
    if(responseObject.success){
        var content = responseObject.response;
    }
}