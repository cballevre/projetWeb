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
use App\Model\Door;

class LocksController extends AppController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $model = RepositoryFactory::getRepository('locks');
        $locks = $model->findAll();

        $this->setHeadline("Barillets");
        $this->setButtonAdd('?controller=locks&action=store');
        $this->set(compact('locks'));
        $this->render('index');

    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('locks');
        $lock = $model->findById($id);

        $modelDoors = RepositoryFactory::getRepository('doors');
        $doors = $modelDoors->findBy('idLock',$id);

        $array = array(
            'lock' => $lock,
            'doors'  => $doors
        );

        $this->setHeadline("Barillet " . $id);
        $this->setBack('?controller=locks&action=index');
        $this->set(compact('array'));
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
            $model->update($lock, $id);

            $this->redirect(WEBROOT . "?controller=locks&action=index");

        } else {
            $this->setHeadline("Modifier un barillet");
            $this->set(compact('lock'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('locks');
        $model->delete($id);

        $this->redirect(WEBROOT . "?controller=locks&action=index");

    }

}