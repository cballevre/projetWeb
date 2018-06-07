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
    protected $table;
    protected $primaryKey;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    public function __construct($table) {

        $this->table = $table;

        $path = ROOT .'/data/'. $this->table .'.xml';

        if (file_exists($path)) {

            $xml = simplexml_load_file($path);
            foreach ($xml->children() as $element) {

                $entityName = 'App\\Model\\'.ucfirst($this->singular($this->table));
                $entity = new $entityName();

                $reflect = new \ReflectionClass($entityName);

                foreach($reflect->getMethods() as $reflectmethod) {

                    $methodName = $reflectmethod->getName();

                    if(substr($methodName, 0, 3) == "set") {
                        if($reflectmethod->getParameters()[0]->getType() != NULL) {
                            $methodType = $reflectmethod->getParameters()[0]->getType()->__toString();
                            $fieldname = lcfirst(substr($methodName, 3, strlen($methodName)));

                            $result = $element->$fieldname;
                            if($methodType == "int") { $result = (int) $result; }
                            else if($methodType == "float") { $result = (float) $result; }
                            else if($methodType == "string") { $result = (string) $result; }

                            $entity->$methodName($result);

                        }
                    }
                }

                array_push($this->data, $entity);
            }
        } else {
            throw new \RuntimeException('Echec lors de l\'ouverture du fichier'. $this->table .'.xml.');
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