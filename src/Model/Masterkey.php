<?php

namespace App\Model;

class Masterkey
{
    /** @Id */
    protected $id;

    public function setId(int $id){ $this->id = $id; }
    public function getId(){ return $this->id; }

}
