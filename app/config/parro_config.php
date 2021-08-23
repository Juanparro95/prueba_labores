<?php 

/**
 * CONFIGURACIONES DEL FRAMEWORK BY PARRO NETWORK
 * - Constantes de conexión
 * - Constantes de Servidor
 */

# Constante que define si nos encontramos trabajando en modo remoto o local
define('ES_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

# Constante que define el uso horario
// date_default_timezone_get("America/Bogota");

# Se activa si se está trabajando con PREPROS
define('PREPROS', false);

# Lenguaje por defecto
define("LANG", "es");

# Ruta base del proyecto
define("BASEPATH", ES_LOCAL ? '/prueba_labores/' : '_PRODUCCION_');

# Sal del sistema
define("AUTH_SALT", "ParroSecurity95120408403");

# Puerto y URL
// Puerto y la URL del sitio
define('PORT'       , ''); // Puerto por defecto de Prepros <2020
define('PROTOCOL'   , isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http"); // Detectar si está en HTTPS o HTTP
define('HOST'       , $_SERVER['HTTP_HOST'] === 'localhost' ? (PREPROS ? 'localhost:'.PORT : 'localhost') : $_SERVER['HTTP_HOST']); // Dominio o host localhost.com tudominio.com
define('REQUEST_URI', $_SERVER["REQUEST_URI"]); // Parametros y ruta requerida
define('URL'        , PROTOCOL.'://'.HOST.BASEPATH); // URL del sitio
define('CUR_PAGE'   , PROTOCOL.'://'.HOST.REQUEST_URI); // URL actual incluyendo parametros get


# Directorios y Archivos
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", getcwd().DS);

define("APP", ROOT.'app'.DS);
define("CONTROLLERS", APP."controllers".DS);
define("FUNCTIONS", APP."functions".DS);
define("CONFIG", APP."config".DS);
define("MODELS", APP."models".DS);
define("CLASSES", APP."classes".DS);

# Templates
define("TEMPLATES", ROOT."templates".DS);
define("INCLUDES", TEMPLATES."includes".DS);
define("MODULES", TEMPLATES."modules".DS);
define("VIEWS", TEMPLATES."views".DS);

# Assets
define("ASSETS", URL."assets/");
define("PLUGINS", ASSETS."plugins/");
define("IMAGES", ASSETS."imagenes/");
define("DIST", ASSETS."dist/");
define("CSS", ASSETS."css/");
define("JS", ASSETS."js/");

# Credenciales a la Base de datos
define("DB_ENGINE", "pgsql");
define('DB_SERVER', 'localhost');
define('DB_NAME', 'p40y3ct0_w0rkv4nc3');
define('DB_USER', 'postgres');
define('DB_PASS', 'Parro9512$$');
define('DB_CHARSET', 'utf8');

define("DB_ENGINE_PROD", 'pgsql');
define('DB_SERVER_PROD', '__PRODUCCION__');
define('DB_NAME_PROD', '__PRODUCCION__');
define('DB_USER_PROD', '__PRODUCCION__');
define('DB_PASS_PROD', '__PRODUCCION__');
define('DB_CHARSET_PROD', 'utf8'); // => Ideal para acentos en español UTF8

# Controlador por defecto
define("DEFAULT_CONTROLLER", "Home");
define("DEFAULT_ERROR", "Error");
define("DEFAULT_METHOD", "Index");

// Seguridad Tablas BD

define("SECURITY_DATATABLES", "pr0y3ct0_");

// Tablas de la base de datos

define('DB_TABLE_USERS', SECURITY_DATATABLES.'users');
define('DB_TABLE_BUSINESS', SECURITY_DATATABLES.'business');
define('DB_TABLE_PROJECTS', SECURITY_DATATABLES.'projects');
define('DB_TABLE_TICKETS', SECURITY_DATATABLES.'tickets');
define('DB_TABLE_PROGRESS_TICKETS', SECURITY_DATATABLES.'progress_tickets');
define('DB_TABLE_PROGRESS_COMMENTS_TICKETS', SECURITY_DATATABLES.'progress_comments_tickets');