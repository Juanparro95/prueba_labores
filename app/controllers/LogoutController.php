<?php 

class LogoutController extends Controller {

  function __construct(){
  }

  function Index(){
    if (!Auth::validate()) {
      Flasher::new('No hay una sesión iniciada, no podemos cerrarla.', 'danger');
      Redirect::to('login');
    }

    Auth::logout();
    Redirect::to('login');
  }
}