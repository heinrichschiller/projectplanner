<?php

include __DIR__ . '/autoloader.php';

ini_set('display_errors', true);

define('ABS_PATH', dirname(__FILE__));

$bootstrap = new Bootstrap();
$bootstrap->run();
