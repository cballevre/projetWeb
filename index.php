<?php

/**
 * Configuration de l'url
 */
require './config/bootstrap.php';

/* require 'core/Autoloader.php';
Core\Autoloader::register(); */
$controller = $_GET['controller'];
$action = $_GET['action'];

if(empty($controller)){
    $controller = 'Pages';
    $action = 'home';
}

if(empty($action)){
    $action = 'home';
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
        echo 'erreur 404 - action not found';
    }

}else{
    echo 'erreur 404 - controller not found';
}


