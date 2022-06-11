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

    /**
     * @param $controllerName
     * @return false|mixed
     * подключает файл контроллера
     */
    protected function includeController($controllerName){
        $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
        if(file_exists($controllerFile)){
            return include_once($controllerFile);
        } else {
            return  false;
        }
    }

    public function run() {
        // Получить строку запроса
        $uri = $this->getUri();

        //проверить наличие такого запроса в Routes.php
        foreach ($this->routes as $uriPattern => $path){

            //Сравниваем $uriPattern и $uri
           if(preg_match("~$uriPattern~", $uri)){

               //определить какой контроллер и экшен обрабатывает запрос
               $segments = explode('/',$path);

               $controllerName = ucfirst(array_shift($segments). 'Controller');
               $actionName = 'action'. ucfirst(array_shift($segments));

               //подключить нужный контроллер
               $this->includeController($controllerName);

               $controllerObject = new $controllerName;
               $result = $controllerObject->$actionName();

                if($result){
                    break;
                }

           }
        }
    }

}