<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 27/05/2018
 * Time: 22:45
 */

namespace App\Controller;

use App\Model\Door;
use Core\Repositories\RepositoryFactory;

class DoorsController extends AppController
{
    public function index() {

        $model = RepositoryFactory::getRepository('doors');
        $doors = $model->findAll();
        
        $this->setHeadline("Portes");
        $this->set(compact('doors'));
        $this->render('index');
        
    }

    public function store() {

        if(!empty($this->request->data)) {

            $door = new Door();
            $door->setIdLock($this->request->data->idLock);

            $model = RepositoryFactory::getRepository('doors');
            $model->create(array($door));

            $this->redirect(WEBROOT . "?controller=doors&action=index");

        } else {
            $this->setHeadline("Ajouter une porte");
            $this->render('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('doors');
        $door = $model->findById($id);

        if(!empty($this->request->data)) {

            $door->setIdLock($this->request->data->idLock);

            $model = RepositoryFactory::getRepository('doors');
            $model->update($door, $id);

            $this->redirect(WEBROOT . "?controller=doors&action=index");

        } else {
            $this->setHeadline("Modifier une porte");
            $this->set(compact('door'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('doors');
        $model->delete($id);

        $this->redirect(WEBROOT . "?controller=doors&action=index");
    }
}