<?php

use app\controller\HomeController;
use app\controller\ContactController;
use core\template\Template;
use DI\ContainerBuilder;

$routes = [
    [
        'method' => 'GET',
        'path' => '/',
        'controller' => HomeController::class,
        'action' => 'index'
    ],
    [
        'method' => 'GET',
        'path' => '/contact',
        'controller' => ContactController::class,
        'action' => 'index'
    ]
];

$di = new ContainerBuilder();
$container = $di->build();


$currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentRequest = $_SERVER['REQUEST_METHOD'];

foreach ($routes as $route) {
    [$method, $path, $controller, $action] = array_values($route);
    if ($currentRequest == $method && $currentUri == $path) {
        $controller = $container->get($controller);
        $controller->$action();
        break;
    }
}



?>

