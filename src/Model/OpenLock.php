<?php

namespace App\Model;

class OpenLock
{
    protected $idKey;
    protected $idLock;

    public function setIdKey(int $idKey){ $this->idKey = $idKey; }
    public function getIdKey(){ return $this->idKey; }

    public function setIdLock(int $idLock){ $this->idLock = $idLock; }
    public function getLength(){ return $this->idLock; }
}
