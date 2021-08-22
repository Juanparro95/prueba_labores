<?php 

class Parro{

    /**
     * CLASE PRINCIPAL PARA EL FRAMEWORK PARRO 
     * 
     */

     private $framework = "Parro Network Framework";
     private $version = "1.0.1";
     private $uri = [];

     # Función principal que ejecuta al instanciar la clase
     function __construct(){
        $this->init();
     }

     /**
      * Metodo para ejecutar los metodos de forma subsecuente
      *
      * @return void
      */
     private function init(){
         $this->init_session();
         $this->init_load_config();
         $this->init_load_function();
         $this->init_autoload();
         $this->init_csrf();
         $this->dispatch();
    }

     /**
      * Metodo para iniciar la sesión del sistema
      *
      * @return void
      */
     private function init_session(){
        if(!session_start() == PHP_SESSION_NONE) session_start();

        return;
     }

       /**
         * Método para crear un nuevo token de la sesión del usuario
         *
         * @return void
         */
    private function init_csrf() {
        $csrf = new Csrf();
        define('CSRF_TOKEN', $csrf->get_token()); // Versión 1.0.2 para uso en aplicaciones
    }

     /**
      * Metodo para cargar la configuración del sistema
      *
      * @return void
      */
     private function init_load_config(){
        $file = "parro_config.php";
        if(!is_file("app/config/$file")) die(sprintf("El archivo %s no se encuentra, es requerido para que funcione %s", $file, $this->framework));
        require_once "app/config/".$file;
        return;
     }

     /**
      * Metodo para cargar las funciones del framework
      *
      * @return void
      */
     private function init_load_function(){

        $file = "parro_core_functions.php";
        if(!is_file(FUNCTIONS.$file)) die(sprintf("El archivo %s no se encuentra, es requerido para que funcione %s", $file, $this->framework));
        require_once(FUNCTIONS.$file);

        $file = "parro_custom_functions.php";
        if(!is_file(FUNCTIONS.$file)) die(sprintf("El archivo %s no se encuentra, es requerido para que funcione %s", $file, $this->framework));
        require_once(FUNCTIONS.$file);
        
        return;

     }

     /**
      * Metodo para cargar todos los archivos de forma automática
      *
      * @return void
      */
     private function init_autoload(){
        require_once CLASSES."Autoloader.php";
        Autoloader::init();
        //require_once CLASSES."Db.php";
        //require_once CLASSES."Model.php";
        //require_once CLASSES."View.php";
        //require_once CLASSES."Controller.php";

        // require_once CONTROLLERS.DEFAULT_CONTROLLER.'Controller.php';
        // require_once CONTROLLERS.DEFAULT_ERROR.'Controller.php';
        return;
     }

     /**
      * Metodo para filtrar y descomponer los elementos de la url
      *
      * @return void
      */
     private function filter_url(){
        if(isset($_GET['uri'])){
            $this->uri = $_GET['uri'];
            $this->uri = rtrim($this->uri, "/");
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode("/", strtolower($this->uri));
            return $this->uri;
        }
     }

     /**
      * Metodo para ejecutar y cargar de forma automática el controlador solicitado por el usuario
      * Su método y pasar parametros a el.
      *
      * @return void
      */
     private function dispatch(){
        $this->filter_url();

        # Se valida si se está pasando el nombre del controlador en la URI. $this->uri[0] es el controlador
        if(isset($this->uri[0]))
        {
            $current_controller = ucfirst($this->uri[0]);
            unset($this->uri[0]);
        }
        else
        {
            $current_controller = DEFAULT_CONTROLLER;
        }

        # Ejecución del controlador
        # Validar si existe una clase con el controlador solicitado
        $controller = $current_controller."Controller";
        if(!class_exists($controller)){
            $current_controller = DEFAULT_ERROR;
            $controller = DEFAULT_ERROR."Controller";
        }

        # Ejecución del Metodo
        if(isset($this->uri[1]))
        {   
            $this->uri[1] = ucfirst(str_replace("-", "_", $this->uri[1]));
            if(!method_exists($controller, $this->uri[1]))
            {
                $controller = DEFAULT_ERROR."Controller";
                $current_method = DEFAULT_METHOD;
            }
            else
            {
                $current_method = $this->uri[1];
            }

            unset($this->uri[1]);
        }
        else
        {
            $current_method = DEFAULT_METHOD;
        }

        # Constantes
        define("CONTROLLER", $current_controller);
        define("METHOD", $current_method);

        # Ejecutar controlador y metodos

        $controller = new $controller;

        # Obtiene los parametros
        $params = array_values(empty($this->uri) ? [] : $this->uri);
        
        # Llamada al método que solicita el usuario en curso
        if(empty($params)){
            call_user_func([$controller, $current_method]);
        }
        else{
            call_user_func_array([$controller, $current_method], $params);
        }
        return;
     }

     /**
      * Metodo para correr nuestro framework
      *
      * @return void
      */
    public static function start(){
        $parro = new self();
        return;
    }

}