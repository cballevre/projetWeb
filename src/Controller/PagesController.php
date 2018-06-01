<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:43
 */

namespace App\Controller;

class PagesController extends AppController
{

    public function home() {

        $var = array(
          "message" => "new welcome"
        );
        $this->set($var);
        $this->render('home');
    }

    public function dashboard() {

        $var = array(
            "message" => "test dashboard"
        );
        $this->set($var);
        $this->render('home');
    }

    public function error() {
        $this->render('error');
    }

}