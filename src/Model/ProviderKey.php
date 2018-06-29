<?php

namespace App\Model;

class ProviderKey
{
    protected $idProvider;
    protected $idKey;

    public function getIdProvider() { return $this->idProvider; }

    public function setIdProvider(int $idProvider)
    {
        $this->idProvider
            = $idProvider;
    }

    public function getIdKey() { return $this->idKey; }

    public function setIdKey(int $idKey) { $this->idKey = $idKey; }

}
