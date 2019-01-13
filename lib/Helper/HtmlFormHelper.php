<?php

namespace Helper;

class HtmlFormHelper
{
    private static $_instance = null;
    private $_pdo = null;

    private function __construct()
    {
        $dataSource = "mysql:host=localhost;dbname=projectplanner";
        $pdo = new \PDO($dataSource, 'root','');
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->_pdo = $pdo;
    }

    private function __clone() {}

    public static function getInstance()
    {
        if(self::$_instance == null) {
            self::$_instance = new HtmlFormHelper();
        }

        return self::$_instance;
    }

    public function getStatusList()
    {
        $sql = "
        SELECT `id`,
            `desc`
            FROM `status`
        ";

        $res = $this->_pdo->query($sql);

        $list = [];

        while ($row = $res->fetch(\PDO::FETCH_ASSOC)) {
            $list[] = $row;
        }

        return $list;
    }

    public function getPriorityList() {}
}
