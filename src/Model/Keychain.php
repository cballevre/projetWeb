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
     * @GeneratedValue
     */
    protected $id;
    protected $creationDate;
    protected $destructionDate;

    /**
     * @ManyToMany(targetEntity="keys", mappedBy="keyAssociations")
     */
    protected $keys;

    /**
     * @ManyToMany(targetEntity="masterKeys", mappedBy="keyAssociations")
     */
    protected $masterKeys;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setCreationDate(\DateTime $date){ $this->creationDate=$date; }
    public function getCreationDate(){ return $this->creationDate; }

    public function setDestructionDate(\DateTime $date){ $this->destructionDate=$date; }
    public function getDestructionDate(){ return $this->destructionDate; }

    public function getKeys() { return $this->keys; }
    public function setKeys($keys) { $this->keys = $keys; }

    public function getMasterKeys() { return $this->masterKeys; }
    public function setMasterKeys($masterKeys) { $this->masterKeys = $masterKeys; }

}
