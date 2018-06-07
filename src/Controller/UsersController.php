<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:46
 */

namespace App\Controller;

use Core\Repositories\RepositoryFactory;

class UsersController extends AppController
{

    public function index() {

        $model = RepositoryFactory::getRepository('users');
        $users = $model->findAll();

        $this->setHeadline("Utilisateurs");
        $this->set(compact('users'));
        $this->render('index');

    }

    public function single() {

        $id = 3;

        $model = RepositoryFactory::getRepository('users');
        $user = $model->findById($id);

        $this->setHeadline("Utilisateurs");
        $this->set(compact('user'));
        $this->render('single');

    }

    public function store() {

    }



    public function update($id) {

    }

    public function destroy($id) {

    }
}
