<?php

/**
 * Configuration de l'url
 */
require './config/bootstrap.php';

/* require 'core/Autoloader.php';
Core\Autoloader::register(); */

if(empty($controller) && empty($action)){
    $controller = 'pages';
    $action = 'home';
} else {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}

if(file_exists('src/Controller/' . $controller . 'Controller.php')) {

    require ('core/Controller.php');
    require ('src/Controller/AppController.php');
    require('src/Controller/' . $controller . 'Controller.php');

    $controller = $controller . "Controller";
    $controller = new $controller();

    if(method_exists($controller, $action)) {
        $controller->$action();
    }else{
        echo 'erreur 404';
    }

}else{
    echo 'erreur 404';
}


