<?php 

class TicketController extends Controller {

  function __construct(){
    if (!Auth::validate()) {
        Flasher::new('Para ingresar a la plataforma, se requiere iniciar sesi&oacute;n.');
        Redirect::to('Auth');
    }
  }

    public function Index($slugProject){

        $projectModel = new ProjectModel;
        $ticketModel = new TicketModel;
        $progressTicketModel = new ProgressTicketModel;

        $projectModel -> slug = $slugProject;

        $project = $projectModel -> OneBySlug();
        

        $ticketModel -> projectId = $project["projectid"];

        $tickets = $ticketModel -> All();
        
        $data = [
            "title" => "Mis Tickets",
            "js" => "Tickets.js",
            "tickets" => $tickets,
            "project_id" => $project["projectid"]
        ];

        View::render("Index", $data);
    }

    public function Create(){

        $data = [
            "title" => "Crear Tickets",
            "project_id" => $_POST["project_id"],
            "js" => "CreateTickets.js"        
        ];
        View::render("Create", $data);

    }

    public function Show(){
        
        try {
            
            $ticketModel = new TicketModel();
            $ticketModel->projectId = $_POST['project_id'];
            $ticketModel->slug = $_POST['slug'];
            $ticketModel->name = $_POST['name'];
            $ticketModel->description = $_POST["description"];
            $ticketModel->created_at = now();
            $ticketModel->updated_at = now();

            if(!$id = $ticketModel->Add()) json_output(json_build(400, null, 'Hubo error al guardar el registro'));
            
            $ticketModel->ticketId = $id;
            json_output(json_build(201, $ticketModel->One(), 'Proyecto agregado con éxito'));
            
        } catch (Exception $e) {
            json_output(json_build(400, null, $e->getMessage()));
        }
    }

    public function View($slugTicket){
        
        
        $ticketModel = new TicketModel;
        $progressTicket = new ProgressTicketModel;

        $ticketModel -> slug = $slugTicket;

        $ticket = $ticketModel -> OneBySlug();
        
        $progressTicket -> ticketId = $ticket["ticketid"];

        $progressTickets = $progressTicket -> one();

        ActualizarEstados($slugTicket, "slug");
        
        $data = [
            "title" => "Ticket ",
            "js" => "TicketWatch.js",
            "ticket" => $ticket,
            "progressTickets" => $progressTickets
        ];

        View::render("Watch", $data);
        
    }

    

    public function Destroy(){

        $ticketModel = new TicketModel;
        $progressTicket = new ProgressTicketModel;
        
        $ticketModel -> ticketId = $_POST["idTicket"];

        $progressTicket -> ticketid = $_POST["idTicket"];

        if($progressTicket -> Count() >= 1){
            Flasher::new('Este ticket ya tiene tareas asignadas, no se puede eliminar', "danger");
            Redirect::back();
            die;
        }

        $ticketModel -> Delete();
        Redirect::back();

    }
}