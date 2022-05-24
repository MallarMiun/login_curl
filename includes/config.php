<?php
//aktivera sessioner
session_start();

$devmode = true;

if ($devmode) {
    // Aktivera felrapportering
    error_reporting(-1);
    ini_set("display_errors", 1);
}
