<?php

namespace app\core\exceptions;

use Exception;

/**
 * Class NotFoundException
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package app\core\exceptions
 */

 class NotFoundException extends Exception
 {

    protected $message = 'Page not found';
    protected $code = 404;


 }
