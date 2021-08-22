<?php

/**
 * Devuelve un objeto
 *
 * @param [type] $array
 * @return void
 */
function to_object($array){
    return json_decode(json_encode($array));
}

/**
 * Devuelve el nombre de la aplicación
 *
 * @return void
 */
function get_sitename(){
    return "Workvance";
}


/**
 * Devuelve la fecha actual
 *
 * @return void
 */
function now(){
    return date("Y-m-d H:i:s");
}

/**
 * Genera un string o password
 *
 * @param integer $tamano
 * @param string $type
 * @return void
 */
function random_password($length = 8, $type = 'default') {
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  
  if ($type === 'numeric') {
		$alphabet = '1234567890';
	}
  
  $pass = array();
	$alphaLength = strlen($alphabet) - 1;
  
  for ($i = 0; $i < $length; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
  }
  
	return str_shuffle(implode($pass)); //turn the array into a string
}

/**
 * Sanitiza un valor ingresado por usuario
 *
 * @param string $str
 * @param boolean $cleanhtml
 * @return void
 */
function clean($str, $cleanhtml = false) {
  $str = @trim(@rtrim($str));
  
	// if (get_magic_quotes_gpc()) {
	// 	$str = stripslashes($str);
	// }

	if ($cleanhtml === true) {
		return htmlspecialchars($str);
  }
  
	return filter_var($str, FILTER_SANITIZE_STRING);
}

/**
 * Hace output en el body como json
 *
 * @param array $json
 * @param boolean $die
 * @return void
 */
function json_output($json, $die = true) {
    
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json;charset=utf-8');
  
    if(is_array($json)) $json = json_encode($json);
    
    echo $json;

    if($die) die;
        
    return true;
}

/**
 * Valida los parametros pasados en POST
 *
 * @param array $required_params
 * @param array $posted_data
 * @return void
 */
function check_posted_data($required_params = [] , $posted_data = []) {

  if(empty($posted_data)) {
    return false;
  }

  // Keys necesarios en toda petición
  $defaults = ['hook','action'];
  $required_params = array_merge($required_params,$defaults);
  $required = count($required_params);
  $found = 0;

  foreach ($posted_data as $k => $v) {
    if(in_array($k , $required_params)) {
      $found++;
    }
  }

  if($found !== $required) {
    return false;
  }

  return true;
}

/**
 * Inserta campos htlm en un formulario
 *
 * @return string
 */
function insert_inputs() {
	$output = '';

	if(isset($_POST['redirect_to'])){
		$location = $_POST['redirect_to'];
	} else if(isset($_GET['redirect_to'])){
		$location = $_GET['redirect_to'];
	} else {
		$location = CUR_PAGE;
	}

	$output .= '<input type="hidden" name="redirect_to" value="'.$location.'">';
	$output .= '<input type="hidden" name="timecheck" value="'.time().'">';
	$output .= '<input type="hidden" name="csrf" value="'.CSRF_TOKEN.'">';
	$output .= '<input type="hidden" name="hook" value="jserp_hook">';
	$output .= '<input type="hidden" name="action" value="post">';
	return $output;
}

/**
 * Construye un nuevo string json
 *
 * @param integer $status
 * @param array $data
 * @param string $msg
 * @return void
 */
function json_build($status = 200 , $data = null , $msg = '', $error_code = null) {
    /*
    1 xx : Informational
    2 xx : Success
    3 xx : Redirection
    4 xx : Client Error
    5 xx : Server Error
    */
  
    if(empty($msg) || $msg == '') {
      switch ($status) {
        case 200:
          $msg = 'OK';
          break;
        case 201:
          $msg = 'Created';
          break;
        case 400:
          $msg = 'Invalid request';
          break;
        case 403:
          $msg = 'Access denied';
          break;
        case 404:
          $msg = 'Not found';
          break;
        case 500:
          $msg = 'Internal Server Error';
          break;
        case 550:
          $msg = 'Permission denied';
          break;
        default:
          break;
      }
    }
  
    $json =
    [
      'status' => $status,
      'error'  => false,
      'msg'    => $msg,
      'data'   => $data
    ];
  
    if (in_array($status, [400,403,404,405,500])){
      $json['error'] = true;
    }
  
    if ($error_code !== null) {
      $json['error'] = $error_code;
    }
  
    return json_encode($json);
  }