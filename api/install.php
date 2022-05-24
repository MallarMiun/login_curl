<?php
/* Anslut till databas*/
$db = new mysqli("localhost", "catapi", "password", "catapi");
if($db->connect_errno > 0){
    die('Fel vid anslutning [' . $db->connect_error . ']');
} 

/* SQL-fråga för att skapa tabell */
$sql = "DROP TABLE IF EXISTS cats;
    CREATE TABLE cats(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    breed VARCHAR(64) NOT NULL
);";

/* SQL-fråga för att lägga in data */
$sql .= "INSERT INTO cats (name, breed) VALUES
('Shiro', 'Bondkatt'),
('Tiger', 'Norsk skogskatt'),
('Spookie', 'Norsk skogskatt');";


echo "<pre>$sql</pre>"; // Skriv ut SQL-frågan till skärm

/* Skicka SQL-frågan till DB */
if($db->multi_query($sql)) {
    echo "Tabell installerad.";
} else {
    echo "Fel vid installation av Tabell.";
}