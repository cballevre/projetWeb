<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model\VO;

class UserVO
{
    protected $ur1identifier; //code apogee ou harpege, selon statut
    protected $enssatPrimaryKey; //32 bits
    protected $username;
    protected $name;
    protected $surname;
    protected $phone;
    protected $status; //Etudiant, Exterieur, personnel
    protected $email;

    public function setUr1Identifier($id) { $this->ur1identifier = $id; }
    public function getUr1Identifier() { return $this->ur1identifier; }

    public function setEnssatPrimaryKey($id) { $this->enssatPrimaryKey = $id; }
    public function getEnssatPrimaryKey() { return $this->enssatPrimaryKey; }

    public function setUsername($username) { $this->username = $username; }
    public function getUsername() { return $this->username; }

    public function setName($name) { $this->name = $name; }
    public function getName() { return $this->name; }

    public function setSurname($surname) { $this->surname = $surname; }
    public function getSurname() { return $this->surname; }

    public function setPhone($phone) { $this->phone = $phone; }
    public function getPhone() { return $this->phone; }

    public function setStatus($status) { $this->status = $status; }
    public function getStatus() { return $this->status; }

    public function setEmail($email) { $this->email = $email; }
    public function getEmail() { return $this->email; }
}
