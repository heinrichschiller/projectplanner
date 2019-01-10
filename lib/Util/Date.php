<?php

namespace Util;

class Date
{
    private static $_instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance()
    {
        if(self::$_instance == null) {
            self::$_instance = new Date();
        }

        return self::$_instance;
    }

    public function formatDateTime($datetime)
    {
        return strftime('%d.%m.%Y %H:%M', $datetime);
    }
}
