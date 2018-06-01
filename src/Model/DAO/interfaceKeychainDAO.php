<?php

namespace App\Model\DAO;

interface interfaceKeyChainDAO
{

    // Singleton
    public static function getInstance();

    public function getKeychains();

    public function getRandomKeychain();

}

?>
