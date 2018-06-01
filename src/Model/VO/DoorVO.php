<?php

namespace App\Model\VO;

class DoorVO
{
    protected $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

}
