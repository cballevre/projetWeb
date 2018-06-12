<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class DoorAccess
{
    /** @Id */
    protected $id;
    protected $idUser;
    protected $idRoom;
    protected $dateDebut;
    protected $dateFin;

    public function setId(int $id) { $this->id = $id; }
    public function getId() { return $this->id; }

    public function setIdUser(int $idUser){ $this->idUser=$idUser; }
    public function getIdUser(){ return $this->idUser; }

    public function setIdRoom(int $idRoom){ $this->idRoom=$idRoom; }
    public function getIdRoom(){ return $this->idRoom; }

    public function setDateDebut(\Date $dateDebut){ $this->dateDebut=$dateDebut; }
    public function getDateDebut(){ return $this->dateDebut; }

    public function setDateFin(\Date $dateFin){ $this->dateFin=$dateFin; }
    public function getDateFin(){ return $this->dateFin; }

}
