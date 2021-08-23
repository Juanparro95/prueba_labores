<?php


function ActualizarEstados($slugTicket, $type){
    $cantidadAprobados = "";
    $ticketModel = new TicketModel;
    $progressTicket = new ProgressTicketModel;

    if($type == "slug"){
        $ticketModel -> slug = $slugTicket;
        $ticket = $ticketModel -> OneBySlug();
    }
    else if($type == "id"){
        
        $ticketModel -> ticketId = $slugTicket;
        $ticket = $ticketModel -> One();
    }


    $progressTicket -> ticketId = $ticket["ticketid"];

    $progressTickets = $progressTicket -> one();

    $cantidadTareas = count($progressTickets);
    
    foreach($progressTickets as $progressTicket){
        if($progressTicket["status"] == "1"){
            $cantidadAprobados += count($progressTicket["status"]);
        }
    }
    
    if ($cantidadTareas == $cantidadAprobados){

        $ticketModel -> ticketid = $ticket["ticketid"];
        $ticketModel -> status = 2;
        $ticketModel -> updated_at = now();
        $ticketModel -> update();
    }
    else if ($cantidadTareas > $cantidadAprobados){
        $ticketModel -> ticketid = $ticket["ticketid"];
        $ticketModel -> status = 1;
        $ticketModel -> updated_at = now();
        $ticketModel -> update();
    }
}