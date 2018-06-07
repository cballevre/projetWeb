<?php

namespace App\Model\VO;

class MasterkeyVO
{
    protected $id;

    public function setId(int $id){ $this->id = $id; }
    public function getId(){ return $this->id; }

}
