<?php

class Router
{
    private $routes;

    public function __construct(){
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }


    /**
     * returns request string
     * @return false|string
     */
    private function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'],'/');
        }else
            return false;
    }

    public function run() {
        $uri = $this->getUri();
        echo $uri;
    }

}