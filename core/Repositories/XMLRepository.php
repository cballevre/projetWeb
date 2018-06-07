<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 13:58
 */

namespace Core\Repositories;


class XMLRepository {

    /**
     * @var array
     */
    protected $data = array();
    protected $entityName;
    protected $primaryKey;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    public function __construct($entityName) {

        $this->entityName = $entityName;
        $entityName = 'App\\Model\\'.ucfirst($this->singular($this->entityName));

        $reflect = new \ReflectionClass($entityName);

        foreach($reflect->getProperties() as $reflectionProperty) {

            $re = '/@id/mi';
            $str = $reflectionProperty->getDocComment();

            if(preg_match($re, $str)) {
                $this->primaryKey = $reflectionProperty->name;
            }
        }

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);
            foreach ($xml->children() as $element) {

                $entity = new $entityName();

                $reflect = new \ReflectionClass($entityName);

                foreach($reflect->getProperties() as $reflectionProperty) {

                    $propertyName = $reflectionProperty->name;
                    $methodName = 'set' . ucfirst($propertyName);
                    $reflectMethod = $reflect->getMethod($methodName);

                    $methodType = $reflectMethod->getParameters()[0]->getType();

                    if(!is_null($methodType)) {

                            $methodTypeName = $methodType->__toString();

                            $result = $element->$propertyName;
                            if($methodTypeName == "int") { $result = (int) $result; }
                            else if($methodTypeName == "float") { $result = (float) $result; }
                            else if($methodTypeName == "string") { $result = (string) $result; }

                            $entity->$methodName($result);

                    }
                }

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

        $method = 'get' . ucfirst($this->primaryKey);

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
    public function create(array $data) {

    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id) {

    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {

    }

    /**
     * @param $str
     * @return bool|string
     */
    private function singular($str) {

        $last = substr($str, -1);

        if($last = 's') {
            return substr($str, 0, strlen ($str)-1);
        } else {
            throw new \RuntimeException('Problème de pluriel dans le nom de la table');
        }
    }
}