<?php

class AuthController{

    function __construct()
    {
        
    }

    public function Index(){

        $data = [
            "title" => "Iniciar Sesión",
            "js" => "Login.js",
            "class_type" => "login-page"
        ];
        
        View::render("Index", $data);
    }

    public function Register(){
      $data = [
          "title" => "Registro a la Plataforma",
          "js" => "Register.js",
          "class_type" => "register-page"
      ];
      
      View::render("Register", $data);
    }

    public function Show(){
        if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['email','csrf','password'], $_POST)) {
            Flasher::new('Acceso no autorizado.', 'danger');
            Redirect::back();
          }
      
          // Data pasada del formulario
          $email  = clean($_POST['email']);
          $password = clean($_POST['password']);
      
          // Información del usuario loggeado, simplemente se puede reemplazar aquí con un query a la base de datos
          // para cargar la información del usuario si es existente
          $userModel =  new UserModel;
          $userModel -> email = $email;
          $user = $userModel -> ValidateUser();
      
          if ($email !== $user['Email'] || !password_verify(AUTH_SALT.$password, $user['Password'])) {
            Flasher::new('Las credenciales no son correctas.', 'danger');
            Redirect::back();
          }
      
          // Loggear al usuario
          Auth::login($user['UserId'], $user);
          Redirect::to('Home');
    }

}