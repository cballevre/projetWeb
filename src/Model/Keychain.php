<?php

namespace App\Model;

class Keychain
{
    protected $id;
    protected $creationDate;
    protected $destructionDate;

    public function setId($id) { $this->id = $id; }

    public function getId() { return $this->id; }

    public function setCreationDate($date) { $this->creationDate=$date; }

    public function getCreationDate() { return $this->creationDate; }

    public function setDestructionDate($date) { $this->destructionDate=$date; }

    public function getDestructionDate() { return $this->destructionDate; }
}
