<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model\VO;

class RoomDoorVO
{
    protected $idDoor;
    protected $idRoom;

    public function setIdDoor(int $idDoor) { $this->idDoor = $idDoor; }
    public function getIdDoor() { return $this->idDoor; }

    public function setIdRoom(int $idRoom) { $this->idRoom = $idRoom; }
    public function getIdRoom() { return $this->idRoom; }

}
