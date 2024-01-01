<?php

namespace Streaming;

class Route
{
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match($url)
    {
        $url = trim(parse_url($url, PHP_URL_PATH), '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call()
    {
        if (is_callable($this->callable)) {
            return call_user_func_array($this->callable, $this->matches);
        }

        if (is_string($this->callable)) {
            $rep = explode("@", $this->callable);
            $controller = "Streaming\\Controllers\\" . $rep[0];
            $controller = new $controller();

            return call_user_func_array([$controller, $rep[1]], $this->matches);
        }

        throw new \Exception('Invalid callable provided for route.');
    }
}
