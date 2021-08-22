<?php


class ProjectController extends Controller{

    function __construct()
    {
        
    }

    public function Index(){

        $data = [
            "title" => "Mis Proyectos",
            "js" => "Projects.js"
        ];

        View::render("Index", $data);

    }

    public function Create(){
        $data = [
            "title" => "Crear nuevo proyecto",
            "js" => "CreateProject.js"
        ];

        View::render("Create", $data);
    }

}