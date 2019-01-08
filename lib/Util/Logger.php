<?php

namespace Util;

class Logger
{
    private static $_instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance()
    {
        if(self::$_instance == null) {
            self::$_instance = new Logger();
        }

        return self::$_instance;
    }

    public function log(string $message)
    {
        
    }

    public function error(string $message)
    {

    }
}
