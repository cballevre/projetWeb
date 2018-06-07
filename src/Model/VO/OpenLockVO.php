<?php

namespace App\Model\VO;

class OpenLockVO
{
    protected $idKey;
    protected $idLock;

    public function setIdKey($idKey) {
        $this->idKey = $idKey;
    }

    public function getIdKey() {
        return $this->idKey;
    }

    public function setIdLock($idLock) {
        $this->idLock = $idLock;
    }

    public function getLength() {
        return $this->idLock;
    }
}
