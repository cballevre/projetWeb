<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:43
 */

namespace App\Controller;

class PagesController extends AppController
{

    public function dashboard() {

        $this->setHeadline("Tableau de bord");
        $this->render('dashboard');
    }

    public function error404() {
        $this->setHeadline("Page non trouvée");
        $this->render('../Errors/404');
    }

}