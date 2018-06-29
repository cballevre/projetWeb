<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class DoorAccess
{
    /** @Id */
    protected $id;
    protected $idUser;
    protected $idRoom;

    public function getId() { return $this->id; }

    public function setId(int $id) { $this->id = $id; }

    public function getIdUser() { return $this->idUser; }

    public function setIdUser(int $idUser) { $this->idUser = $idUser; }

    public function getIdRoom() { return $this->idRoom; }

    public function setIdRoom(int $idRoom) { $this->idRoom = $idRoom; }


}
