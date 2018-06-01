<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:46
 */

namespace App\Controller;

use App\Model\DAO\implementationUserDAO_Dummy;

class UsersController extends AppController
{

    public function index() {

        $userDAO = implementationUserDAO_Dummy::getInstance();
        $users = $userDAO->getUsers();

        $this->setHeadline("Utilisateurs");
        $this->set($users);
        $this->render('index');

    }

    public function single($id) {

    }

    public function add() {

    }

    public function edit($id) {

    }

    public function delete($id) {

    }
}
