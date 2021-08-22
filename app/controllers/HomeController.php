<?php

class HomeController{
    
    function __construct(){
    }

    public function Index(){

        $data = [
            "title" => "Bienvenido",
            "js" => ".js",
            "class_type" => "login-page"
        ];

        View::render("Index", $data);
    }

}