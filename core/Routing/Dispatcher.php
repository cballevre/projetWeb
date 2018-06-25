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
    public function __construct() {

        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        try {
            $controller = self::loadController($this->request->controller, $this->request);
        } catch (\RuntimeException $e) {
            $controller = self::loadController("pages", $this->request);
            self::loadAction("error404", $controller);
        } finally {
            try {
                self::loadAction($this->request->action, $controller, $this->request->params);
            } catch (\RuntimeException $e) {
                if($this->request->controller != 'pages') {
                    $controller = self::loadController("pages", $this->request);
                }
                self::loadAction("error404", $controller);
            }
        }

    }

    /**
     * Permet de charger le controller en fonction de l'url demander par l'utilisateur
     */
    public static function loadController($name, $request){

        $name = ucfirst($name).'Controller';
        $namespace = '\App\Controller\\'. $name;
        $file = ROOT . DS . 'src/Controller/' . $name . '.php';
        if(file_exists($file)){
            require($file);
            $controller = new $namespace();
            $controller->setRequest($request);
            return $controller;
        } else {
            throw new \RuntimeException("File doesn't exist");
        }
    }

    /**
     * Permet d\'afficher l\'action demander par l\'utilisateur
     * @param $controller : Controller créer
     */
    public static function loadAction($name, $controller, $params = array()){

        if(method_exists($controller, $name)) {

            $reflect = new \ReflectionClass($controller);
            $reflectMethod = $reflect->getMethod($name);

            $methodParams = array();

            foreach ($reflectMethod->getParameters() as $reflectionParameter) {
                foreach ($params as $key => $value) {
                    if($reflectionParameter->getName() == $key) {
                      array_push($methodParams, $value);
                    }
                }
            }

            $controller->{$name}(...$methodParams);

        } else {
            throw new \RuntimeException("File doesn't exist");
        }
    }
}