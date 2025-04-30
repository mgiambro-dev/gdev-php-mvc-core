<?php

namespace gdev\phpmvc\form;

use app\models\Model;

/**
 * Class Form
 * 
 * @author Mauizio Giambrone <email@email.com> 
 * @package gdev\phpmvc\form
 * 
 */

 class Form
 {
    public static function begin(string $action, string $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, string $attribute) 
    {
        return new InputField($model, $attribute);
    }
 }