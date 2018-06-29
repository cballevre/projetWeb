<?php

namespace App\Model;

class ProviderLock
{
    protected $idProvider;
    protected $idLock;

    public function getIdProvider() { return $this->idProvider; }

    public function setIdProvider(int $idProvider)
    {
        $this->idProvider
            = $idProvider;
    }

    public function getIdLock() { return $this->idLock; }

    public function setIdLock(int $idLock) { $this->idLock = $idLock; }

}
