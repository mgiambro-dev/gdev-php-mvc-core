<?php

namespace gdev\phpmvc\form;

/**
 * Class TextareaField
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package gdev\phpmvc\form
 */

 class TextareaField extends BaseField
 {

    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute},
        );
    }
 }