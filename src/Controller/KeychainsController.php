<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use Core\Repositories\RepositoryFactory;

class KeychainsController extends AppController
{

//    public function home() {
//        $this->render('index');
//    }

    public function index(){

        $model = RepositoryFactory::getRepository('keychains');
        $keychains = $model->findAll();

        $this->setHeadline("Tous les trousseaux");
        $this->set(compact('keychains'));
        $this->render('index');
    }

}