<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:37
 */

namespace Core\Controller;

class Controller
{

    /**
     * Retourne le nom du controller courant
     * @var string
     */
    private $name;
    private $var = array();
    private $layout = "default";
    private $headline;
    protected $request;

    /**
     * Constructeur
     */
    function __construct() {
        $this->name = $this->setName();
    }

    /**
     * Permet d'ajouter un variable à la page
     * @param $var
     */
    function set($var) {
        $this->var = array_merge($this->var, $var);
    }

    /**
     * Permet de rendre une vue
     * @param $action Nom de l'action à rendre
     */
    public function render($action) {
        extract($this->var);
        ob_start();
        require ROOT .'src/View/'.$this->name.'/'.$action.'.php';
        $getContent = ob_get_clean();
        if(!empty($this->layout)){
            require ROOT. 'src'. DS.'View'.DS.'Layout'.DS. $this->layout .'.php';
        }
    }

    /**
     * Permet de changer la View pour l'action
     * @param $layout : Layout choisit
     */
    public function setLayout($layout) {
        $this->layout = $layout;
    }

    /**
     * Permet d'avoir le nom du controller courant
     *
     * @return : Retourne un string
     */
    private function setName() {
        $name = str_replace('App','',str_replace('\\', '', str_replace('Controller','',get_class($this))));
        return $name;
    }

    /**
     * @return mixed
     */
    public function getHeadline() {
        return $this->headline;
    }

    /**
     * @param mixed $headline
     */
    public function setHeadline($headline) {
        $this->headline = $headline;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    function redirect($url) {
        header("Location: ".$url);
    }

}