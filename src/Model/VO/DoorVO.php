<?php

namespace App\Model\VO;

class DoorVO
{
    protected $id;
    protected $idLock;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setIdLock(int $idLock) { $this->idLock = $idLock; }
    public function getIdLock() { return $this->idLock; }

}
