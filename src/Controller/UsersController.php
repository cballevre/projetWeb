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
use Core\Utils\Serializer;

class UsersController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $model = RepositoryFactory::getRepository('users');
        $users = $model->findAll();

        $this->setHeadline("Utilisateurs");
        $this->setButtonAdd('?controller=users&action=store');
        $this->setButtonImport('?controller=users&action=import');
        $this->set(compact('users'));
        $this->render('index');

    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('users');
        $user = $model->findById($id);


        $this->setHeadline($user->getSurname() . ' ' . $user->getName());
        $this->setBack('?controller=users&action=index');
        $this->set(compact('user'));
        $this->render('single');

    }

    public function singleToJson($id) {

        $model = RepositoryFactory::getRepository('users');
        $user = $model->findById($id);

        $this->renderJSON(json_encode($user));

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

        }
        $this->redirect(WEBROOT . "?controller=users&action=index");
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

            $model->update($user, $id);

        }

        $this->redirect(WEBROOT . "?controller=users&action=index");


    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('users');
        $model->delete($id);

        $this->redirect(WEBROOT . "?controller=users&action=index");
    }

    public function import() {

        if($_FILES['import']['type'] == "text/csv") {

            $filename = $_FILES['import']['tmp_name'];

            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;

            $str_csv = file_get_contents($filename);

            $serializer = new Serializer();
            $entities = $serializer->fromCSV($str_csv, User::class);

            $model = RepositoryFactory::getRepository('users');
            $model->create($entities);

        }

        $this->redirect(WEBROOT . "?controller=users&action=index");

    }


}
