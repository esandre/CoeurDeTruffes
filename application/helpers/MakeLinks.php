<?php

/**
 * 
 * Renvoie les liens formatés a partir d'un tableau d'adresses module_controller_action
 * 
 * @author kryzaal
 * @package Global Helpers
 *
 */

//Exemple d'array d'entrée
//
//$linksArrayExample = array(
//    "options" => array(
//        "class" => "maClasseCSSDeLiens",
//        "onClick" => "monActionJsDeClic"
//    ),
//    "link1" => array(
//        "module_controller_action" => "codeTraductionTexte",
//        "options" => array(
//            "id" => "monIdCssPourCeLien"
//        )
//    ),
//    "link2" => array(
//        "module_controller_action" => "codeTraductionTexte",
//        "options" => array(
//            "id" => "monIdCssPourCeLien",
//            "classe" => "maClasseQuiRemplaceLaClasseDefinieDansOptions"
//        )
//    ),
//);

class Zend_View_Helper_MakeLinks {
    
    /**
     * Contient les fragments necessaires pour construire une balise <a></a> correcte
     * @var array $_linkHtmlStrings
     */
    private static $_linkHtmlStrings = array(
    "begin" => "<a ",
    "end" => ">",
    "close" => "</a>",
    );
    
    /**
     * Construit les liens, au départ des adresses codées, qui deviennent des balises <a></a>
     * @param type $linksArray
     * @return array $links
     * @throws Exception $except
     */
    public function makeLinks($linksArray)
    {
        /**
         * Les options s'appliquant a tous les liens de la série
         * @var array $globalOptions
         */
        $globalOptions = array();
        
        /**
         * Les liens une fois la construction terminée
         * @var array $links
         */
        $links = array();
        
        /**
         * Balance une exception si on lui envoie autre chose qu'un tableau
         */
        if(!is_array($linksArray)) throw new Exception ("Links making fails : needs an array in input");
        
        /**
         * Si les options globales sont passées on les deplace vers un nouveau tableau
         */
        if(isset($linksArray['options'])){
            $globalOptions = $linksArray['options'];
            unset($linksArray['options']);
        }
        
        /**
         * La boucle des liens, remplir $links
         */
        foreach($linksArray as $key => $link)
        {
            try{
                $decodedLink = (array) $this->decode($link);
                $hrefString = (string) $this->makeHref($decodedLink['pageCode']);
                $paramsString = (string) $this->concatenateParams($decodedLink['params']);
            }
            catch(Exception $except)
            {
                
            }
            $links[$key] = (string) $this->_linkHtmlStrings['begin'].
                            $hrefString.$paramsString.
                            $this->_linkHtmlStrings['end'].
                            $decodedLink['text'].
                            $this->_linkHtmlStrings['close'];
        }
        
        /**
         * On balance le tableau terminé
         */
        return (array) $links;
    }
    
    /**
     * Décode un lien passé en array pour fournir un second array, déja traduit, plus clair et sans inutilités.
     * 
     * @param array $linkParams
     * @return array $decodedLink
     * @throws Exception $except
     */
    private function decode($linkParams)
    {
        $decodedLink = array(
            "pageCode" => "",
            "params" => array()
            );
        
        if(isset($linkParams['options'])){
            $decodedLink['params'] = $this->mergeParams($linkParams['options'],$globalOptions);
        }
        
        return (array) $decodedLink;
    }
    
    /**
     * A partir du code de la page au format module_controller_action, renvoie le lien réel
     * 
     * @param string $pageCode
     * @return string $hrefStr
     * @throws Exception $except
     */
    public function makeHref($pageCode)
    {
        if(!is_string($pageCode)) throw new Exception("Page Code must be a string !");
        $code = explode("_",$pageCode,3);
        $keys = array("module","controller","action");
        $pageCodeArray = array_combine($keys, $code);
        
        $module = !empty($pageCodeArray['module']) ? $pageCodeArray['module'] : "splash" ;
        $controller = !empty($pageCodeArray['controller']) ? $pageCodeArray['controller'] : "index" ;
        $action = !empty($pageCodeArray['action']) ? $pageCodeArray['action'] : "index" ;
        
        $hrefStr = '"'
                .'/'.$module
                .'/'.$controller
                .'/'.$action
                .'/"';
        
        return (string) $hrefStr;
    }
    
    /**
     * Crée et concaténe les chaînes de paramétres du lien puis les renvoie
     * 
     * @param array $paramsArray
     * @return string $paramsStr
     */
    private function concatenateParams($paramsArray)
    {
        $paramsStr = (string) "";
        
        foreach($paramsArray as $key => $param)
        {
            $paramsStr .= " " . $key . '="' . $param . '" ';
        }
        
        return (string) $paramsStr;
    }
}