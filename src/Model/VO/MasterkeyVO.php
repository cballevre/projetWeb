<?php

namespace App\Model\VO;

class MasterkeyVO
{
    protected $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }


}
