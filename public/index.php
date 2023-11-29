<?php
namespace App\Route;


class Route{

    private static $route ;

    public static function get(string $uri, $controller, string $method,$model){

        $routeGet = [
            'uri'=> $uri,
            'controller'=>$controller,
            'method'=>$method,
            'model'=>$model
        ];

        self::$route['GET'][$uri] = $routeGet;
        
    }

    public static function post($uri,$controller,$method,$model){

        $routePost = [
            'uri'=> $uri,
            'controller'=>$controller,
            'method'=>$method,
            'model'=>$model
        ];

        self::$route['POST'][$uri] = $routePost;
    }

    public static function redirect(string $RequestUri, string $RequestMethod){
        if(array_key_exists($RequestMethod,Self::$route) && array_key_exists($RequestUri,Self::$route[$RequestMethod])){
            $controllerClass = self::$route[$RequestMethod][$RequestUri]['controller'];
            $controllerMethod = self::$route[$RequestMethod][$RequestUri]['method'];
            $modelClass = self::$route[$RequestMethod][$RequestUri]['model'];

            $classModel = new $modelClass();
            $classController = new $controllerClass($classModel);
            $classController->$controllerMethod();

            


        } else{
            echo '404 Page not found' ;
        }
    }


}