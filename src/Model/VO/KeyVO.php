<?php

/**
 * Created by PhpStorm.
 * User: cballevre, aaudemard
 * Date: 06/06/2018
 * Time: 19:23
 */

namespace App\Model\VO;

class KeyVO
{

    public static $keyType = array("Simple" => "Clé", "Partiel" => "Passe Partiel", "Total" => "PasseTotal");

    protected $id;
    protected $type; //Clef ou Passe Partiel ou Passe Total
    protected $etat;
    protected $keyParent;
    protected $nbCommande;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setType($type)
    {
        if (array_key_exists($type, $this->keyType)) {
            $this->type = $type;
        } else {
            throw new \RuntimeException('Le type de clef <strong>' . $type . '</strong> n\'existe pas !');
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function getEtat()
    {
        return $this->etat;
    }

    public function setKeyParent($keyParent)
    {
        $this->keyParent = $keyParent;
    }

    public function getKeyParent()
    {
        return $this->keyParent;
    }

    public function setNbCommande($nbCommande)
    {
       /* mlkmlkm */
    }

    public function getNbCommande(){
        return $this->nbCommande;
    }

}
