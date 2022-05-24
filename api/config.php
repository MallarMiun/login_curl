<?php
//autoinkludering av klasser
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

$devmode = true;

if ($devmode) {
    // Aktivera felrapportering
    error_reporting(-1);
    ini_set("display_errors", 1);

    define("DBHOST", "localhost");
    define("DBUSER", "catapi");
    define("DBPASS", "password");
    define("DBDATABASE", "catapi");
} else {

    define("DBHOST", "localhost");
    define("DBUSER", "catapi");
    define("DBPASS", "password");
    define("DBDATABASE", "catapi");
}

/*Headers med inställningar för REST webbtjänsten*/
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
