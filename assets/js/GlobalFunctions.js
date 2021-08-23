"use strict";

const alertaMensajes = $(".AlertasMensajes");

function imprimirAlertas(mensaje, tipoAlerta, icono) {
  const imprimirMensaje = `<div class="alert alert-${tipoAlerta} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-${icono}"></i> Atenci&oacute;n!</h5>
                                ${mensaje}
                            </div>`;

  alertaMensajes.html(imprimirMensaje);
  return;
}

function limpiarAlertas() {
  return alertaMensajes.html("");
}

function metodoAjax(form, url, type, data) {
  $.ajax({
    url: url,
    type: type,
    dataType: "JSON",
    contentType: false,
    processData: false,
    cache: false,
    data: data,
    beforeSend: function () {
      if (form != null) form.waitMe();
    },
  })
    .done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, "¡Bien!");
        if (form != null) form.trigger("reset");
      } else {
        toastr.error(res.msg, "¡Upss!");
      }
    })
    .fail(function (jqXHR, textStatus) {
      toastr.error("Hubo un error en la petición", "¡Upss!");
    })
    .always(function () {
      if (form != null) form.waitMe("hide");
    });
}

function formatDate(date) {
  let day = date.getDate();
  if (day < 10) {
    day = "0" + day;
  }
  let month = date.getMonth() + 1;
  if (month < 10) {
    month = "0" + month;
  }
  let year = date.getFullYear();

  let hours = date.getHours();
  let minutes = date.getMinutes();

  return day + "/" + month + "/" + year + " " + hours + ":" + minutes;
}
