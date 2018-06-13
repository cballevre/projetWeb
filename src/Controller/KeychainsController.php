<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use App\Model\Keychain;
use Core\Repositories\RepositoryFactory;

class KeychainsController extends AppController
{

    public function index(){

        $model = RepositoryFactory::getRepository('keychains');
        $keychains = $model->findAll();

        $this->setHeadline("Tous les trousseaux");
        $this->setButtonAdd('?controller=keychains&action=store');
        $this->setButtonImport('?controller=keychains&action=import');
        $this->set(compact('keychains'));
        $this->render('index');
    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('keychains');
        $keychain = $model->findById($id);

        $this->setHeadline($keychain->getId());
        $this->set(compact('keychains'));
        $this->render('single');

    }

    public function store() {

        if(!empty($this->request->data)) {

            $keychain = new Keychain();
            $keychain->setCreationDate($this->request->data->creationDate);
            $keychain->setDestructionDate($this->request->data->destructionDate);

            $model = RepositoryFactory::getRepository('keychains');
            $model->create(array($keychain));

            $this->redirect("/?controller=keychains&action=index");

        } else {
            $this->setHeadline("Ajouter un trousseau");
            $this->render('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('keychains');
        $keychain = $model->findById($id);

        if(!empty($this->request->data)) {

            $keychain->setCreationDate($this->request->data->creationDate);
            $keychain->setDestructionDate($this->request->data->destructionDate);



            $model = RepositoryFactory::getRepository('keychains');
            $model->update($keychain, $id);

            $this->redirect("/?controller=keychains&action=index");

        } else {
            $this->setHeadline("Modifier un trousseau");
            $this->set(compact('keychains'));
            $this->render('update');
        }

    }

}