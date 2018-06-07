<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model\VO;

class DoorAccessVO
{
    protected $id;
    protected $idUser;
    protected $idRoom;
    protected $dateDebut;
    protected $dateFin;

    public function setId($id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setIdUser($idUser){ $this->idUser=$idUser; }
    public function getIdUser(){ return $this->idUser; }

    public function setIdRoom($idRoom){ $this->idRoom=$idRoom; }
    public function getIdRoom(){ return $this->idRoom; }

    public function setDateDebut($dateDebut){ $this->dateDebut=$dateDebut; }
    public function getDateDebut(){ return $this->dateDebut; }

    public function setDateFin($dateFin){ $this->dateFin=$dateFin; }
    public function getDateFin(){ return $this->dateFin; }

}
