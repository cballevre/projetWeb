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

                $this->makeAssociation($entity);

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

        $entityName = 'App\\Model\\'.ucfirst($this->singular($this->entityName));

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach ($entities as $entity) {
                $xmlEntity = $xml->addChild($this->singular($this->entityName));
                $reflect = new \ReflectionClass($entity);

                foreach($reflect->getProperties() as $reflectionProperty) {

                    $propertyName = $reflectionProperty->name;

                    if($propertyName == $this->primaryKey) {
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

        $entityName = 'App\\Model\\'.ucfirst($this->singular($this->entityName));

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach ($xml->children() as $child) {
                if ($child->{$this->primaryKey}->__toString() == $id) {
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

        $entityName = 'App\\Model\\'.ucfirst($this->singular($this->entityName));

        $path = ROOT .'/data/'. $this->entityName .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);

            foreach ($xml->children() as $child) {
                if($child->{$this->primaryKey}->__toString() == $id) {
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

    private function makeAssociation($entity) {

        $regex_expression = '/@([a-zA-Z\(\)="\',]*)/m';
        $regex_association = '/([a-zA-Z]*)\(targetEntity="([a-zA-Z]*)",mappedBy="([a-zA-Z]*)"\)/m';

        $reflect = new \ReflectionClass($entity);

        foreach($reflect->getProperties() as $reflectionProperty) {

            $reflectionPropertyDoc = $reflectionProperty->getDocComment();
            $propertyName = $reflectionProperty->name;
            $methodName = 'set' . ucfirst($propertyName);

            if(!empty($reflectionPropertyDoc)) {

                $reflectionPropertyDoc = str_replace(" ", "", $reflectionPropertyDoc);
                preg_match_all($regex_expression, $reflectionPropertyDoc, $expressions, PREG_SET_ORDER, 0);

                foreach ($expressions as $expression) {
                    preg_match_all($regex_association, $expression[0], $params, PREG_SET_ORDER, 0);
                    if(!empty($params)) {

                        $associationType = $params[0][1];
                        $associationEntity = $params[0][2];
                        $associationMappedBy= $params[0][3];

                        $associationRepository = RepositoryFactory::getRepository($associationMappedBy);

                        $associationResults = array();

                        switch ($associationType) {

                            case 'OneToMany':
                                $associationResults = $associationRepository->findBy('id'. ucfirst($this->singular($this->entityName)), $entity->{'get'.ucfirst($this->entityPrimaryKey)}());
                            break;
                            case 'ManyToOne':
                                break;
                            case 'ManyToMany':

                                $associationResults = $associationRepository->findBy('id'. ucfirst($this->singular($this->entityName)), $entity->{'get'.ucfirst($this->entityPrimaryKey)}());
                                $associationEntityRepository = RepositoryFactory::getRepository($associationEntity);

                                $result = array();

                                foreach ($associationResults as $associationResult) {
                                   $data = $associationEntityRepository->findById($associationResult->{'getId'. $this->singular(ucfirst($associationEntity))}());

                                   if(!is_null($data)) {
                                       array_push($result, $data);
                                   }
                                }

                                $entity->$methodName($result);

                                break;
                        }

                    }
                }
            }
        }
    }
}