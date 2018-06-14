<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

use Core\Repositories\RepositoryFactory;

class RoomDoor
{
    /** @Id */
    protected $id;
    protected $idDoor;
    protected $idRoom;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setIdDoor(int $idDoor) { $this->idDoor = $idDoor; }
    public function getIdDoor() { return $this->idDoor; }

    public function setIdRoom(int $idRoom) { $this->idRoom = $idRoom; }
    public function getIdRoom() { return $this->idRoom; }

    public function rooms($id){
        $model = RepositoryFactory::getRepository('roomDoors');
        return $model->findBy('idDoor', $id);
    }

    public function doors($id){
        $model = RepositoryFactory::getRepository('roomDoors');
        return $model->findBy('idRoom', $id);
    }

}
