"use strict";

$(document).ready(async function () {
  await listarComentarios();
});

async function agregarNuevoComentario(evt, id) {
  evt.preventDefault();
  const idForm = $(`#${id}`);
  const description = $("#description").val();

  if (validarCampos(description)) {
    var data = new FormData(idForm.get(0));
    data.append("hook", "parro_request");
    data.append("action", "add");
    metodoAjax(idForm, `${url}/progresscomment/show`, "POST", data);
    await listarComentarios();
  }

  return;
}

async function listarComentarios() {
  let htmlOption = "";
  const wrapper = $(".list_companies");

  $("[id*=commentsAuto]").each(function (e) {
    let idDiv = this.id;
    const separarNumero = this.id.split("commentsAuto")[1];
    $(`#${idDiv}`).html("");
    $.ajax({
      url: `${url}/progresscomment/get/${separarNumero}`,
      type: "GET",
      dataType: "json",
      cache: false,
    })
      .done(function (resp) {
        if (resp.status == 200) {
          $.each(resp.data.progressComments, function (i, item) {
            $(`#${idDiv}`).append(
              imprimirComentarios(
                item["description"],
                formatDate(new Date(item["created_at"]))
              )
            );
          });
        }
      })
      .fail(function (jqXHR, textStatus) {
        console.log(jqXHR, textStatus);
        toastr.error("Hubo un error en la petición", "¡Upss!");
      })
      .always(function () {});
  });
}

function validarCampos(description) {
  if (description == "") {
    imprimirAlertas(
      "Ingrese su correo electrónico por favor",
      "warning",
      "exclamation-triangle"
    );
    return false;
  }

  limpiarAlertas();

  return true;
}

function cambiarEstado(idTicket, checked) {
  var data = new FormData();
  data.append("hook", "parro_request");
  data.append("action", "update");
  data.append("idTicket", idTicket);
  data.append("checked", checked ? "1" : "0");
  metodoAjax(null, `${url}/progressticket/update`, "POST", data);
}

function imprimirComentarios(comments, date) {
  return `<i class="fas fa-envelope bg-blue"></i>
    <div class="timeline-item mb-4">
        <span class="time"><i class="fas fa-clock"></i> ${date}</span>
        <div class="timeline-body">
            ${comments}
        </div>
    </div>`;
}
