<?php

namespace gdev\phpmvc\exceptions;

use Exception;

/**
 * Class ForbiddenException
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package gdev\phpmvc\exceptions
 */

 class ForbiddenException extends Exception
 {

    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;


 }
