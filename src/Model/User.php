<?php

/**
 * Created by PhpStorm.
 * User: jcarfantan
 * Date: 07/06/2018
 * Time: 14:06
 */

namespace App\Model;

use Core\Repositories\RepositoryFactory;

class User implements \JsonSerializable
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

    public function getUr1Identifier() { return $this->ur1identifier; }

    public function setUr1Identifier(string $id) { $this->ur1identifier = $id; }

    public function getEnssatPrimaryKey() { return $this->enssatPrimaryKey; }

    public function setEnssatPrimaryKey(string $id)
    {
        $this->enssatPrimaryKey
            = $id;
    }

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

    public function getStatus() { return $this->status; }

    public function setStatus(string $status) { $this->status = $status; }

    public function getEmail() { return $this->email; }

    public function setEmail(string $email) { $this->email = $email; }

    public function borrowKeychains()
    {
        $model = RepositoryFactory::getRepository('borrowKeychains');

        return $model->findBy('idUser', $this->enssatPrimaryKey);
    }

    public function keys()
    {

        $result = array();

        $borrowKeychainModel = RepositoryFactory::getRepository(
            'borrowKeychains'
        );
        $borrowKeychains = $borrowKeychainModel->findBy(
            'idUser', $this->enssatPrimaryKey
        );

        $keychainModel = RepositoryFactory::getRepository('keychains');

        foreach($borrowKeychains as $borrowKeychain) {

            $keychain = $keychainModel->findById(
                $borrowKeychain->getIdKeychain()
            );

            $keyAssociations = new KeyAssociation();
            $keyAssociationsSelected = $keyAssociations->keys(
                $keychain->getId()
            );

            $modelKeys = RepositoryFactory::getRepository('keys');
            foreach($keyAssociationsSelected as $keyAssociationSelected) {
                array_push(
                    $result,
                    $modelKeys->findById($keyAssociationSelected->getIdKey())
                );
            }
        }

        return $result;
    }

    public function rooms()
    {

        $result = array();

        $borrowKeychainModel = RepositoryFactory::getRepository(
            'borrowKeychains'
        );
        $borrowKeychains = $borrowKeychainModel->findBy(
            'idUser', $this->enssatPrimaryKey
        );

        $openLocksModel = RepositoryFactory::getRepository('openLocks');
        $roomsDoorModel = RepositoryFactory::getRepository('roomDoors');
        $roomModel = RepositoryFactory::getRepository('rooms');
        $doorsModel = RepositoryFactory::getRepository('doors');
        $keychainModel = RepositoryFactory::getRepository('keychains');

        foreach($borrowKeychains as $borrowKeychain) {

            $keychain = $keychainModel->findById(
                $borrowKeychain->getIdKeychain()
            );

            $keyAssociations = new KeyAssociation();
            $keyAssociationsSelected = $keyAssociations->keys(
                $keychain->getId()
            );

            foreach($keyAssociationsSelected as $keyAssociationSelected) {
                $openLocks = $openLocksModel->findBy(
                    'idKey', $keyAssociationSelected->getIdKey()
                );

                foreach($openLocks as $openLock) {

                    $doors = $doorsModel->findBy(
                        'idLock', $openLock->getIdLock()
                    );

                    foreach($doors as $door) {
                        $roomsId = $roomsDoorModel->findBy(
                            'idDoor', $door->getId()
                        );

                        foreach($roomsId as $roomId) {
                            $rooms = $roomModel->findById($roomId->getIdRoom());
                            array_push($result, $rooms);
                        }
                    }
                }
            }
        }

        return $result;
    }


    public function jsonSerialize()
    {
        return [
            'enssatPrimaryKey' => $this->enssatPrimaryKey,
            'ur1identifier'    => $this->ur1identifier,
            'username'         => $this->username,
            'name'             => $this->name,
            'surname'          => $this->surname,
            'phone'            => $this->phone,
            'status'           => $this->status,
            'email'            => $this->email,
        ];
    }

}