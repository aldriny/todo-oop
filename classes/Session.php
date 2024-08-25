<?php

namespace Todo\Classes;

class Session {
    public function __construct()
    {
        session_start();
    }
    public function set($key,$value){
        $_SESSION[$key] = $value;
    }

    public function check($key){
        return isset($_SESSION[$key]);
    }

    public function get($key){
        return $this->check($key) ? $_SESSION[$key] : null;
    }

    public function remove($key){
        unset($_SESSION[$key]);
    }
    public function destroy(){
        session_destroy();
    }
}