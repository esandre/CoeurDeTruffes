/*
 * zendPageCode : Un code de page Zend
 * 
 * @author : kryzaal
 * @package : Truffes:JS
 */

function zendPageCode(code)
{
    this.module = null;
    this.controller = null;
    this.action = null;
    this.code = code;
    
    this.code.split("_",3);
    if(this.code[0] == "") this.module      = "splash";
    if(this.code[1] == "") this.controller  = "index";
    if(this.code[2] == "") this.action      = "index";
        
    this.getUrl = function(){   
        return  "http://truffes.localhost"
                + '/' + this.code[0]
                + '/' + this.code[1]
                + '/' + this.code[2];
    }
        
        
}