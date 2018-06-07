<?php

namespace App\Model\VO;

class LockVO
{
    protected $id;
    protected $length;

    public function setId(int $id){ $this->id = $id; }
    public function getId(){ return $this->id; }

    public function setLength(float $length){ $this->length = $length; }
    public function getLength(){ return $this->length; }
}
