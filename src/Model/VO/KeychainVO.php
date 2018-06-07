<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model\VO;

class KeychainVO
{
    protected $id;
    protected $creationDate;
    protected $destructionDate;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setCreationDate(\Date $date){ $this->creationDate=$date; }
    public function getCreationDate(){ return $this->creationDate; }

    public function setDestructionDate(\Date $date){ $this->destructionDate=$date; }
    public function getDestructionDate(){ return $this->destructionDate; }

}
