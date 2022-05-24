<?php
include("includes/header.php");

//Kontroll om användaren är inloggad
if (isset($_SESSION["admin"])) {
    header("Location: admin.php");
}

//Om formuläret fylls i och postas
if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    //kontrollera att användarnamn och lösenord är ifyllda
    if (empty($username) || empty($password)) {
        $errormsg = "<p class='error'><strong>Fyll i användarnamn och lösenord!</strong></p>";
    } else {
        //Om användarnamn och lösenord är ifyllda, kontrollera att användaren finns i databasen via webbtjänsten = cURL anrop

        //POST med cURL
        $url = 'http://localhost/login_curl/api/login.php'; //instansiera ny cURL session
        $curl = curl_init();
        //array
        $user = array("username" => $username, "password" => $password);
        //omvandlar till json
        $json_string = json_encode($user);
        //inställningar för cURL
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //Response och statuskod
        $data = json_decode(curl_exec($curl), true);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        
        //Om användaren finns i databasen
        if($httpcode === 200) {
            $_SESSION['admin'] = $username;

            header("Location: admin.php");
        } else {
            $errormsg = "<p class='error'><strong>Felaktigt användarnamn eller lösenord!</strong></p>";
        }
    }
}

?>
<div class="container">
    <?php
    if (isset($errormsg)) {
        echo $errormsg;
    }
    ?>
    <form action="index.php" method="post">
        <label for="username">Användarnamn:</label>
        <br>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Lösenord:</label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <input class="btn" type="submit" value="Logga in">
    </form>



    <?php
    include("includes/footer.php");
    ?>