<?php 
session_start();
require_once __DIR__.'/vendor/autoload.php';

$routes = require __DIR__.'/routes/web.php';

$uri = strtok($_SERVER['REQUEST_URI'], '?');
$route = $routes[$uri] ?? null;

if ($route) {
    $controllerClass = 'App\\Controllers\\' . $route['controller'];
    $method = $route['method'];

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        if (method_exists($controller, $method)) {
            $controller->$method();
            exit;
        }
    }
}

http_response_code(404);
include_once __DIR__.'/resources/view/public/error.php';
exit();
//"Pf372hsz\\Ankanvall\\"