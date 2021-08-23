"use strict";

$(document).ready(function () {
  traerTodasLasEmpresas();
});

/**
 * Metodo para traer todas las empresas
 */
function traerTodasLasEmpresas() {
  let htmlOption = "";
  const wrapper = $(".list_companies");
  $.ajax({
    url: `${url}/businnes`,
    type: "GET",
    dataType: "json",
    cache: false,
  })
    .done(function (resp) {
      if (resp.status === 200) {
        htmlOption = `<option value='0'>Seleccione su empresa</option>`;
        $.each(resp.data.businnes, function (i, item) {
          console.log(item);
          htmlOption +=
            "<option value='" + item[0] + "'>" + item[1] + "</option>";
        });
        wrapper.html(htmlOption);
      } else toastr.error(res.msg, "¡Upss!");
    })
    .fail(function (jqXHR, textStatus) {
      console.log(jqXHR, textStatus);
      toastr.error("Hubo un error en la petición", "¡Upss!");
    })
    .always(function () {});
}

$("#registrar_usuario").on("submit", function (e) {
  e.preventDefault();

  if (validarCampos()) {
    var data = new FormData($("#registrar_usuario").get(0));
    data.append("hook", "parro_request");
    data.append("action", "add");

    metodoAjax($("#registrar_usuario"), `${url}/user/store`, "POST", data);
  }
});

function validarCampos() {
  if ($("#email").val() == "") {
    imprimirAlertas(
      "Ingrese su correo electrónico por favor",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }
  if ($("#name").val() == "") {
    imprimirAlertas(
      "Ingrese su nombre por favor",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }
  if ($("#lastname").val() == "") {
    imprimirAlertas(
      "Ingrese sus apellidos por favor",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }
  if ($("#password").val() == "") {
    imprimirAlertas(
      "Ingrese su contraseña por favor",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }
  if ($("#idCompany").val() == "0") {
    imprimirAlertas(
      "Ingrese su compañia por favor",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }

  limpiarAlertas();

  return true;
}
