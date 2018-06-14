<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:45
 */

namespace App\Controller;

use App\Model\Room;
use App\Model\RoomDoor;
use Core\Repositories\RepositoryFactory;

class RoomsController extends AppController
{


    public function index() {

        $model = RepositoryFactory::getRepository('rooms');
        $rooms = $model->findAll();

        $this->setHeadline("Salles");
        $this->setButtonAdd('?controller=rooms&action=store');
        $this->setButtonImport('?controller=rooms&action=import');
        $this->set(compact('rooms'));
        $this->render('index');

    }

    public function single($id) {

        $model = RepositoryFactory::getRepository('rooms');
        $room = $model->findById($id);

        $roomDoors = new RoomDoor();
        $roomDoorsSelected = $roomDoors->doors($room->getId());

        $doors = array();
        $modelDoors = RepositoryFactory::getRepository('doors');
        foreach($roomDoorsSelected as $roomDoorSelected){
            array_push($doors,$modelDoors->findById($roomDoorSelected->getIdRoom()));
        }
        $array = array(
            'doors' => $doors,
            'room'  => $room
        );

        $this->setHeadline($room->getRoomName());
        $this->setBack('?controller=rooms&action=index');
        $this->set(compact('array'));
        $this->render('single');

    }

    public function store() {

        if(!empty($this->request->data)) {

            $room = new Room();
            $room->setRoomName($this->request->data->roomName);
            $room->setFloor($this->request->data->floor);
            $room->setBuilding($this->request->data->building);

            $model = RepositoryFactory::getRepository('rooms');
            $model->create(array($room));

            $this->redirect("/?controller=rooms&action=index");

        } else {
            $this->setHeadline("Ajouter un utilisateur");
            $this->render('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('rooms');
        $room = $model->findById($id);

        if(!empty($this->request->data)) {

            $room->setRoomName($this->request->data->roomName);
            $room->setFloor($this->request->data->floor);
            $room->setBuilding($this->request->data->building);

            $model = RepositoryFactory::getRepository('rooms');
            $model->update($room, $id);

            $this->redirect("/?controller=rooms&action=index");

        } else {
            $this->setHeadline("Modifier une pièce");
            $this->set(compact('room'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('rooms');
        $model->delete($id);

        $this->redirect("</?controller=rooms&action=index");
    }

    public function import() {

    }

}