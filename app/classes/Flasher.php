<?php

class Flasher{

    private $valid_types = ['primary','secondary','success','danger','warning','info','light','dark'];
    private $default = 'primary';
    private $type;
    private $msg;

    /**
     * Metodo para guardar una notificación flash
     *
     * @param [String] $msg
     * @param [String] $type
     * @return void
     */
    public static function new($msg, $type = null){
        
        $self = new self();

        // Setear el tipo de notificación por defecto
        if($type === null) $self->type = $self->default;        

        $self->type = in_array($type, $self->valid_types) ? $type : $self->default;

        // Guardar la notificación en un array de sesión
        if(is_array($msg)) {
            foreach ($msg as $m) $_SESSION[$self->type][] = $m;            
            return true;
        }

        $_SESSION[$self->type][] = $msg;

        return true;
    }

    /**
     * Renderiza las notificaciones a nuestro usuario
     *
     * @return void
     */
    public static function flash(){
        $self = new self();
        $output = '';

        foreach ($self->valid_types as $type) {
            if(isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
                foreach ($_SESSION[$type] as $m) {
                    $output .= ' <div class="alert alert-'.$type.' alert-dismissible">';
                    $output .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    $output .= '<h5>Atenci&oacute;n!</h5>';
                    $output .= $m;
                    $output .= '</div>';
                }

                unset($_SESSION[$type]);
            }
        }
        
        return $output;
    }
}