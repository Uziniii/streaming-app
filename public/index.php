<?php

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

$router = new Streaming\Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

$movieController = new Streaming\Controllers\MovieController(new Streaming\Models\MovieManager());

// Add routes using the new addRoute method
$router->addRoute('GET', '/', [$movieController, 'showHomepage']);
$router->addRoute('GET', '/movie/{id}', [$movieController, 'showMovie']);
$router->addRoute('GET', '/search', [$movieController, 'search']);
$router->addRoute('GET', '/searchTest', [$movieController, 'searchTest']);
$router->addRoute('POST', '/download', [$movieController, 'download']);

// Execute the router
$router->run();
