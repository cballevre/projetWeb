<?php

namespace App\Model;

class Door
{
    /**
     * @Id
     */
    protected $id;
    protected $idLock;

    public function getId() { return $this->id; }

    public function setId(int $id) { $this->id = $id; }

    public function getIdLock() { return $this->idLock; }

    public function setIdLock(int $idLock) { $this->idLock = $idLock; }

}
