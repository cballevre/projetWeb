<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 23:10
 */

namespace Core\Routing;

class Dispatcher
{

    /**
     *
     * @var Request
     */
    public $request;

    /**
     * Repartit les différente action en fonction de l'url
     * @param $url: L'url transmise par l'utilisateur
     */
    public function __construct(){

        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        try {
            $controller = $this->loadController($this->request->controller, $this->request->data);
        } catch (\RuntimeException $e) {
            $controller = $this->loadController("pages");
            $this->loadAction("error404", $controller);
        } finally {
            try {
                $this->loadAction($this->request->action, $controller);
            } catch (\RuntimeException $e) {
                $controller = $this->loadController("pages");
                $this->loadAction("error404", $controller);
            }
        }

    }

    /**
     * Permet de charger le controller en fonction de l'url demander par l'utilisateur
     */
    private function loadController($name, $data = array()){

        $name = ucfirst($name).'Controller';
        $namespace = '\App\Controller\\'. $name;
        $file = ROOT . DS . 'src/Controller/' . $name . '.php';
        if(file_exists($file)){
            require($file);
            $controller = new $namespace();
            $controller->setData($data);
            return $controller;
        } else {
            throw new \RuntimeException("File doesn't exist");
        }
    }

    /**
     * Permet d\'afficher l\'action demander par l\'utilisateur
     * @param $controller : Controller créer
     */
    private function loadAction($name, $controller){

        if(method_exists($controller, $name)) {
            if(!empty($this->request->params[0])){
                $controller->{$name}($this->request->params[0]);
            }else{
                $controller->{$name}();
            }
        } else {
            throw new \RuntimeException("File doesn't exist");
        }
    }
}