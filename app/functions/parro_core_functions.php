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