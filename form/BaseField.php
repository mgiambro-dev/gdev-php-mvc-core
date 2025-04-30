<?php

namespace app\core\form;

use app\models\Model;

/**
 * Class BaseField
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package app\core\form
 */

 abstract class BaseField
 {
    abstract public function renderInput(): string;

    public Model $model;
    public string $attribute;
   
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
   

    public function __toString()
    {
        return sprintf('
            <div class="mb-3">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ', 
         $this->model->getLabel($this->attribute),
         $this->renderInput(),
         $this->model->getFirstError($this->attribute)
        );
    }

 }