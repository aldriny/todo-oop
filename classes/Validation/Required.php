<?php

namespace Todo\Classes\Validation;

require_once 'Validate.php';
use Todo\Classes\Validation\Validate;

class Required implements Validate{
    public function check($key, $value) {
        if (empty($value)){
            return "$key is required";
        }
        else{
            return false;
        }
    }
}