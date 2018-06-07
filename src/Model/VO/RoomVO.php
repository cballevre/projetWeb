<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model\VO;

class RoomVO
{
    protected $id;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

}
