<?php 

/**
 * CONFIGURACIONES DEL FRAMEWORK BY PARRO NETWORK
 * - Constantes de conexión
 * - Constantes de Servidor
 */

# Constante que define si nos encontramos trabajando en modo remoto o local
define('ES_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

# Constante que define el uso horario
date_default_timezone_get("America/Bogota");

# Lenguaje por defecto
define("LANG", "es");

# Ruta base del proyecto
define("BASEPATH", ES_LOCAL ? '/prueba_labores/' : '_PRODUCCION_');

# Sal del sistema
define("AUTH_SALT", "ParroSecurity95120408403");

# Puerto y URL
define("PORT", "80");
define("URL", ES_LOCAL ? 'http://localhost:'.PORT."/prueba_labores/" : "_PRODUCCION_");

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
define("IMAGES", ASSETS."images/");
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