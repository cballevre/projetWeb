<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:46
 */

namespace App\Controller;

use App\Model\User;
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

    public function single($id) {

        $model = RepositoryFactory::getRepository('users');
        $user = $model->findById($id);

        $this->setHeadline($user->getSurname() . ' ' . $user->getName());
        $this->set(compact('user'));
        $this->render('single');

    }

    public function store() {

        if(!empty($this->request->data)) {

            $user = new User();
            $user->setUsername($this->request->data->username);
            $user->setName($this->request->data->name);
            $user->setSurname($this->request->data->surname);
            $user->setPhone($this->request->data->phone);
            $user->setStatus($this->request->data->status);
            $user->setEmail($this->request->data->email);

            $model = RepositoryFactory::getRepository('users');
            $model->create(array($user));

            $this->redirect("/?controller=users&action=index");

        } else {
            $this->setHeadline("Ajouter un utilisateur");
            $this->render('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('users');
        $user = $model->findById($id);

        if(!empty($this->request->data)) {

            $user->setUsername($this->request->data->username);
            $user->setName($this->request->data->name);
            $user->setSurname($this->request->data->surname);
            $user->setPhone($this->request->data->phone);
            $user->setStatus($this->request->data->status);
            $user->setEmail($this->request->data->email);

            $model = RepositoryFactory::getRepository('users');
            $model->update($user, $id);

            $this->redirect("/?controller=users&action=index");

        } else {
            $this->setHeadline("Modifier un utilisateur");
            $this->set(compact('user'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('users');
        $model->delete($id);

        $this->redirect("/?controller=users&action=index");
    }

    public function import() {

    }
}
