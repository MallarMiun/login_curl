<?php
/* 
Code by Malin Larsson, Mittuniversitetet
Email: malin.larsson@miun.se
*/
?>
<?php
include_once("config.php");

//Läser in vilken metod som skickats och lagrar i en variabel
$method = $_SERVER['REQUEST_METHOD'];

//Om annan metod än GET skickats skickas felmeddelande
if($method != "GET") {
    http_response_code(405); //Method not allowed
    $response = array("message" => "Endast GET tillåts");
    echo json_encode($response);
    exit;
}

//Skapar data och skickar tillbaka till klienten
$response = [];
$cat1 = ["name" => "Shiro", "breed" => "Bondkatt", "id" => 1];
$cat2 = ["name" => "Tiger", "breed" => "Norsk skogskatt", "id" => 2];
$cat3 = ["name" => "Spookie", "breed" => "Norsk skogskatt", "id" => 3];

array_push($response, $cat1, $cat2, $cat3);

echo json_encode($response);