<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 27/05/2018
 * Time: 22:45
 */

namespace App\Controller;

use App\Model\Door;
use App\Model\RoomDoor;
use Core\Repositories\RepositoryFactory;

class DoorsController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $model = RepositoryFactory::getRepository('doors');
        $doors = $model->findAll();

        $this->setHeadline("Portes");
        $this->setButtonAdd('?controller=doors&action=store');
        $this->set(compact('doors'));
        $this->render('index');

    }

    public function single($id) {
        $model = RepositoryFactory::getRepository('doors');
        $door = $model->findById($id);

        $roomDoors = new RoomDoor();
        $roomDoorsSelected = $roomDoors->rooms($door->getId());

        $rooms = array();
        $modelRooms = RepositoryFactory::getRepository('rooms');
        foreach($roomDoorsSelected as $roomDoorSelected){
            array_push($rooms,$modelRooms->findById($roomDoorSelected->getIdRoom()));
        }
        $array = array(
            'rooms' => $rooms,
            'door'  => $door
        );

        $this->setHeadline("Porte " . $door->getId());
        $this->setBack('?controller=doors&action=index');
        $this->set(compact('array'));
        $this->render('single');
    }

    public function store() {

        if(!empty($this->request->data)) {

            $door = new Door();
            $door->setIdLock($this->request->data->idLock);

            $model = RepositoryFactory::getRepository('doors');
            $model->create(array($door));

            $this->flash->set("La porte est bien ajoutée.", "success");
            $this->redirect(WEBROOT . "?controller=doors&action=index");
        } else {
            $model = RepositoryFactory::getRepository('locks');
            $locks = $model->findAll();

            $this->set(compact('locks'));
            $this->renderWithoutLayout('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('doors');
        $door = $model->findById($id);

        if(!empty($this->request->data)) {

            $door->setIdLock($this->request->data->idLock);

            $model = RepositoryFactory::getRepository('doors');
            $model->update($door, $id);

            $this->flash->set("La porte est bien modifiée.", "success");
            $this->redirect(WEBROOT . "?controller=doors&action=index");

        } else {
            $model = RepositoryFactory::getRepository('locks');
            $locks = $model->findAll();

            $array = array(
                'door'  => $door,
                'locks' => $locks
            );

            $this->setHeadline("Modifier une porte");
            $this->set(compact('array'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('doors');
        $model->delete($id);

        $this->flash->set("Une porte a été supprimée.", "info");
        $this->redirect(WEBROOT . "?controller=doors&action=index");
    }

}