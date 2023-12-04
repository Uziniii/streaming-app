<?php

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

$router = new Streaming\Router($_SERVER['REQUEST_URI']);
$router->get('/', 'MovieController@index');
$router->get('/search/:keyword', 'MovieController@search');
$router->get('/searchTest', 'MovieController@searchTest');

$router->run();
