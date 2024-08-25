<?php

namespace Todo\Classes\Validation;

require_once 'Validate.php';
use Todo\Classes\Validation\Validate;

class Str implements Validate{
    public function check($key, $value) {
        if (is_numeric($value)){
            return "$key must be string";
        }
        else{
            return false;
        }
    }
}