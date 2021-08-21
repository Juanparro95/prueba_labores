<?php

class HomeController{
    
    function __construct(){
    }

    public function Index(){
    }

    public function Login(){
        
        $data = [
            "title" => "Iniciar Sesión",
            "js" => "Login.js",
            "class_type" => "login-page"
        ];

        $sql = "INSERT INTO public.pr0y3ct0_business (name, primarycolor, secondarycolor, logo, created_at, updated_at) VALUES(:name, :primaryColor, :secondaryColor, :logo, :created_at, :updated_at);";

        View::render("Login", $data);
    }

}