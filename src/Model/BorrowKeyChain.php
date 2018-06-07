<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class BorrowKeyChain
{
    protected $idKeyChain;
    protected $idUser;
    protected $dateRetour;

    public function setIdKeyChain(int $idKeyChain) { $this->idKeyChain = $idKeyChain; }
    public function getIdKeyChain() { return $this->idKeyChain; }

    public function setIdUser(int $idUser){ $this->idUser=$idUser; }
    public function getIdUser(){ return $this->idUser; }

    public function setDateRetour(\Date $dateRetour){ $this->dateRetour=$dateRetour; }
    public function getDateRetour(){ return $this->dateRetour; }

}
