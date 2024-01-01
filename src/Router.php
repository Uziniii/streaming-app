<?php

namespace Streaming;

use Streaming\Route;

/** Class Router **/
class Router
{
    private $method;
    private $url;
    private $routes = [];

    public function __construct($method, $url)
    {
        $this->method = $method;
        $this->url = $url;
    }

    public function addRoute($method, $path, $callback)
    {
        $this->routes[$method][] = new Route($path, $callback);
    }

    public function get($path, $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->addRoute('POST', $path, $callback);
    }

    public function run()
    {
        if (!isset($this->routes[$this->method])) {
            throw new \Exception('REQUEST_METHOD does not exist');
        }

        foreach ($this->routes[$this->method] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }

        // No matching route found
        require VIEWS . '404.php';
    }
}
