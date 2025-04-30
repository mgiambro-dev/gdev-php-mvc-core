<?php

namespace gdev\phpmvc\middleware;

use gdev\phpmvc\Application;
use gdev\phpmvc\exceptions\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package gdev\phpmvc\middlewares
 */

 class AuthMiddleware extends BaseMiddleware
 {
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
          if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
            throw new ForbiddenException();
          }  
        }
    }
 }