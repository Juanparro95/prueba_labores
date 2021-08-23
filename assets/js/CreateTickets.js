"use strict";

document.getElementById("name").addEventListener("keyup", slugChange);

function slugChange() {
  const name = document.getElementById("name").value;
  document.getElementById("slug").value = slug(name);
}

function slug(str) {
  var $slug = "";
  var trimmed = str.trim(str);
  $slug = trimmed
    .replace(/[^a-z0-9-]/gi, "-")
    .replace(/-+/g, "-")
    .replace(/^-|-$/g, "");
  return $slug.toLowerCase();
}

/**
 * Eventos
 */
$("#formSaveTicket").on("submit", function (e) {
  e.preventDefault();
  GuardarTicket();
});

/**
 * Metodo para guardar la información
 */
function GuardarTicket() {
  const nameProject = $("#name").val();
  const description = $("#description").val();
  const slug = $("#slug").val();

  if (ValidarCampos(nameProject, description, slug)) {
    var data = new FormData($("#formSaveTicket").get(0));
    data.append("hook", "parro_request");
    data.append("action", "add");
    metodoAjax($("#formSaveTicket"), `${url}/ticket/show`, "POST", data);
  }
}

function ValidarCampos(nameProject, description, slug) {
  if (nameProject == "") {
    imprimirAlertas(
      "El nombre del ticket es requerido",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }

  if (description == "") {
    imprimirAlertas(
      "La descripci&oacute;n del ticket es requerida",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }

  if (slug == "") {
    imprimirAlertas(
      "El slug del ticket es requerida",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }

  limpiarAlertas();

  return true;
}
