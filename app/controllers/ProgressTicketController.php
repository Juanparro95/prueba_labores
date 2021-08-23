<?php 

class ProgressticketController extends Controller {

  function __construct(){
    if (!Auth::validate()) {
        Flasher::new('Para ingresar a la plataforma, se requiere iniciar sesi&oacute;n.');
        Redirect::to('Auth');
    }
  }

    public function Index($slugProject){

    }

    public function Show(){
        
        if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['name','csrf'], $_POST)) {
            Flasher::new('Por favor ingrese el nombre de la tarea.', 'danger');
            Redirect::back();
        }
        
        try {
            
            $ticketModel = new ProgressTicketModel();
            $ticketModel->ticketid = clean($_POST['ticket_id']);
            $ticketModel->name = clean($_POST['name']);
            $ticketModel->created_at = now();
            $ticketModel->updated_at = now();

            if(!$id = $ticketModel->Add()) Flasher::new('Hubo un error al agregar la tarea.', 'warning');
            
            $ticketModel->ticketId = $id;
            Redirect::back();
            
        } catch (Exception $e) {
            Flasher::new('Hubo un error con el sistema, intente de nuevo por favor.', 'danger');
        }
    }

    public function View($slugTicket){
        
        $ticketModel = new TicketModel;

        $ticketModel -> slug = $slugTicket;

        $ticket = $ticketModel -> OneBySlug();

        $data = [
            "title" => "Ticket ",
            "js" => "TicketWatch.js",
            "ticket" => $ticket,
        ];

        View::render("Watch", $data);
        
    }

    public function Update(){

        try{
                       
            $progressTicket = new ProgressTicketModel;	

            $progressTicket -> ticketid = (int)$_POST["idTicket"];
            $progressTicket -> status = $_POST['checked'];
            $progressTicket -> updated_at = now();

            ActualizarEstados($_POST["idTicket"], "id");

            if(!$progressTicket -> Update()) json_build(500);
            
            echo json_build(201, null, "Tarea actualizada con &eacute;xito.");
        }
        catch(Exception $ex){
            echo json_build(500, null, "Hubo un error con el sistema, intentelo de nuevo.");
        }
    }
    



    public function Destroy(){

    }
}