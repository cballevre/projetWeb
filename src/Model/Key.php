<?php

/**
 * Created by PhpStorm.
 * User: cballevre, aaudemard
 * Date: 06/06/2018
 * Time: 19:23
 */

namespace App\Model;

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

}
