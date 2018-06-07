<?php

namespace App\Model;

class Lock
{
    protected $id;
    protected $length;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function getLength() {
        return $this->length;
    }
}
