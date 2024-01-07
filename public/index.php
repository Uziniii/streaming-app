<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../vendor/autoload.php");
require_once("../src/config/config.php");

use Streaming\Router;

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'IndexController@index');
$router->get('/homepage', 'MovieController@showHomepage');
$router->get('/profiles/select/:profile_id', 'ProfilesController@selectProfile');
$router->get('/profiles', 'ProfilesController@showProfiles');
$router->get('/profiles/add', 'ProfilesController@showAddProfile');
$router->post('/profiles/add', 'ProfilesController@addProfile');
$router->get('/movies', 'MovieController@showHomepage');

$router->post('/searchmovie', 'SearchController@search');


$router->get('/movies/download', 'MovieController@download');


// Execute the router
$router->run();
