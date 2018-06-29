<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 13:59
 */

namespace Core\Repositories;

/**
 * Class RepositoryFactory
 *
 * @package Core\Repositories
 */
class RepositoryFactory
{

    /**
     * @var array
     */
    public static $instances = array();

    /**
     * @param string $entityName
     *
     * @return mixed
     */
    public static function getRepository(string $entityName)
    {

        if(!isset(self::$instances[$entityName])) {
            self::$instances[$entityName] = new XMLRepository($entityName);
        }

        return self::$instances[$entityName];
    }
}