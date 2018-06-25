<?php

namespace App\Model;

use Core\Repositories\RepositoryFactory;

class OpenLock
{
    /** @id */
    protected $id;
    protected $idKey;
    protected $idLock;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function setIdKey(int $idKey){ $this->idKey = $idKey; }
    public function getIdKey(){ return $this->idKey; }

    public function setIdLock(int $idLock){ $this->idLock = $idLock; }
    public function getIdLock(){ return $this->idLock; }

    public function keys(int $idLock){
        $model = RepositoryFactory::getRepository('openLocks');
        return $model->findBy('idLock', $idLock);
    }

    public function locks(int $idKey){
        $model = RepositoryFactory::getRepository('openLocks');
        return $model->findBy('idKey', $idKey);
    }

}
