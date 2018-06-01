<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 28/05/2018
 * Time: 00:03
 */

namespace Core;

class Autoloader
{
    /**
     * Enregistrer notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    /**
     * Inclure le fichier correspondant à notre class
     * @param $class string Le nom de la class à charger
     */
    static function autoload($class){
        $params = explode('\\', $class);
        if($params[0] == 'App'){
            $result = ROOT . 'src';
            for ($i = 1; $i < count($params); $i++) {
                $result .= DS . $params[$i];
            }
            $result .= '.php';
            require $result;
        }elseif($params[0] == 'Core'){
            $result = ROOT . strtolower ($params[0]);
            for ($i = 1; $i < count($params); $i++) {
                $result .= DS . $params[$i];
            }
            $result .= '.php';
            require $result;
        }
    }
}