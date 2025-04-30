<?php

namespace gdev\phpmvc\exceptions;

use Exception;

/**
 * Class NotFoundException
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package gdev\phpmvc\exceptions
 */

 class NotFoundException extends Exception
 {

    protected $message = 'Page not found';
    protected $code = 404;


 }
