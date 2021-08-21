<?php

class ErrorController{
    
    function __construct(){
    }

    public function Index(){

        $data = [
            "title" => "Error 404",
            "js" => "Login.js"
        ];

        View::render("404", $data);
    }
}