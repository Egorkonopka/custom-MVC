<?php
// FRONT CONTROLLER


// общие настройки
    ini_set('display_errors', true);
    error_reporting(E_ALL);


// подключение файлов системы
    define('ROOT',dirname(__FILE__));

    require_once(ROOT.'/components/Router.php');


// устновка соединеия с БД



// вызов Router
    $router = new Router();
    $router->run();
