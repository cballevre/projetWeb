<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 09/06/2018
 * Time: 21:53
 */

namespace Core\Utils;

class Serializer {

    public function fromXML($xml, $class) {

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

                switch ($methodTypeName) {
                    case 'int':
                        $result = (int) $result;
                        break;
                    case 'float':
                        $result = (float) $result;
                        break;
                    case 'string':
                        $result = (string) $result;
                        break;
                    case 'DateTime':
                        $tmp = (int) $result;
                        $result = new \DateTime();
                        $result->setTimestamp((int) $tmp);
                        break;

                }

                $object->$methodName($result);

            }
        }

        return $object;

    }

    public function toXML($class) {



    }

}