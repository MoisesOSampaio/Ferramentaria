<?php

namespace SOURCE\routes;

use Exception;

class Router{

    const CONTROLLER_NAMESPACE = 'SOURCE\\controller';
    public static function load($controller,$method)
    {
        try{
            $namespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;
            if(!class_exists($namespace)){
                throw new Exception("O controller {$controller} não existe");
            }

            $controllerInstance = new $namespace;

            if(!method_exists($controllerInstance,$method)){
                throw new Exception("O metodo {$method} não existe na classe {$controller}");
            }
            return $controllerInstance->$method((object)$_REQUEST);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public static function routes(){
        return [
            'get' => [
                '/' => fn() => self::load('HomeController','index'),
                '/Usuario/Login' => fn() => self::load('UsuarioController','login'),
                '/Usuario/Create' => fn() => self::load('UsuarioController','create'),
                '/Usuario/Update' => fn() => self::load('UsuarioController','update'),
                '/Usuario/Delete' => fn() => self::load('UsuarioController','delete')
            ],
            'post' => [
                '/Usuario/Create' => fn() => self::load('UsuarioController','createRecord'),
            ],
            'put' => [

            ],
            'delete' => [

            ]
            ];
    }

    public static function execute(){
        try{
            $routes = self::routes();
            $request = Request::get();
            $uri = Uri::getPath();

            if(!isset($routes[$request])){
                throw new Exception("a rota não existe");
            }

            if(!array_key_exists($uri,$routes[$request])){
                throw new Exception("a rota não existe");
            }

            $router = $routes[$request][$uri];
            if(!is_callable($router)){
                throw new Exception("A rota {$uri} não é uma closure utilize a arrow function");
            }
           
            return $router();


        }catch(Exception $e){
            $e->getMessage();
        }
    }
}
