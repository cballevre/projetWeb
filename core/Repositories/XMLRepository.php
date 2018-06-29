<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 13:58
 */

namespace Core\Repositories;

use Core\Utils\Serializer;

/**
 * Class XMLRepository
 *
 * @package Core\Repositories
 */
class XMLRepository implements RepositoryInterface
{

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var
     */
    protected $entityName;

    /**
     * @var string
     */
    protected $entityNamespace;

    /**
     * @var string
     */
    protected $entityStorage;

    /**
     * @var
     */
    protected $entityPrimaryKey;

    /**
     * XMLRepository constructor.
     *
     * @param $entityName
     */
    public function __construct($entityName)
    {

        $this->entityName = $entityName;
        $this->entityNamespace = 'App\\Model\\' . ucfirst(
                $this->singular($this->entityName)
            );
        $this->entityStorage = ROOT . '/data/' . $this->entityName . '.xml';
        $this->entityPrimaryKey = $this->findPrimaryKey();

        if(file_exists($this->entityStorage)) {

            $xml = simplexml_load_file($this->entityStorage);

            foreach($xml->children() as $child) {

                $serializer = new Serializer();
                $entity = $serializer->fromXML($child, $this->entityNamespace);

                array_push($this->data, $entity);

            }

        } else {
            throw new \RuntimeException(
                'Echec lors de l\'ouverture du fichier' . $this->entityName
                . '.xml.'
            );
        }
    }

    /**
     * @param $str
     *
     * @return bool|string
     */
    private function singular($str)
    {

        $last = substr($str, -1);

        if($last == 's') {
            return substr($str, 0, strlen($str) - 1);
        } else {
            throw new \RuntimeException(
                'Problème de pluriel dans le nom de la table'
            );
        }
    }

    /**
     * @return mixed
     */
    private function findPrimaryKey()
    {

        $reflect = new \ReflectionClass($this->entityNamespace);

        foreach($reflect->getProperties() as $reflectionProperty) {

            $regex = '/@Id/mi';
            $doc = $reflectionProperty->getDocComment();

            if(preg_match($regex, $doc)) {
                return $reflectionProperty->name;
            }
        }


        throw new \RuntimeException(
            'L\'entité ' . $this->entityName . ' ne possède pas de primaryKey'
        );

    }

    /**
     * @param $entities
     *
     * @return mixed
     */
    public function create(array $entities)
    {

        $path = ROOT . '/data/' . $this->entityName . '.xml';

        if(file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach($entities as $entity) {

                $xmlEntity = $xml->addChild($this->singular($this->entityName));
                $reflect = new \ReflectionClass($entity);

                foreach($reflect->getProperties() as $reflectionProperty) {

                    $propertyName = $reflectionProperty->name;

                    if($propertyName == $this->entityPrimaryKey) {
                        $value = (int)$xml->children()->count();
                        $entity->{"set" . ucfirst($this->entityPrimaryKey)}(
                            $value
                        );
                    } else {
                        $methodName = 'get' . ucfirst($propertyName);
                        $value = $entity->$methodName();
                    }

                    if(gettype($value) == 'object') {
                        if(get_class($value) == 'DateTime') {
                            $tmp = $value;
                            $value = $tmp->getTimestamp();
                        }
                    }

                    $xmlEntity->addChild($propertyName, $value);
                }
            }

            $xml->saveXML($path);
        }

        return $entities;
    }

    /**
     * @param $id
     */
    public function delete($id)
    {

        $path = ROOT . '/data/' . $this->entityName . '.xml';

        if(file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach($xml->children() as $child) {
                if($child->{$this->entityPrimaryKey}->__toString() == $id) {
                    $dom = dom_import_simplexml($child);
                    $dom->parentNode->removeChild($dom);
                }
            }

            $xml->saveXML($path);

        }
    }

    /**
     * @return array
     */
    public function findAll()
    {
        return $this->data;
    }

    /**
     * @param $type
     * @param $value
     *
     * @return array
     */
    public function findBy($type, $value)
    {

        $method = 'get' . ucfirst($type);

        $result = array();

        foreach($this->data as $entity) {
            if($entity->$method() == $value) {
                array_push($result, $entity);
            }
        }

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed|null
     */
    public function findById($id)
    {

        $method = 'get' . ucfirst($this->entityPrimaryKey);

        foreach($this->data as $entity) {
            if($entity->$method() == $id) {
                return $entity;
            }
        }

        return null;
    }

    /**
     * @param $entity
     * @param $id
     */
    public function update($entity, $id)
    {

        $path = ROOT . '/data/' . $this->entityName . '.xml';

        if(file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach($xml->children() as $child) {
                if($child->{$this->entityPrimaryKey}->__toString() == $id) {
                    foreach($child->children() as $test) {
                        $reflect = new \ReflectionClass($entity);
                        foreach(
                            $reflect->getProperties() as $reflectionProperty
                        ) {
                            $propertyName = $reflectionProperty->name;
                            $methodName = 'get' . ucfirst($propertyName);

                            $value = $entity->$methodName();

                            if(gettype($value) == 'object') {
                                if(get_class($value) == 'DateTime') {
                                    $tmp = $value;
                                    $value = $tmp->getTimestamp();
                                }
                            }

                            $child->$propertyName = $value;
                        }
                    }
                }
            }
            $xml->saveXML($path);
        }

    }

}