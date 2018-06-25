<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 11/06/2018
 * Time: 08:58
 */

namespace App\Controller;

use App\Model\BorrowKeychain;
use App\Model\Keychain;
use Core\Repositories\RepositoryFactory;

class BorrowKeychainsController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

    public function index(){

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychains = $model->findAll();

        $this->setHeadline("Tous les emprunts");
        $this->setButtonAdd('?controller=borrowKeychains&action=store');
        $this->set(compact('borrowKeychains'));
        $this->render('index');
    }

    public function singleToJson($id) {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychain = $model->findById($id);

        $this->renderJSON(json_encode($borrowKeychain));

    }

    public function store() {

        if(!empty($this->request->data)) {

            $borrowKeychain = new BorrowKeychain();
            $borrowKeychain->setIdKeychain($this->request->data->idKeychain);
            $borrowKeychain->setIdUser($this->request->data->idUser);
            $borrowKeychain->setDateRetour(\DateTime::createFromFormat("Y-m-d\TH:i", $this->request->data->dateRetour));

            $model = RepositoryFactory::getRepository('borrowKeychains');
            $model->create(array($borrowKeychain));

            $this->redirect(WEBROOT . "?controller=borrowKeychains&action=index");


        } else {
            $this->renderWithoutLayout('store');
        }

    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychain = $model->findById($id);

        if(!empty($this->request->data)) {

            $borrowKeychain->setIdKeychain($this->request->data->idKeychain);
            $borrowKeychain->setIdUser($this->request->data->idUser);
            $borrowKeychain->setDateRetour(\DateTime::createFromFormat("Y-m-d\TH:i", $this->request->data->dateRetour));

            $model->update($borrowKeychain, $id);

        }

        $this->redirect(WEBROOT . "?controller=borrowKeychains&action=index");


    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $model->delete($id);

        $this->redirect(WEBROOT . "?controller=borrowKeychains&action=index");

    }

    public function reminder($id) {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychain = $model->findById($id);

        // mail($borrowKeychain->user()->getEmail(), "Relance de l'emprunt du trousseau n°" . $borrowKeychain->getIdKeychain(), "Votre messsage");

        $this->redirect(WEBROOT . "?controller=pages&action=dashboard");

    }
}