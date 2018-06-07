<?php

namespace App\Model\VO;

class ProviderLockVO
{
    protected $idProvider;
    protected $idLock;

    public function setIdProvider(int $idProvider){ $this->idProvider = $idProvider; }
    public function getIdProvider(){ return $this->idProvider; }

    public function setIdLock(int $idLock){ $this->idLock = $idLock; }
    public function getIdLock(){ return $this->idLock; }

}
