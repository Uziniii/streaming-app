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
        session_start();
        $rep = explode("@", $this->callable);
        
        if (!isset($_SESSION['selectedProfileId']) && $rep[0] != "ProfilesController") {
            header('Location: /profiles');
            exit;
        }

        $controller = "Streaming\\Controllers\\" . $rep[0];
        $controller = new $controller();

        return call_user_func_array([$controller, $rep[1]], $this->matches);
    }
}
