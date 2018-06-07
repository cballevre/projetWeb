<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 00:40
 */

namespace Core\DAO;


class ImplementationDAOFactory
{

    public static $instances = array();

    public static function getInstance($table) {

        $is_null = true;

        foreach (self::$instances as $name => $instance) {
            if($name == $table) {
                $is_null = false;
            }
        }

        if($is_null) {
            self::$instances[$table] = new ImplementationDAO($table);
        }

        return self::$instances[$table];

    }

}