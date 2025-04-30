<?php

namespace app\core\middleware;

/**
 * Class BaseMiddleware
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package app\core\middlewares
 */

 abstract class BaseMiddleware
 {
    abstract public function execute();
 }