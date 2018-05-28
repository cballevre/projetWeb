<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:43
 */
class PagesController extends AppController
{

    public function home() {
        $this->render('home');
    }

    public function error() {
        $this->render('error');
    }

}