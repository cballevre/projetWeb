<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:37
 */

namespace Core\Controller;

/**
 * Class Controller
 *
 * @package Core\Controller
 */
class Controller
{

    /**
     * @var
     */
    protected $request;
    /**
     * Retourne le nom du controller courant
     *
     * @var string
     */
    private $name;
    /**
     * @var array
     */
    private $var = array();
    /**
     * @var string
     */
    private $layout = "default";
    /**
     * @var
     */
    private $headline;
    /**
     * @var null
     */
    private $button_add = null;
    /**
     * @var null
     */
    private $button_import = null;
    /**
     * @var null
     */
    private $back = null;

    /**
     * Constructeur
     */
    function __construct()
    {
        $this->name = $this->setName();
    }

    /**
     * Permet d'avoir le nom du controller courant
     *
     * @return : Retourne un string
     */
    private function setName()
    {
        $name = str_replace(
            'App', '', str_replace(
                '\\', '', str_replace('Controller', '', get_class($this))
            )
        );

        return $name;
    }

    /**
     * Permet d'ajouter un variable à la page
     *
     * @param $var
     */
    function set($var)
    {
        $this->var = array_merge($this->var, $var);
    }

    /**
     * Permet de rendre une vue
     *
     * @param $action Nom de l'action à rendre
     */
    public function render($action)
    {
        extract($this->var);
        ob_start();
        require ROOT . 'src/View/' . $this->name . '/' . $action . '.php';
        $getContent = ob_get_clean();
        if(!empty($this->layout)) {
            require ROOT . 'src' . DS . 'View' . DS . 'Layout' . DS
                . $this->layout . '.php';
        }

    }

    /**
     * @param $action
     */
    public function renderWithoutLayout($action)
    {
        extract($this->var);
        ob_start();
        require ROOT . 'src/View/' . $this->name . '/' . $action . '.php';
        echo ob_get_clean();
    }

    /**
     * @param $json
     */
    public function renderJSON($json)
    {
        header('Content-Type: application/json');
        echo $json;
    }

    /**
     * Permet de changer la View pour l'action
     *
     * @param $layout : Layout choisit
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
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
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param mixed $headline
     */
    public function setHeadline($headline)
    {
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

    /**
     * @param $url
     */
    function redirect($url)
    {
        header("Location: " . $url);
    }

    /**
     * Permet de charger un composant
     *
     * @param $name : Nom du composant à charger
     */
    public function loadComponent($name)
    {
        $component = '\\Core\\Controller\\Component\\' . ucfirst($name)
            . 'Component';
        $this->{$name} = new $component();

    }
}