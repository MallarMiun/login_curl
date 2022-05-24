<?php
//autoinkludering av klasser
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

//aktivera sessioner
session_start();

$devmode = true;

if ($devmode) {
    // Aktivera felrapportering
    error_reporting(-1);
    ini_set("display_errors", 1);

    define("DBHOST", "localhost");
    define("DBUSER", "test");
    define("DBPASS", "password");
    define("DBDATABASE", "test");
} else {

    define("DBHOST", "localhost");
    define("DBUSER", "test");
    define("DBPASS", "password");
    define("DBDATABASE", "test");
}
