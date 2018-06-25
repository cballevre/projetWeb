<?php

namespace App\Model;

class Lock
{
    /** @Id */
    protected $id;
    protected $length;

    public function setId(int $id){ $this->id = $id; }
    public function getId(){ return $this->id; }

    public function setLength(int $length){ $this->length = $length; }
    public function getLength(){ return $this->length; }
}
