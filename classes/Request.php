<?php

namespace Todo\Classes;

class Request {
    public function checkGet($key){
        return isset($_GET[$key]);
    }
    public function get($key){
        return $this->checkGet($key) ? $_GET[$key] : null;
    }

    public function checkPost($key){
        return isset($_POST[$key]);
    }
    public function post($key){
        return $this->checkPost($key) ? $_POST[$key] : null;
    }

    public function filter($data){
        return htmlspecialchars(strip_tags(trim($data)));
    }

    public function redirect($url){
        header("Location: $url");
        exit;
    }

    public function checkMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

}