<?php

namespace Model\Resource;

class Base
{
    protected function connect()
    {
        $dataSource = "mysql:host=localhost;dbname=projectplanner";
        $pdo = new \PDO($dataSource, 'root','');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
