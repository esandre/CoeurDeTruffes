<?php

class Application_Model_Resources {

    public static function get(array $resources){

        foreach($resources as $index => $resource){
            $resources[$index] = self::decode($resource);
        }

        return $resources;
    }

    private static function decode($code){
        $parts = explode("_", $code);
        $extension = array_pop($parts);
        $string = "/resources/" . implode("/", $parts) . "." . $extension;
        return $string;
    }
}
