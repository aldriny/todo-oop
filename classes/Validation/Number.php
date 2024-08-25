<?php

namespace Todo\Classes\Validation;

require_once 'Validate.php';
use Todo\Classes\Validation\Validate;

class Number implements Validate{
    public function check($key, $value) {
        if (!is_numeric($value)){
            return "$key must be number";
        }
        else{
            return false;
        }
    }
}