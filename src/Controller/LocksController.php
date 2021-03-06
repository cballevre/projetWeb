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

class LocksController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $model = RepositoryFactory::getRepository('locks');
        $locks = $model->findAll();

        $this->setHeadline("Barillets");
        $this->setButtonAdd('?controller=locks&action=store');
        $this->set(compact('locks'));
        $this->render('index');

    }

    public function single($id)
    {

        $model = RepositoryFactory::getRepository('locks');
        $lock = $model->findById($id);

        $modelDoors = RepositoryFactory::getRepository('doors');
        $doors = $modelDoors->findBy('idLock', $id);

        $array = array(
            'lock'  => $lock,
            'doors' => $doors
        );

        $this->setHeadline("Barillet " . $id);
        $this->setBack('?controller=locks&action=index');
        $this->set(compact('array'));
        $this->render('single');

    }

    public function store()
    {

        if(!empty($this->request->data)) {

            $lock = new Lock();
            if($this->request->data->length == null) {
                $this->flash->set("Le type n'est pas valide.", "warning");
                $this->render('index');
            } else {
                $lock->setLength($this->request->data->length);
                $model = RepositoryFactory::getRepository('locks');
                $model->create(array($lock));

                $this->flash->set("Le barillet est bien ajouté.", "success");
                $this->redirect(WEBROOT . "?controller=locks&action=index");
            }

        } else {
            $model = RepositoryFactory::getRepository('locks');
            $locks = $model->findAll();
            $this->set(compact('locks'));
            $this->renderWithoutLayout('store');
        }

    }

    public function update($id)
    {

        $model = RepositoryFactory::getRepository('locks');
        $lock = $model->findById($id);

        if(!empty($this->request->data)) {
            if($this->request->data->length == null) {
                $this->flash->set("Le type n'est pas valide.", "warning");
                $this->render('index');
            } else {
                $lock->setLength($this->request->data->length);
                $model->update($lock, $id);

                $this->flash->set("Le barillet est bien modifié.", "success");
                $this->redirect(WEBROOT . "?controller=locks&action=index");
            }

        } else {
            $this->setHeadline("Modifier un barillet");
            $this->set(compact('lock'));
            $this->render('update');
        }

    }

    public function destroy($id)
    {

        $model = RepositoryFactory::getRepository('locks');
        $model->delete($id);

        $this->flash->set("Un barillet a été supprimé.", "info");
        $this->redirect(WEBROOT . "?controller=locks&action=index");

    }

}