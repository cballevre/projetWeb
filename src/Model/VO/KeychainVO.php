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

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setCreationDate($date){ $this->creationDate=$date; }
    public function getCreationDate(){ return $this->creationDate; }

    public function setDestructionDate($date){ $this->destructionDate=$date; }
    public function getDestructionDate(){ return $this->destructionDate; }

}
