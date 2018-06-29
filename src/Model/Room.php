<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class Room
{
    /** @Id */
    protected $id;
    protected $roomName;
    protected $floor;
    protected $building;

    public function getId() { return $this->id; }

    public function setId(int $id) { $this->id = $id; }

    public function getRoomName() { return $this->roomName; }

    public function setRoomName(String $roomName)
    {
        $this->roomName
            = $roomName;
    }

    public function getFloor() { return $this->floor; }

    public function setFloor(String $floor) { $this->floor = $floor; }

    public function getBuilding() { return $this->building; }

    public function setBuilding(int $building) { $this->building = $building; }


}
