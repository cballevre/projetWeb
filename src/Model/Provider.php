<?php

namespace App\Model;

class Provider
{
    /** @Id */
    protected $id;
    protected $username;
    protected $name;
    protected $surname;
    protected $phone;
    protected $office;
    protected $email;

    public function getId() { return $this->id; }

    public function setId(int $id) { $this->id = $id; }

    public function getUsername() { return $this->username; }

    public function setUsername(string $username)
    {
        $this->username
            = $username;
    }

    public function getName() { return $this->name; }

    public function setName(string $name) { $this->name = $name; }

    public function getSurname() { return $this->surname; }

    public function setSurname(string $surname) { $this->surname = $surname; }

    public function getPhone() { return $this->phone; }

    public function setPhone(string $phone) { $this->phone = $phone; }

    public function getOffice() { return $this->office; }

    public function setOffice(string $office) { $this->office = $office; }

    public function getEmail() { return $this->email; }

    public function setEmail(string $email) { $this->email = $email; }

}
