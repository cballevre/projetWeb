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

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdKeyChain()
    {
        return $this->idKeyChain;
    }

    /**
     * @param mixed $idKeyChain
     */
    public function setIdKeyChain($idKeyChain)
    {
        $this->idKeyChain = $idKeyChain;
    }

    /**
     * @return mixed
     */
    public function getIdKey()
    {
        return $this->idKey;
    }

    /**
     * @param mixed $idKey
     */
    public function setIdKey($idKey)
    {
        $this->idKey = $idKey;
    }

    /**
     * @return mixed
     */
    public function getIdMasterKey()
    {
        return $this->idMasterKey;
    }

    /**
     * @param mixed $idMasterKey
     */
    public function setIdMasterKey($idMasterKey)
    {
        $this->idMasterKey = $idMasterKey;
    }


}
