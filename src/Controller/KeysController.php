<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use App\Model\DAO\implementationKeyDAO_Dummy;

class KeysController extends AppController
{
    public function index() {

        $keyDAO = implementationKeyDAO_Dummy::getInstance();
        $keys = $keyDAO->getkeys();

        $this->setHeadline("Clés");
        $this->set($keys);
        $this->render('index');

    }
}