<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 30/05/2018
 * Time: 11:51
 */

namespace Core\Routing;


class Router
{

    /**
     *
     */
    static function parse($url, $request){

        $url = trim($url,'/');

        if(empty($url)){
            $url = 'pages/dashboard';
        }

        $params = explode('/', $url);

        $request->controller = $params[0];
        $request->action = isset($params[1]) ? $params[1] : 'index';
        $request->params = array_slice($_GET,2);

    }

}