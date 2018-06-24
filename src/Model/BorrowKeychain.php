<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

use Core\Repositories\RepositoryFactory;

class BorrowKeychain {

    /**
     * @Id
     */
    protected $id;
    protected $idKeychain;
    protected $idUser;
    protected $dateRetour;

    public function getId() { return $this->id; }
    public function setId(int $id) { $this->id = $id; }

    public function getIdKeychain() { return $this->idKeychain; }
    public function setIdKeychain(int $idKeychain) { $this->idKeychain = $idKeychain; }

    public function getIdUser(){ return $this->idUser; }
    public function setIdUser(int $idUser){ $this->idUser=$idUser; }

    public function getDateRetour(){ return $this->dateRetour; }
    public function setDateRetour(\DateTime $dateRetour){ $this->dateRetour=$dateRetour; }

    public function user() {
        $model = RepositoryFactory::getRepository('users');
        return $model->findByID($this->idUser);
    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'idKeychain' => $this->idKeychain,
            'idUser' => $this->idUser,
            'dateRetour' => $this->dateRetour
        ];
    }
}
