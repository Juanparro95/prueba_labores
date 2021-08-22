  /**
   * Eventos
   */
   $("#loginUser").on("submit", function(e){ 
    e.preventDefault(); 
    IniciarSesion()
  });

  /**
   * Metodo para iniciar sesión
   */
  function IniciarSesion(){
    
    const email = $("#email").val();
    const password = $("#password").val();
    
    if(ValidarCampos(email, password)){

      var data = new FormData($("#loginUser").get(0));
            // data.append("hook", "phook");
            // data.append("action", "add");

            data.append('action', "add");
            $.ajax({
                url: '/user/login',
                method: "POST",
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {

                },
                success: function(data) {

                },
                error: function(data) {
                    console.log("error", data);
                },
            });

    }

  }

  function ValidarCampos(email, password){

    if(email == ""){
      ImprimirAlertas("El campo email es requerido", "warning", "exclamation-triangle");
      return false;
    }

    if(password == ""){
      ImprimirAlertas("La contrase&ntilde;a es requerida", "warning", "exclamation-triangle");
      return false;
    }

    return true;
  }

