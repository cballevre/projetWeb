<?php

namespace App\Model\VO;

class DoorVO
{
    protected $id;
    protected $idLock;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setIdLock($idLock) {
        $this->idLock = $idLock;
    }

    public function getIdLock() {
        return $this->idLock;
    }

}
