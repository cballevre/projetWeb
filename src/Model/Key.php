<?php

namespace App\Model;

class Key
{

    public static $keyType = array("Simple"=>"Clé","Partiel"=>"Passe Partiel","Total"=>"PasseTotal");

    protected $id;
    protected $type; //Clef ou Passe Partiel ou Passe Total

    public function setId(int $id) {
            $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setType(string $type) {
      if(array_key_exists($type, self::$keyType)){
        $this->type = $type;
      } else {
        throw new \RuntimeException('Le type de clef <strong>' . $type . '</strong> n\'existe pas !');
      }
    }

    public function getType() {
        return $this->type;
    }

}
