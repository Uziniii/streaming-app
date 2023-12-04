<?php

require_once("../vendor/autoload.php");
require_once("../config/config.php");

$router = new Streaming\Router($_SERVER['REQUEST_URI']);


$router->run();
