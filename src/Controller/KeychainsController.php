<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use App\Model\DAO\implementationKeychainDAO_Dummy;

class KeychainsController extends AppController
{

//    public function home() {
//        $this->render('index');
//    }

    public function index(){
        $keychainDAO = implementationKeychainDAO_Dummy::getInstance();
        $keychains = $keychainDAO->getKeychains();

        $this->setHeadline("Keychains");
        $this->set($keychains);
        $this->render('index');
    }

}