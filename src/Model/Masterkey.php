<?php

namespace App\Model;

class Masterkey
{
    protected $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }


}
