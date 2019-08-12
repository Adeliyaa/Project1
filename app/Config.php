<?php

namespace App;

use Exception;

class Config
{
    /** @var array storage of parameter value */
    private static $config;

    /**
     * get config array
     * @return array|mixed
     */
    public static function getConfig()
    {
        if (self::$config === null) {
            self::$config = include_once(ROOT.'configuration.php');
        } else {
            return self::$config;
        }
    }

    /**
     * get parameter values
     * @param string $key
     * @return mixed|null
     */
    public static function get(string $key)
    {
        self::getConfig();

        try {
            if(isset(self::$config[$key])) {
                $value = self::$config[$key];

                return $value;
            } else {
                throw new Exception("Key is not exist!");
            }
        }
         catch(Exception $e) {
            echo "\n Exception Caught", $e->getMessage();
        }
    }
}
