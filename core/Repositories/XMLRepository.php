<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 13:58
 */

namespace Core\Repositories;


use Core\Utils\Serializer;

class XMLRepository {

    /**
     * @var array
     */
    protected $data = array();

    protected $entityName;
    protected $entityNamespace;
    protected $entityStorage;

    protected $primaryKey;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    public function __construct($entityName) {

        $this->entityName = $entityName;
        $this->entityNamespace = 'App\\Model\\'.ucfirst($this->singular($this->entityName));
        $this->entityStorage = ROOT .'/data/'. $this->entityName .'.xml';
        $this->entityPrimaryKey = $this->findPrimaryKey();

        if (file_exists($this->entityStorage)) {

            $xml = simplexml_load_file($this->entityStorage);

            foreach ($xml->children() as $child) {

                $serializer = new Serializer();
                $entity = $serializer->fromXML($child, $this->entityNamespace);

                array_push($this->data, $entity);
            }

        } else {
            throw new \RuntimeException('Echec lors de l\'ouverture du fichier'. $this->entityName .'.xml.');
        }

    }

    /**
     * @return array
     */
    public function findAll() {
        return $this->data;
    }

    /**
     * @param $id
     */
    public function findById($id) {

        $method = 'get' . ucfirst($this->entityPrimaryKey);

        foreach ($this->data as $entity) {
            if($entity->$method() == $id) {
                return $entity;
            }
        }

        return null;

    }

    /**
     * @param $type
     * @param $value
     * @return array
     */
    public function findBy($type, $value) {

        $method = 'get' . ucfirst($type);

        $result = array();

        foreach ($this->data as $entity) {
            if($entity->$method() == $value) {
                array_push($result, $entity);
            }
        }

        return $result;

    }

    /**
     * @param array $data
     */
    public function create($entities) {

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach ($entities as $entity) {
                $xmlEntity = $xml->addChild($this->singular($this->entityName));
                $reflect = new \ReflectionClass($entity);

                foreach($reflect->getProperties() as $reflectionProperty) {

                    $propertyName = $reflectionProperty->name;

                    if($propertyName == $this->entityPrimaryKey) {
                        $value = (int) $xml->children()->count();
                    } else {
                        $methodName = 'get' . ucfirst($propertyName);
                        $value = $entity->$methodName();
                    }

                    $xmlEntity->addChild($propertyName, $value);
                }
            }
            $xml->saveXML($path);
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update($entity, $id) {

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach ($xml->children() as $child) {
                if ($child->{$this->entityPrimaryKey}->__toString() == $id) {
                    foreach ($child->children() as $test) {
                        $reflect = new \ReflectionClass($entity);
                        foreach($reflect->getProperties() as $reflectionProperty) {
                            $propertyName = $reflectionProperty->name;
                            $methodName = 'get' . ucfirst($propertyName);
                            $child->$propertyName = $entity->$methodName();
                        }
                    }
                }
            }
            $xml->saveXML($path);
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach ($xml->children() as $child) {
                if($child->{$this->entityPrimaryKey}->__toString() == $id) {
                    $dom=dom_import_simplexml($child);
                    $dom->parentNode->removeChild($dom);
                }
            }

            $xml->saveXML($path);

        }
    }

    /**
     * @param $str
     * @return bool|string
     */
    private function singular($str) {

        $last = substr($str, -1);

        if($last == 's') {
            return substr($str, 0, strlen ($str)-1);
        } else {
            throw new \RuntimeException('Problème de pluriel dans le nom de la table');
        }
    }

    /**
     * @param $str
     * @return bool|string
     */
    private function plural($str) {

        return $str . 's';

    }

    private function findPrimaryKey() {

        $reflect = new \ReflectionClass($this->entityNamespace);

        foreach($reflect->getProperties() as $reflectionProperty) {

            $regex = '/@Id/mi';
            $doc = $reflectionProperty->getDocComment();

            if(preg_match($regex, $doc)) {
                return $reflectionProperty->name;
            }
        }



        throw new \RuntimeException('L\'entité ' . $this->entityName . ' ne possède pas de primaryKey');

    }

}