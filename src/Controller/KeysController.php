<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use App\Model\Key;
use Core\Repositories\RepositoryFactory;

class KeysController extends AppController
{
    public function index() {

        $model = RepositoryFactory::getRepository('keys');
        $keys = $model->findAll();

        $this->setHeadline("Clés");
        $this->setButtonAdd('?controller=keys&action=store');
        $this->setButtonImport('?controller=keys&action=import');
        $this->set(compact('keys'));
        $this->render('index');

    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('keys');
        $key = $model->findById($id);

        $this->setHeadline('Clé '.$key->getId());
        $this->set(compact('key'));
        $this->render('single');

    }

    public function store() {

        if(!empty($this->request->data)) {

            $key = new Key();
            $key->setType($this->request->data->type);
            $key->setEtat($this->request->data->etat);
            $key->setKeyParent($this->request->data->keyParent);
            $key->setNbCommande($this->request->data->nbCommande);

            $model = RepositoryFactory::getRepository('keys');
            $model->create(array($key));

            $this->redirect("/?controller=keys&action=index");

        } else {
            $this->setHeadline("Ajouter une clé");
            $this->render('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('keys');
        $key = $model->findById($id);

        if(!empty($this->request->data)) {
            $key->setType($this->request->data->type);
            $key->setEtat($this->request->data->etat);
            $key->setKeyParent($this->request->data->keyParent);
            $key->setNbCommande($this->request->data->nbCommande);

            $model = RepositoryFactory::getRepository('keys');
            $model->update($key, $id);

            $this->redirect("/?controller=keys&action=index");

        } else {
            $this->setHeadline("Modifier une clé");
            $this->set(compact('key'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('keys');
        $model->delete($id);

        $this->redirect("/?controller=keys&action=index");
    }

    public function import() {

    }
}