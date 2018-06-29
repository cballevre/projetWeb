<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 09/06/2018
 * Time: 21:53
 */

namespace Core\Utils;

class Serializer
{
    /**
     * @param $xml
     * @param $class
     *
     * @return mixed
     */
    public function fromXML($xml, $class)
    {

        $object = new $class();

        $reflect = new \ReflectionClass($object);

        foreach($reflect->getProperties() as $reflectionProperty) {

            $propertyName = $reflectionProperty->name;


            $methodName = 'set' . ucfirst($propertyName);

            $reflectMethod = $reflect->getMethod($methodName);

            $methodType = $reflectMethod->getParameters()[0]->getType();

            if(!is_null($methodType)) {

                $methodTypeName = $methodType->__toString();
                $result = $xml->$propertyName;

                switch($methodTypeName) {
                    case 'int':
                        $result = (int)$result;
                        break;
                    case 'float':
                        $result = (float)$result;
                        break;
                    case 'string':
                        $result = (string)$result;
                        break;
                    case 'DateTime':
                        $tmp = (int)$result;
                        $result = new \DateTime();
                        $result->setTimestamp((int)$tmp);
                        break;

                }

                $object->$methodName($result);

            }
        }

        return $object;

    }

    /**
     * @param $class
     */
    public function toXML($class)
    {


    }

    /**
     * @param $str
     * @param $class
     *
     * @return array
     */
    public function fromCSV($str, $class)
    {

        $header = null;
        $pre_result = array();
        $entities = array();

        $data = str_getcsv($str, "\n");
        foreach($data as $row) {
            $row = str_getcsv($row, ",");
            if(!$header) {
                $header = $row;
            } else {
                $pre_result[] = array_combine($header, $row);
            }
        }


        foreach($pre_result as $entity) {

            $object = new $class();

            $reflect = new \ReflectionClass($object);

            foreach($reflect->getProperties() as $reflectionProperty) {


                $propertyName = $reflectionProperty->name;
                $methodName = 'set' . ucfirst($propertyName);

                $reflectMethod = $reflect->getMethod($methodName);

                $methodType = $reflectMethod->getParameters()[0]->getType();

                if(!is_null($methodType)) {

                    $methodTypeName = $methodType->__toString();
                    $result = $entity[$propertyName];

                    switch($methodTypeName) {
                        case 'int':
                            $result = (int)$result;
                            break;
                        case 'float':
                            $result = (float)$result;
                            break;
                        case 'string':
                            $result = (string)$result;
                            break;
                        case 'DateTime':
                            $tmp = (int)$result;
                            $result = new \DateTime();
                            $result->setTimestamp((int)$tmp);
                            break;

                    }

                    $object->$methodName($result);

                }
            }

            array_push($entities, $object);

        }

        return $entities;

    }
}