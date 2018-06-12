<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 11/06/2018
 * Time: 08:58
 */

namespace App\Controller;

use Core\Repositories\RepositoryFactory;

class BorrowKeychainsController extends AppController
{
    public function index(){

        $model = RepositoryFactory::getRepository('borrowKeychains');
        $borrowKeychains = $model->findAll();

        var_dump($borrowKeychains);

        $this->setHeadline("Tous les emprunts");
        $this->set(compact('borrowKeychains'));
        $this->render('index');
    }
}