<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use App\Model\Key;
use App\Model\KeyAssociation;
use App\Model\OpenLock;
use Core\Repositories\RepositoryFactory;
use Core\Utils\Serializer;

class KeysController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $model = RepositoryFactory::getRepository('keys');
        $keys = $model->findAll();

        $this->setHeadline("Clés");
        $this->setButtonAdd('?controller=keys&action=store');
        $this->setButtonImport(WEBROOT .'?controller=keys&action=import');
        $this->set(compact('keys'));
        $this->render('index');

    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('keys');
        $key = $model->findById($id);

        $keyAssociations = new KeyAssociation();
        $keyAssociationsSelected = $keyAssociations->keychains($key->getId());

        $keychains = array();
        $modelKeychains = RepositoryFactory::getRepository('keychains');
        foreach($keyAssociationsSelected as $keyAssociationSelected){
            array_push($keychains,$modelKeychains->findById($keyAssociationSelected->getIdKeychain()));
        }
        $array = array(
            'key' => $key,
            'keychains'  => $keychains
        );

        $this->setHeadline("Clé " . $key->getId());
        $this->setBack('?controller=keys&action=index');
        $this->set(compact('array'));
        $this->render('single');
    }

    public function linkLock($id){

        $model = RepositoryFactory::getRepository('keys');
        $key = $model->findById($id);

        if(!empty($this->request->data)) {

            $openLocks = new OpenLock();

            $openLocks->setIdKey($this->request->data->idKey);
            $openLocks->setIdLock($this->request->data->idLock);

            $model = RepositoryFactory::getRepository('openLocks');
            $model->create(array($openLocks));

            $this->redirect(WEBROOT . "?controller=keys&action=single&id=" . $key->getId());

        } else {
            $model = RepositoryFactory::getRepository('locks');
            $locks = $model->findAll();

            $array = array(
                'key'  => $key,
                'locks' => $locks
            );

            $this->setHeadline("Associer un barillet à la clé n°" . $key->getId() . " : ");
            $this->set(compact('array'));
            $this->render('linkLock');
        }

    }

    public function store() {

        if(!empty($this->request->data)) {

            $key = new Key();

            if($this->request->data->type==null){
                $this->flash->set("Le type n'est pas valide", "warning");
                $this->render('index');
            }else if($this->request->data->etat==null){
                $this->render('index');
                $this->flash->set("L'état n'est pas valide", "warning");
            }else {
                $key->setType($this->request->data->type);
                $key->setEtat($this->request->data->etat);

                $model = RepositoryFactory::getRepository('keys');
                $model->create(array($key));

                $this->flash->set("La clé est bien ajoutée", "success");

                $this->redirect(WEBROOT . "?controller=keys&action=index");
            }

        } else {
            $this->renderWithoutLayout('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('keys');
        $key = $model->findById($id);

        if(!empty($this->request->data)) {
            if($this->request->data->type==null){
                $this->flash->set("Le type n'est pas valide", "warning");
                $this->render('index');
            }else if($this->request->data->etat==null){
                $this->flash->set("L'état n'est pas valide", "warning");
                $this->render('index');
            }else {
                $key->setType($this->request->data->type);
                $key->setEtat($this->request->data->etat);

                $model = RepositoryFactory::getRepository('keys');
                $model->update($key, $id);

                $this->flash->set("La clé est bien modifiée", "success");
                $this->redirect(WEBROOT . "?controller=keys&action=index");
            }

        } else {
            $this->setHeadline("Modifier une clé");
            $this->setBack('?controller=keys&action=index');
            $this->set(compact('key'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('keys');
        $model->delete($id);

        $this->flash->set("Une clé a été supprimée", "info");
        $this->redirect(WEBROOT . "?controller=keys&action=index");
    }

    public function import() {

        if($_FILES['import']['type'] == "text/csv") {

            $filename = $_FILES['import']['tmp_name'];

            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;

            $str_csv = file_get_contents($filename);

            $serializer = new Serializer();
            $entities = $serializer->fromCSV($str_csv, Key::class);

            $model = RepositoryFactory::getRepository('keys');
            $model->create($entities);

        }

        $this->redirect(WEBROOT . "?controller=keys&action=index");

    }
}