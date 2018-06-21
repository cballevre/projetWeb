<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 11/06/2018
 * Time: 08:58
 */

namespace App\Controller;

use App\Model\Keychain;
use Core\Repositories\RepositoryFactory;

class BorrowKeychainsController extends AppController
{
    public function index(){

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychains = $model->findAll();

        $this->setHeadline("Tous les emprunts");
        $this->setButtonAdd('?controller=borrowKeychains&action=store');
        $this->set(compact('borrowKeychains'));
        $this->render('index');
    }

    public function single() {

        if(!empty($this->request->data)) {

            $keychain = new Keychain();
            $keychain->setIdKeychchain($this->request->data->idKeychain);
            $keychain->setIdUser($this->request->data->idUser);
            $keychain->setDateRetour($this->request->data->dateRetour);

            $model = RepositoryFactory::getRepository('keychains');
            $model->create(array($keychain));

            $this->redirect(WEBROOT . "?controller=keychains&action=index");

        } else {
            $this->setHeadline("Ajouter un utilisateur");
            $this->render('store');
        }
    }

    public function store() {

        // TODO
    }

    public function update() {

        // TODO

    }

    public function destroy() {

        // TODO

    }
}