<?php
/* 
Code by Malin Larsson, Mittuniversitetet
Email: malin.larsson@miun.se
*/
?>
<?php
include("includes/header.php");

if (!isset($_SESSION["admin"])) {
    header("Location: index.php");
}
?>
<div class="container">

    <?php
    $url = 'http://localhost/login_curl/api/cats.php';
    //instansiera ny cURL session
    $curl = curl_init();
    //inställningar för cURL
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //Response och statuskod
    $data = json_decode(curl_exec($curl), true);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    //Loppa igenom katter och skriv ut
    if ($httpcode === 200) {
        foreach ($data as $cat) {
            echo "<h2>" . $cat["name"] . "</h2>";
            echo "<p>" . $cat["breed"] . "</p>";
        }
    }

    ?>

    <?php
    //Om användaren klickat på logga ut 
    if (isset($_GET["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
    ?>
    <a class="btn" href="admin.php?logout">Logga ut</a>

    <?php
    include("includes/footer.php");
    ?>