<?php

/**
 * Created by PhpStorm.
 * User: aaudemard
 * Date: 06/06/2018
 * Time: 19:23
 */

namespace App\Model;

use Core\Repositories\RepositoryFactory;

class KeyAssociation
{
    /** @Id */
    protected $id;
    protected $idKeychain;
    protected $idKey;
    protected $idMasterKey;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function getIdKeychain(){ return $this->idKeychain; }
    public function setIdKeychain(int $idKeychain){ $this->idKeychain = $idKeychain; }

    public function getIdKey(){ return $this->idKey; }
    public function setIdKey(int $idKey){ $this->idKey = $idKey; }

    public function getIdMasterKey(){ return $this->idMasterKey;}
    public function setIdMasterKey(int $idMasterKey){ $this->idMasterKey = $idMasterKey; }

    public function keys($id){
        $model = RepositoryFactory::getRepository('keyAssociations');
        return $model->findBy('idKeychain', $id);
    }

    public function keychains($id){
        $model = RepositoryFactory::getRepository('keyAssociations');
        return $model->findBy('idKey', $id);
    }

}
