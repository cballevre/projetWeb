<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 11/06/2018
 * Time: 08:58
 */

namespace App\Controller;

use App\Model\BorrowKeychain;
use App\Model\KeyAssociation;
use App\Model\Keychain;
use Core\Repositories\RepositoryFactory;

class BorrowKeychainsController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychains = $model->findAll();

        $this->setHeadline("Tous les emprunts");
        $this->setButtonAdd('?controller=borrowKeychains&action=store');
        $this->set(compact('borrowKeychains'));
        $this->render('index');
    }

    public function singleToJson($id)
    {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychain = $model->findById($id);

        $this->renderJSON(json_encode($borrowKeychain->jsonSerialize()));

    }

    public function store()
    {

        if(!empty($this->request->data)) {

            $borrowKeychain = new BorrowKeychain();
            $borrowKeychain->setIdUser($this->request->data->idUser);

            $date_retour = \DateTime::createFromFormat(
                "Y-m-d\TH:i", $this->request->data->dateRetour
            );
            $date_now = new \DateTime();
            $keychainsModel = RepositoryFactory::getRepository('keychains');
            $keychain = new Keychain();

            $keychain->setCreationDate($date_now);
            $keychain->setDestructionDate($date_retour);

            $keychain = $keychainsModel->create(array($keychain))[0];
            $keys = array();
            $keyAssociations = array();

            $keyAssociationModel = RepositoryFactory::getRepository(
                'keyAssociations'
            );
            $keyModel = RepositoryFactory::getRepository('keys');

            foreach($this->request->data->keys as $key_id) {

                var_dump($key_id);

                $key = $keyModel->findById($key_id);
                $key->setEtat("Empruntée");
                $keyModel->update($key, $key->getId());

                $keyAssociation = new KeyAssociation();
                $keyAssociation->setIdKey(intval($key_id));
                $keyAssociation->setIdKeychain($keychain->getId());
                array_push($keyAssociations, $keyAssociation);

            }

            $keyAssociationModel->create($keyAssociations);

            $borrowKeychain->setIdKeychain($keychain->getId());
            $borrowKeychain->setDateRetour($date_retour);

            $model = RepositoryFactory::getRepository('borrowKeychains');
            $model->create(array($borrowKeychain));

            $this->flash->set("L'emprunt est bien ajouté.", "success");
            $this->redirect(
                WEBROOT . "?controller=borrowKeychains&action=index"
            );


        } else {

            $usersModel = RepositoryFactory::getRepository('users');
            $users = $usersModel->findAll();

            $keysModel = RepositoryFactory::getRepository('keys');
            $keys_preresult = $keysModel->findAll();

            $keys = array();

            foreach($keys_preresult as $key) {
                if($key->getEtat() == "Disponible") {
                    array_push($keys, $key);
                }
            }

            $this->set(compact('users', 'keys'));
            $this->renderWithoutLayout('store');
        }

    }

    public function update($id)
    {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychain = $model->findById($id);

        if(!empty($this->request->data)) {

            $borrowKeychain->setDateRetour(
                \DateTime::createFromFormat(
                    "Y-m-d\TH:i", $this->request->data->dateRetour
                )
            );

            $model->update($borrowKeychain, $id);

            $this->redirect(
                WEBROOT . "?controller=borrowKeychains&action=index"
            );

        }
        $this->flash->set("L'emprunt a bien été modifié.", "success");

    }

    public function return_keychain($id)
    {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $keychainsModel = RepositoryFactory::getRepository('keychains');
        $keyAssociationModel = RepositoryFactory::getRepository(
            'keyAssociations'
        );
        $keyModel = RepositoryFactory::getRepository('keys');

        $borrowKeychain = $model->findById($id);
        $keychain = $keychainsModel->findById($borrowKeychain->getIdKeychain());
        $keyAssociations = $keyAssociationModel->findBy(
            "idKeychain", $keychain->getId()
        );

        foreach($keyAssociations as $keyAssociation) {
            $key = $keyModel->findById($keyAssociation->getIdKey());
            $key->setEtat("Disponible");
            $keyModel->update($key, $keyAssociation->getIdKey());
            $keyAssociationModel->delete($keyAssociation->getId());
        }

        $keychainsModel->delete($keychain->getId());
        $model->delete($id);

        $this->flash->set("Le trousseau a bien été rendu", "success");
        $this->redirect(WEBROOT . "?controller=borrowKeychains&action=index");

    }

    public function lost($id)
    {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $keychainsModel = RepositoryFactory::getRepository('keychains');
        $keyAssociationModel = RepositoryFactory::getRepository(
            'keyAssociations'
        );
        $keyModel = RepositoryFactory::getRepository('keys');

        $borrowKeychain = $model->findById($id);
        $keychain = $keychainsModel->findById($borrowKeychain->getIdKeychain());
        $keyAssociations = $keyAssociationModel->findBy(
            "idKeychain", $keychain->getId()
        );

        foreach($keyAssociations as $keyAssociation) {
            $key = $keyModel->findById($keyAssociation->getIdKey());
            $key->setEtat("Perdue");
            $keyModel->update($key, $keyAssociation->getIdKey());
            $keyAssociationModel->delete($keyAssociation->getId());
        }

        $model->delete($id);

        $this->flash->set("Modification effectuée", "success");
        $this->redirect(WEBROOT . "?controller=borrowKeychains&action=index");

    }

    public function reminder($id)
    {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychain = $model->findById($id);

        // mail($borrowKeychain->user()->getEmail(), "Relance de l'emprunt du trousseau n°" . $borrowKeychain->getIdKeychain(), "Votre messsage");

        $this->redirect(WEBROOT . "?controller=pages&action=dashboard");

    }
}