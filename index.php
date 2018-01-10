<?php
define('APPLICATION_PATH', dirname(__FILE__));

//composer自动加载
require APPLICATION_PATH . "/application/vendor/autoload.php";

$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");

$application->bootstrap()->run();
?>
