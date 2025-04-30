<?php

namespace app\core;

use app\core\exceptions\NotFoundException;

/**
 * class Router
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package core/Router
 * 
 * @param \app\core\Request $request
 * @param \app\core\Response $response
 */

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;
     
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
        return 'handling..';
    }

    public function resolve()
    {
        $path = $this->request->getPath();  
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false){
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }
        
        if (is_array($callback)) {
            /** @var \app\core\controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddleware() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}