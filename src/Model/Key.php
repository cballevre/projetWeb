<?php

/**
 * Created by PhpStorm.
 * User: cballevre, aaudemard
 * Date: 06/06/2018
 * Time: 19:23
 */

namespace App\Model;

use Core\Repositories\RepositoryFactory;

class Key
{

    /** @Id */
    protected $id;
    /**
     * @Domaine(Simple, Partiel, Total)
     */
    protected $type;
    protected $etat;

    public function getId() { return $this->id; }

    public function setId(int $id) { $this->id = $id; }

    public function getType() { return $this->type; }

    public function setType(string $type) { $this->type = $type; }

    public function getEtat() { return $this->etat; }

    public function setEtat(string $etat) { $this->etat = $etat; }

    public function rooms()
    {

        $result = array();

        $openLocksModel = RepositoryFactory::getRepository('openLocks');
        $openLocks = $openLocksModel->findBy('idKey', $this->id);

        $roomsDoorModel = RepositoryFactory::getRepository('roomDoors');

        $roomModel = RepositoryFactory::getRepository('rooms');

        $doorsModel = RepositoryFactory::getRepository('doors');

        foreach($openLocks as $openLock) {

            $doors = $doorsModel->findBy('idLock', $openLock->getIdLock());

            foreach($doors as $door) {
                $roomsId = $roomsDoorModel->findBy('idDoor', $door->getId());

                foreach($roomsId as $roomId) {
                    $rooms = $roomModel->findById($roomId->getIdRoom());
                    array_push($result, $rooms);
                }
            }

        }

        return $result;

    }

    public function jsonSerialize()
    {
        return [
            'id'   => $this->id,
            'type' => $this->type,
            'etat' => $this->etat
        ];
    }
}
