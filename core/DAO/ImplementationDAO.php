<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 06/06/2018
 * Time: 22:37
 */

namespace Core\DAO;

class ImplementationDAO implements interfaceDAO
{

    /**
     * @var array
     */
    protected $data = array();
    protected $table;

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
     * @param string $type
     * @param array $params
     */
    public function findAll() {
        return $this->data;
    }

    public function findByPrimaryKey($primaryKey) {

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