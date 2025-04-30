<?php

namespace gdev\phpmvc\middleware;

/**
 * Class BaseMiddleware
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package gdev\phpmvc\middlewares
 */

 abstract class BaseMiddleware
 {
    abstract public function execute();
 }