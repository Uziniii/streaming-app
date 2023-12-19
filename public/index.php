<?php

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

$router = new Streaming\Router($_SERVER['REQUEST_URI']);

// GET ROUTES
$router->get('/', 'MovieController@index');
$router->get('/search', 'MovieController@search');
$router->get('/searchTest', 'MovieController@searchTest');
$router->get('/profiles/add', 'ProfilesController@addPage');


// POST ROUTES
$router->post('/download', 'MovieController@download');

$router->run();
