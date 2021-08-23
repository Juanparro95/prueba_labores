<?php

class HomeController{
    
    function __construct(){
        if (!Auth::validate()) {
            Flasher::new('Para ingresar a la plataforma, se requiere iniciar sesi&oacute;n.');
            Redirect::to('Auth');
        }
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