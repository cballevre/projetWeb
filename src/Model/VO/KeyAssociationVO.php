<?php

/**
 * Created by PhpStorm.
 * User: aaudemard
 * Date: 06/06/2018
 * Time: 19:23
 */

namespace App\Model\VO;

class KeyAssociationVO
{
    protected $id;
    protected $idKeyChain;
    protected $idKey;
    protected $idMasterKey;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function getIdKeyChain(){ return $this->idKeyChain; }
    public function setIdKeyChain(int $idKeyChain){ $this->idKeyChain = $idKeyChain; }

    public function getIdKey(){ return $this->idKey; }
    public function setIdKey(int $idKey){ $this->idKey = $idKey; }

    public function getIdMasterKey(){ return $this->idMasterKey;}
    public function setIdMasterKey(int $idMasterKey){ $this->idMasterKey = $idMasterKey; }

}
