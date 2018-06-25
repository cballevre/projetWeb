<?php

/**
 * Created by PhpStorm.
 * User: ba
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use App\Model\Keychain;
use Core\Repositories\RepositoryFactory;
use Core\Utils\Serializer;

class KeychainsController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

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

        $keyAssociations = new KeyAssociation();
        $keyAssociationsSelected = $keyAssociations->keys($keychain->getId());

        $keys = array();
        $modelKeys = RepositoryFactory::getRepository('keys');
        foreach($keyAssociationsSelected as $keyAssociationSelected){
            array_push($keys,$modelKeys->findById($keyAssociationSelected->getIdKey()));
        }
        $array = array(
            'keys' => $keys,
            'keychain'  => $keychain
        );

        $this->setHeadline("Trousseaux " . $keychain->getId());
        $this->setBack('?controller=keychains&action=index');
        $this->set(compact('array'));
        $this->render('single');
    }

    public function store() {

        if(!empty($this->request->data)) {

            $keychain = new Keychain();

            if($this->request->data->destructionDate==null){
                $this->flash->set("La date de destruction n'est pas valide.", "warning");
                $this->render('index');
            }else if($this->request->data->creationDate==null){
                $this->flash->set("La date de création n'est pas valide.", "warning");
                $this->render('index');
            }else {

                $keychain->setCreationDate(\DateTime::createFromFormat("Y-m-d H:i:s", $this->request->data->creationDate));
                $keychain->setDestructionDate(\DateTime::createFromFormat("Y-m-d H:i:s", $this->request->data->destructionDate));

                $model = RepositoryFactory::getRepository('keychains');
                $model->create(array($keychain));

                $this->flash->set("Le trousseau est bien ajouté.", "success");
                $this->redirect(WEBROOT . "?controller=keychains&action=index");
            }

        } else {
            $model = RepositoryFactory::getRepository('keychains');
            $keychain = $model->findAll();
            $this->set(compact('keychain'));
            $this->renderWithoutLayout('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('keychains');
        $keychain = $model->findById($id);

        if(!empty($this->request->data)) {

            if($this->request->data->destructionDate==null){
                $this->flash->set("La date de destruction n'est pas valide.", "warning");
                $this->render('index');
            } else if($this->request->data->creationDate==null){
                $this->flash->set("La date de création n'est pas valide.", "warning");
                $this->render('index');
            }else {

                $keychain->setCreationDate(\DateTime::createFromFormat("Y-m-d H:i:s", $this->request->data->creationDate));
                $keychain->setDestructionDate(\DateTime::createFromFormat("Y-m-d H:i:s", $this->request->data->destructionDate));

                $model = RepositoryFactory::getRepository('keychains');
                $model->update($keychain, $id);

                $this->flash->set("Le trousseau est bien modifié.", "success");
                $this->redirect(WEBROOT . "?controller=keychains&action=index");
            }

        } else {
            $this->setHeadline("Modifier un trousseau");
            $this->setBack(WEBROOT.'?controller=keychains&action=index');
            $this->set(compact('keychain'));
            $this->render('update');
        }

    }
    public function destroy($id) {

        $model = RepositoryFactory::getRepository('keychains');
        $model->delete($id);

        $this->flash->set("Un trousseau a été supprimé.", "info");
        $this->redirect(WEBROOT."?controller=keychains&action=index");
    }

    public function import() {

        if($_FILES['import']['type'] == "text/csv") {

            $filename = $_FILES['import']['tmp_name'];

            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;

            $str_csv = file_get_contents($filename);

            $serializer = new Serializer();
            $entities = $serializer->fromCSV($str_csv, Keychain::class);

            $model = RepositoryFactory::getRepository('keychains');
            $model->create($entities);

        }

        $this->redirect(WEBROOT . "?controller=keychains&action=index");

    }

}