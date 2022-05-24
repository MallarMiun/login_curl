<?php

    /*Denna fil är endast för att visa hur de olika metoderna skickat med cURL, GET, POST, PUT och DELETE*/
    
    //POST  
    $url = 'http://localhost/rest_video/catapi.php'; //instansiera ny cURL session
    $curl = curl_init();
    //array
    $cat = array("name" => "Sture", "breed" => "Norsk skogskatt");
    //omvandlar till json
    $json_string = json_encode($cat);
    //inställningar för cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $data = json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    
    
    //DELETE
    $url = "http://localhost/rest_video/catapi.php?id=9";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $data = json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    //PUT

    //The URL that we want to send a PUT request to.
    $url = 'http://localhost/rest_video/catapi.php'; 

    $cat = array("name" => "Bilbo", "breed" => "Burma", "id" => 4);
    $data_json = json_encode($data);
    
    $curl = curl_init(); //instansiera ny cURL session
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($curl, CURLOPT_POSTFIELDS,$data_json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $data = json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    

    //GET
    $url = 'http://localhost/rest_video/catapi.php';
    //instansiera ny cURL session
    $curl = curl_init();
    //inställningar för cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //lagrar resultatet i en variabel och gör om resultatet från JSON
    $data = json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if($httpcode === 200) {
        //foreach
    } else {
        //felmeddelande
    }