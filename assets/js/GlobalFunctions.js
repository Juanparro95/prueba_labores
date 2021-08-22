"use strict";

function ImprimirAlertas(mensaje, tipoAlerta, icono){
    const imprimirMensaje = `<div class="alert alert-${tipoAlerta} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-${icono}"></i> Atenci&oacute;n!</h5>
                                ${mensaje}
                            </div>`;    
                            
    $(".AlertasMensajes").html(imprimirMensaje);
    return;
}