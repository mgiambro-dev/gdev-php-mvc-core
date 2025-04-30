<?php

namespace gdev\phpmvc;

use gdev\phpmvc\db\DbModel;

/**
 * Class UserModel
 * 
 * @author Maurizio Giambrone <email@email.com>
 * @package gdev\phpmvc
 */

 abstract class UserModel extends DbModel
 {

    abstract public function getDisplayName(): string;
 }