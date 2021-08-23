<?php


class ProjectController extends Controller{

    function __construct()
    {
        if (!Auth::validate()) {
            Flasher::new('Para ingresar a la plataforma, se requiere iniciar sesi&oacute;n.');
            Redirect::to('Auth');
        }
    }

    public function Index(){

        $projectModel = new ProjectModel;

        $projects = $projectModel -> All();

        $data = [
            "title" => "Mis Proyectos",
            "js" => "Projects.js",
            "projects" => $projects
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

    public function Show(){
        
        try {
            $projectModel = new ProjectModel();
            $projectModel->userId = $_POST['user_connect'];
            $projectModel->slug = $_POST['slug'];
            $projectModel->name = $_POST['name'];
            $projectModel->description = $_POST["description"];
            $projectModel->created_at = now();
            $projectModel->updated_at = now();

            if(!$id = $projectModel->Add()) json_output(json_build(400, null, 'Hubo error al guardar el registro'));
            
            $projectModel->id = $id;
            json_output(json_build(201, $projectModel->One(), 'Proyecto agregado con éxito'));
            
        } catch (Exception $e) {
            json_output(json_build(400, null, $e->getMessage()));
        }
    }

}