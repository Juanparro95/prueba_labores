<?php

class ProgresscommentController extends Controller{

    function __construct()
    {
        
    }

    public function Show(){

        try{
                       
            $progressCommentModel = new ProgressCommentModel;		
            $progressCommentModel -> progressTicketId = (int)$_POST["progress_id"];
            $progressCommentModel -> description = $_POST['comments'];
            $progressCommentModel -> created_at = now();
            $progressCommentModel -> updated_at = now();

            if(!$progressCommentModel -> Add()) json_build(500);
            
            echo json_build(201, null, "Comentario agregado con &eacute;xito.");
        }
        catch(Exception $ex){
            echo json_build(500, null, "Hubo un error con el sistema, intentelo de nuevo.");
        }

    }

    public function Get($idTicket){

        try{
                       
            $progressCommentModel = new ProgressCommentModel;
            		
            $progressCommentModel -> progressTicketId = $idTicket;

            if(!$progressComments = $progressCommentModel -> One()) json_output(json_build(500, null, "Se produjo un error al consultar"));
            
            json_output(json_build(200, ["progressComments" => $progressComments]));
        }
        catch(Exception $ex){
            echo json_build(500, null, "Hubo un error con el sistema, intentelo de nuevo.");
        }

    }

}