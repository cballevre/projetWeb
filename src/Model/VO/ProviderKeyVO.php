<?php

namespace App\Model\VO;

class ProviderKeyVO
{
    protected $idProvider;
    protected $idKey;

    public function setIdProvider($idProvider) {
        $this->idProvider = $idProvider;
    }

    public function getIdProvider() {
        return $this->idProvider;
    }

    public function setIdKey($idKey) {
        $this->idKey = $idKey;
    }

    public function getIdKey() {
        return $this->idKey;
    }

}
