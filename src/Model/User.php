<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

class User
{
    /**
     * @Id
     */
    protected $enssatPrimaryKey; //32 bits
    protected $ur1identifier; //code apogee ou harpege, selon statut
    protected $username;
    protected $name;
    protected $surname;
    protected $phone;
    /**
     * @Domaine(Etudiant, Exterieur, personnel)
     */
    protected $status;
    protected $email;

    public function setUr1Identifier(string $id) { $this->ur1identifier = $id; }
    public function getUr1Identifier() { return $this->ur1identifier; }

    public function setEnssatPrimaryKey(string $id) { $this->enssatPrimaryKey = $id; }
    public function getEnssatPrimaryKey() { return $this->enssatPrimaryKey; }

    public function setUsername(string $username) { $this->username = $username; }
    public function getUsername() { return $this->username; }

    public function setName(string $name) { $this->name = $name; }
    public function getName() { return $this->name; }

    public function setSurname(string $surname) { $this->surname = $surname; }
    public function getSurname() { return $this->surname; }

    public function setPhone(string $phone) { $this->phone = $phone; }
    public function getPhone() { return $this->phone; }

    public function setStatus(string $status) { $this->status = $status; }
    public function getStatus() { return $this->status; }

    public function setEmail(string $email) { $this->email = $email; }
    public function getEmail() { return $this->email; }
}
