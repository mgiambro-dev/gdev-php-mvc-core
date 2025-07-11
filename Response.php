<?php

namespace gdev\phpmvc;

/**
 * Class Response
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package app/core
 */

 class Response
 {

    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: '.$url);
    }
 }