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
    protected $keyParent;
    protected $nbCommande;

    public function setId(int $id){ $this->id = $id; }
    public function getId(){ return $this->id; }

    public function setType(string $type){ $this->type = $type; }
    public function getType(){ return $this->type; }

    public function setEtat(string $etat){ $this->etat = $etat; }
    public function getEtat(){ return $this->etat; }

    public function setKeyParent(int $keyParent){ $this->keyParent = $keyParent; }
    public function getKeyParent(){ return $this->keyParent; }

    public function setNbCommande(int $nbCommande){ $this->nbCommande = $nbCommande; }
    public function getNbCommande(){ return $this->nbCommande; }

    public function doors() {

        $result = array();

        $openLocksModel = RepositoryFactory::getRepository('openLocks');
        $openLocks = $openLocksModel->findBy('idKey', $this->id);

        foreach ($openLocks as $openLock) {

            $doorsModel = RepositoryFactory::getRepository('doors');
            $doors = $doorsModel->findBy('idLock', $openLock->getIdLock());

            $result = array_merge($result, $doors);

        }

        return $result;

    }

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'etat' => $this->etat,
            'keyParent' => $this->keyParent,
            'nbCommande' => $this->nbCommande
        ];
    }
}
