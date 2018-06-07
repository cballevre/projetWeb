<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:46
 */

namespace App\Controller;

use Core\DAO\ImplementationDAOFactory;

class UsersController extends AppController
{

    public function index() {

        $userDAO = ImplementationDAOFactory::getInstance('users');
        $users = $userDAO->findAll();

        $this->setHeadline("Utilisateurs");
        $this->set($users);
        $this->render('index');

    }

    public function single() {

        $userDAO = ImplementationDAOFactory::getInstance('users');
        $users = $userDAO->findAll();

        $this->setHeadline("Utilisateurs");
        $this->set($users);
        $this->render('index');

    }

    public function add() {

    }

    public function edit($id) {

    }

    public function delete($id) {

    }
}
