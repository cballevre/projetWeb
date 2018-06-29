<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class Keychain
{
    /**
     * @Id
     */
    protected $id;
    protected $creationDate;
    protected $destructionDate;

    public function getId() { return $this->id; }

    public function setId(int $id) { $this->id = $id; }

    public function getCreationDate() { return $this->creationDate; }

    public function setCreationDate(\DateTime $date)
    {
        $this->creationDate
            = $date;
    }

    public function getDestructionDate() { return $this->destructionDate; }

    public function setDestructionDate(\DateTime $date)
    {
        $this->destructionDate
            = $date;
    }
}
