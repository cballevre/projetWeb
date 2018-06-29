<?php

/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 25/06/2018
 * Time: 08:42
 */

namespace Core\Network;

/**
 * Class Session
 *
 * @package Core\Network
 */
class Session
{

    /**
     * @var
     */
    private static $_instance;

    /**
     * @return Session
     */
    public static function getInstance()
    {
        if(is_null(self::$_instance)) {
            self::$_instance = new Session();
        }

        return self::$_instance;
    }

    /**
     * @param $key
     * @param $value
     */
    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    /**
     * @param null $key
     *
     * @return bool
     */
    public function read($key = null)
    {
        if($key) {
            if(isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else {
                return false;
            }
        } else {
            return $_SESSION;
        }
    }
}
