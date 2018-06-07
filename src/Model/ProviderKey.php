<?php

namespace App\Model;

class ProviderKey
{
    protected $idProvider;
    protected $idKey;

    public function setIdProvider(int $idProvider){ $this->idProvider = $idProvider; }
    public function getIdProvider(){ return $this->idProvider; }

    public function setIdKey(int $idKey){ $this->idKey = $idKey; }
    public function getIdKey(){ return $this->idKey; }

}
