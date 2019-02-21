<?php
require(__DIR__."/vendor/autoload.php"); // даёт доступ ко всем классам
require(__DIR__."/constants.php");
require(__DIR__."/config.php"); 

use Engine\Router;

$router = new Router();
$router->run();
