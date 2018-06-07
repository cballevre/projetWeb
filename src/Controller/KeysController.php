<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 27/05/2018
 * Time: 22:44
 */

namespace App\Controller;

use Core\DAO\ImplementationDAOFactory;

class KeysController extends AppController
{
    public function index() {

        $keyDAO = ImplementationDAOFactory::getInstance('keys');
        $keys = $keyDAO->findAll();

        $this->setHeadline("Clés");
        $this->set($keys);
        $this->render('index');
    }

    public function add($id, $type){


        $document = DOMDocument::load("keys.xml" );

        $key = $document->createElement("key");
        $key = $document->appendChild($key);
        $keyId = $document->createElement("id", $id);
        $keyId = $key->appendChild($keyId);
        $keyType = $document->createElement("type", $type);
        $keyType = $key->appendChild($keyType);

        print $document->saveXML();

    }
}