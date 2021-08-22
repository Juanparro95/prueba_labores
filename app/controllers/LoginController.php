<?php

class LoginController{

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
          $user = 
          [
            'id'       => 123,
            'name'     => 'Bee Default', 
            'email'    => 'juan.parroquiano95@gmail.com', 
            'avatar'   => 'myavatar.jpg', 
            'tel'      => '11223344', 
            'color'    => '#112233',
            'user'     => 'bee',
            'password' => '$2y$10$LQnRpSC110mMtz5TxrHNp.c9tUEBPTiljl1n40NUCxjGAOR14WAsa'
          ];
      
      
          if ($email !== $user['email'] || !password_verify($password.AUTH_SALT, $user['password'])) {
            Flasher::new('Las credenciales no son correctas.', 'danger');
            Redirect::back();
          }
      
          // Loggear al usuario
          Auth::login($user['id'], $user);
          Redirect::to('Home');
    }

}