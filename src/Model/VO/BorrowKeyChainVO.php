<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model\VO;

class BorrowKeyChainVO
{
    protected $idKeyChain;
    protected $idUser;
    protected $dateRetour;

    public function setIdKeyChain($idKeyChain) { $this->idKeyChain = $idKeyChain; }
    public function getIdKeyChain() { return $this->idKeyChain; }

    public function setIdUser($idUser){ $this->idUser=$idUser; }
    public function getIdUser(){ return $this->idUser; }

    public function setDateRetour($dateRetour){ $this->dateRetour=$dateRetour; }
    public function getDateRetour(){ return $this->dateRetour; }

}
