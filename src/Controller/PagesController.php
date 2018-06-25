<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:43
 */

namespace App\Controller;

use Core\Repositories\RepositoryFactory;

class PagesController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

    public function dashboard() {

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychains = $model->findAll();

        $now = new \DateTime('now');

        $this->flash->set("L'utilisateur n'est pas connecté", "danger");

        $borrowKeychainDelays = array();

        foreach ($borrowKeychains as $borrowKeychain) {
            if($borrowKeychain->getDateRetour() < $now) {
                array_push($borrowKeychainDelays, $borrowKeychain);
            }
        }

        $this->setHeadline("Tableau de bord");
        $this->set(compact('borrowKeychainDelays'));
        $this->render('dashboard');
    }

    public function error404() {
        $this->setHeadline("Page non trouvée");
        $this->render('../Errors/404');
    }

}