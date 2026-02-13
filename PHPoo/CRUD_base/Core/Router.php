<?php 

namespace Core;

class Router 
{
    public function route()
    {
        $url = $_SERVER['REQUEST_URI'];

        $url = strtok($url, '?');

        if(strpos($url, '/PHP_orphee_18/PHPoo/CRUD_base') === 0) {
            $url = substr($url, strlen('/PHP_orphee_18/PHPoo/CRUD_base'));
        }

        $url = ltrim($url, '/');

        $segments = explode('/', $url);

        $controllerName = (isset($segments[0]) && $segments[0] != '') ? ucfirst($segments[0]) . 'Controller' : 'IndexController'; 
        $methodName = (isset($segments[1]) && $segments[1] != '') ? $segments[1] : 'index';

        $controllerClass = "\\App\\Controller\\" . $controllerName;

        $controllerPath = "App/Controller/" . $controllerName . ".php"; 

        if( ! file_exists($controllerPath)) {
            // throw new \Exception('Class introuvable');
            $controllerClass = '\\App\\Controller\\IndexController';
        }

        $controller = new $controllerClass;
        
        if( ! method_exists($controller, $methodName)) {
            // throw new \Exception('methode introuvable');
            $methodName = 'index'; // cette methode sera appelée par défaut si non précisée dans l'url ou si la methode dans l'url n'existe pas
            // Il sera donc important que tous nos controller possèdent une methode index
        }
        
        $params = array_slice($segments, 2);

        call_user_func_array([$controller, $methodName], $params);
    }
}