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
        $this->setBack('?controller=keychains&action=index');
        $this->set(compact('keychain'));
        $this->render('single');

    }

    public function store() {



        if(!empty($this->request->data)) {



            $keychain = new Keychain();
            $keychain->setCreationDate($this->request->data->creationDate);
            $keychain->setDestructionDate($this->request->data->destructionDate);

//            var_dump($keychain);

            $model = RepositoryFactory::getRepository('keychains');
            $model->create(array($keychain));

//            var_dump($keychain);
//
//            die();
            $this->redirect(WEBROOT."?controller=keychains&action=index");

        } else {
            $this->setHeadline("Ajouter un trousseau");
            $this->setBack('?controller=keychains&action=index');
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

            $this->redirect(WEBROOT. "?controller=keychains&action=index");

        } else {
            $this->setHeadline("Modifier un trousseau");
            $this->setBack('/?controller=keychains&action=index');
            $this->set(compact('keychain'));
            $this->render('update');
        }

    }
    public function destroy($id) {

        $model = RepositoryFactory::getRepository('keychains');
        $model->delete($id);

        $this->redirect(WEBROOT."?controller=keychains&action=index");
    }

    public function import() {

    }

}