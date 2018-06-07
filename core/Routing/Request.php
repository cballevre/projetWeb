<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 30/05/2018
 * Time: 11:49
 */

namespace Core\Routing;


class Request
{

    /**
     * URL appellé par l'utilisateur
     * @var string
     */
    public $url;

    /**
     * Données envoyé dans le formulaire
     * @var array
     */
    public $prefix = false;

    /**
     * Données envoyé dans le formulaire
     * @var array
     */
    public $data = false;

    /**
     * Request constructor.
     * @param $url
     */
    public function __construct()
    {
        
        $this->url = '/';

        if(isset($_GET['controller'])) {
            $this->url .= $_GET['controller'];
            if(isset($_GET['action'])) {
                $this->url .= '/';
                $this->url .= $_GET['action'];
            }
        }  else if($_SERVER['REQUEST_URI'] != '/') {
            $this->url = '/pages/error404';
        }
        
       // $this->url = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : '/';

        if(!empty($_POST)){
            $this->data = new \stdClass();
            foreach($_POST as $key => $values){
                $this->data->$key = $values;
            }
        }

    }

}