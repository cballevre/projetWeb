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
    private $button_add = null;
    private $button_import = null;
    private $back = null;
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

    public function renderWithoutLayout($action) {
        extract($this->var);
        ob_start();
        require ROOT .'src/View/'.$this->name.'/'.$action.'.php';
        echo ob_get_clean();
    }

    public function renderJSON($json) {
        header('Content-Type: application/json');
        echo $json;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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

    /**
     * @param null $button_add
     */
    public function setButtonAdd($button_add)
    {
        $this->button_add = $button_add;
    }

    /**
     * @param null $button_import
     */
    public function setButtonImport($button_import)
    {
        $this->button_import = $button_import;
    }

    /**
     * @param null $back
     */
    public function setBack($back)
    {
        $this->back = $back;
    }

    function redirect($url) {
        header("Location: ".$url);
    }

    /**
     * Permet de charger un composant
     * @param $name : Nom du composant à charger
     */
    public function loadComponent($name)
    {
        $component = '\\Core\\Controller\\Component\\'. ucfirst($name) . 'Component';
        $this->{$name} = new $component();

    }
}