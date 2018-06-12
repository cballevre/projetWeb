<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 27/05/2018
 * Time: 22:45
 */

namespace App\Controller;

class DoorsController extends AppController
{
    public function index() {

        $model = RepositoryFactory::getRepository('doors');
        $doors = $model->findAll();
        
        var_dump($doors);
        
        $this->setHeadline("Portes");
        $this->set(compact('doors'));
        $this->render('index');
        
        }
}