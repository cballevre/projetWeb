<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 12/06/2018
 * Time: 17:32
 */

namespace App\Controller;

use App\Model\Lock;
use Core\Repositories\RepositoryFactory;

class LocksController extends AppController {

    public function index() {

        $model = RepositoryFactory::getRepository('locks');
        $locks = $model->findAll();

        var_dump($locks);

        $this->setHeadline("Barillets");
        $this->setButtonAdd('?controller=locks&action=store');
        $this->setButtonImport('?controller=locks&action=import');
        $this->set(compact('locks'));
        $this->render('index');

    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('locks');
        $lock = $model->findById($id);

        $this->setHeadline('Barillet '.$lock->getId());
        $this->set(compact('lock'));
        $this->render('single');

    }

    public function store() {

        if(!empty($this->request->data)) {

            $lock = new Lock();
            $lock->setLength($this->request->data->length);

            $model = RepositoryFactory::getRepository('locks');
            $model->create(array($lock));

            $this->redirect(WEBROOT . "?controller=locks&action=index");

        } else {
            $this->setHeadline("Ajouter un barillet");
            $this->render('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('locks');
        $lock = $model->findById($id);

        if(!empty($this->request->data)) {
            $lock->setLength($this->request->data->length);

            $model = RepositoryFactory::getRepository('locks');
            $model->update($lock, $id);

            $this->redirect(WEBROOT . "?controller=locks&action=index");

        } else {
            $this->setHeadline("Modifier une clé");
            $this->set(compact('lock'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('locks');
        $model->delete($id);

        $this->redirect(WEBROOT . "?controller=locks&action=index");
    }

    public function import() {

    }

}