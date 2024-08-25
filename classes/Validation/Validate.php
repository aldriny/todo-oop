<?php

namespace Todo\Classes\Validation;


interface Validate{
    public function check($key, $value);
}