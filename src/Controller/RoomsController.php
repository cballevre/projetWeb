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
use App\Model\OpenLock;
use Core\Repositories\RepositoryFactory;

class RoomsController extends AppController
{

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $model = RepositoryFactory::getRepository('rooms');
        $rooms = $model->findAll();

        $this->setHeadline("Salles");
        $this->setButtonAdd('?controller=rooms&action=store');
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
            array_push($doors,$modelDoors->findById($roomDoorSelected->getIdDoor()));
        }

        $keys = array();
        $openLock = new OpenLock();
        $modelKey = RepositoryFactory::getRepository('keys');
        foreach($doors as $door){
            $keysId = $openLock->keys($door->getId());
            foreach($keysId as $keyId){
                array_push($keys,$modelKey->findById($keyId->getIdKey()));
            }
        }

        $doorAccesModel = RepositoryFactory::getRepository('doorAccesss');
        $userModel = RepositoryFactory::getRepository('users');
        $roomAccesss = $doorAccesModel->findBy('idRoom',$room->getId());

        $users= array();

        foreach($roomAccesss as $roomAccess){
            array_push($users,  $userModel->findById($roomAccess->getIdUser()));
        }

        $array = array(
            'doors' => $doors,
            'room'  => $room,
            'keys'  => $keys,
            'users' => $users
        );

        $this->setHeadline("Salle " . $room->getRoomName());
        $this->setBack('?controller=rooms&action=index');
        $this->set(compact('array'));
        $this->render('single');

    }

    public function store() {

        if(!empty($this->request->data)) {

            $room = new Room();
            if($this->request->data->roomName==null){
                $this->flash->set("Le champ nom de la salle est vide", "warning");
                $this->render('index');
            }else if($this->request->data->building==null){
                $this->flash->set("Renseignez le champ Bâtiment", "warning");
                $this->render('index');
            }else if($this->request->data->floor==null){
                $this->flash->set("Renseignez le champ Étage", "warning");
                $this->render('index');
            }else {
                $room->setRoomName($this->request->data->roomName);
                $room->setFloor($this->request->data->floor);
                $room->setBuilding($this->request->data->building);

                $model = RepositoryFactory::getRepository('rooms');
                $model->create(array($room));

                $this->flash->set("La salle est bien ajoutée.", "success");
                $this->redirect(WEBROOT . "?controller=rooms&action=index");
            }

        } else {
            $model = RepositoryFactory::getRepository('rooms');
            $rooms = $model->findAll();
            $this->set(compact('rooms'));
            $this->renderWithoutLayout('store');
        }
    }

    public function update($id) {

        $model = RepositoryFactory::getRepository('rooms');
        $room = $model->findById($id);

        if(!empty($this->request->data)) {

            if($this->request->data->roomName==null){
                $this->flash->set("Le champ nom de la salle est vide", "warning");
                $this->render('index');
            }else if($this->request->data->building==null){
                $this->flash->set("Renseignez le champ Bâtiment", "warning");
                $this->render('index');
            }else if($this->request->data->floor==null){
                $this->flash->set("Renseignez le champ Étage", "warning");
                $this->render('index');
            }else {
                $room->setRoomName($this->request->data->roomName);
                $room->setFloor($this->request->data->floor);
                $room->setBuilding($this->request->data->building);

                $model = RepositoryFactory::getRepository('rooms');
                $model->update($room, $id);

                $this->flash->set("La salle est bien modifiée.", "success");
                $this->redirect(WEBROOT . "?controller=rooms&action=index");
            }

        } else {
            $this->setHeadline("Modifier une pièce");
            $this->set(compact('room'));
            $this->render('update');
        }

    }

    public function destroy($id) {

        $model = RepositoryFactory::getRepository('rooms');
        $model->delete($id);

        $this->flash->set("Une salle a été supprimée.", "info");
        $this->redirect(WEBROOT . "?controller=rooms&action=index");
    }

    public function destroyLink($id) {

        //TODO

        $model = RepositoryFactory::getRepository('roomDoors');
        $model->delete($id);

        $this->redirect(WEBROOT . "?controller=rooms&action=index");
    }

    public function import() {

    }

    public function linkDoor($id) {
        $model = RepositoryFactory::getRepository('rooms');
        $room = $model->findById($id);

        if(!empty($this->request->data)) {
            
            $roomDoors = new RoomDoor();

            $roomDoors->setIdDoor($this->request->data->idDoor);
            $roomDoors->setIdRoom($this->request->data->idRoom);

            $model = RepositoryFactory::getRepository('roomDoors');
            $model->create(array($roomDoors));

            $this->redirect(WEBROOT . "?controller=rooms&action=single&id=" . $room->getId());

        } else {
            $model = RepositoryFactory::getRepository('doors');
            $doors = $model->findAll();

            $array = array(
                'room'  => $room,
                'doors' => $doors
            );

            $this->setHeadline("Associer une porte à la salle : " . $room->getRoomName());
            $this->set(compact('array'));
            $this->render('linkDoor');
        }
    }

}