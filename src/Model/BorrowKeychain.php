<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class BorrowKeychain {

    /**
     * @Id
     */
    protected $id;
    protected $idKeychain;
    protected $idUser;
    protected $dateRetour;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function setIdKeychain(int $idKeychain) { $this->idKeychain = $idKeychain; }
    public function getIdKeychain() { return $this->idKeychain; }

    public function setIdUser(int $idUser){ $this->idUser=$idUser; }
    public function getIdUser(){ return $this->idUser; }

    public function setDateRetour(\DateTime $dateRetour){ $this->dateRetour=$dateRetour; }
    public function getDateRetour(){ return $this->dateRetour; }
}
