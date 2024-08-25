<?php

namespace Todo\Classes\Validation;

require_once 'Validate.php';
use Todo\Classes\Validation\Validate;

class Max implements Validate{
    private $maxLenth;
    public function __construct($maxLenth){
        $this->maxLenth = $maxLenth;
    }
    
    public function check($key, $value) {
        if (strlen($value) > $this->maxLenth){
            return "$key must not exceed $this->maxLenth characters";
        }
    }
}