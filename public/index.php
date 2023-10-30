<?php
//controllers
require_once __DIR__.'/../private/Controller/controller.php';
require_once __DIR__.'/../private/Controller/userController.php';
require_once __DIR__.'/../private/Controller/loginController.php';
require_once __DIR__.'/../private/Controller/eventNoticeController.php';

//database
require_once __DIR__.'/../private/config/database/conn.php';
require_once __DIR__.'/../private/config/database/queriesSql.php';

//models
require_once __DIR__.'/../private/Model/CrudModel.php';
require_once __DIR__.'/../private/Model/userModel.php';
require_once __DIR__.'/../private/Model/queriesModel.php';
require_once __DIR__.'/../private/Model/loginModel.php';
require_once __DIR__.'/../private/Model/eventsModel.php';

$routes = require __DIR__.'/routes/routes2.php';

// Função para rotear a solicitação
function routeRequest($routes) {
    $pathInfo = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];
    $key = "$method|$pathInfo";

    if (array_key_exists($key, $routes)) {
        list($controllerClass, $action) = $routes[$key];

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                http_response_code(404);
            }
        } else {
            http_response_code(404);
        }
    } else {
        http_response_code(404);
    }
}

routeRequest($routes);
