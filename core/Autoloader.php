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
            require ROOT.'src'.DS . $params[1]. DS .$params[2].'.php';
        }elseif($params[0] == 'Core'){
            require ROOT.'vendor'.DS.$params[0].DS. $params[1].'.php';
        }
    }
}