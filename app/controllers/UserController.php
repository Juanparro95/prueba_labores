<?php

class UserController extends Controller{

    function __construct(){

    }

    public function Index(){
        
    }

    public function Store(){
        
		$userModel = new UserModel;		
		$userModel -> slug = str_replace(' ', '_', $_POST['name']."_".$_POST['lastname']);
		$userModel -> name = $_POST['name'];
		$userModel -> lastname = $_POST['lastname'];
		$userModel -> email = $_POST['email'];
		$userModel -> password =  password_hash(AUTH_SALT.$_POST['password'], PASSWORD_DEFAULT);
		$userModel -> photo = "https://ui-avatars.com/api/?background=0787ea&color=ff6f01&name=".$_POST['name']." ".$_POST['lastname'];
		$userModel -> businessId = $_POST["idCompany"];
		$userModel -> created_at = now();
		$userModel -> updated_at = now();

		$idUser = $userModel -> Add();

		if(!$idUser){
			json_build(500);
		}

		echo json_build(200, null, 'Bienvenido '.$_POST['name'].".");
	}

}