<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:43
 */

namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller
{

    public function __construct() {

        parent::__construct();

       $this->loadComponent('flash');
    }

}