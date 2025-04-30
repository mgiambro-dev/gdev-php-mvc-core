<?php

namespace app\core;

use app\core\Application;
use app\core\middleware\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package app/core
 */

 class Controller
 {
    public string $layout = 'main';
    public string $action = '';
 
    /***
     * @var \app\core\middleware\BaseMiddleware[]
     */
    protected array $middleware = [];
    
    public function render($view, array $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function setLayout(string $layout)
    {
        $this->layout = $layout;
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middleware[] = $middleware;
    }

    public function getMiddleware(): array
    {
        return $this->middleware;
    }
 }