<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : login.inc.php
// Omschrijving      : Verwerkt het inloggen van gebruikers
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//

if (isset($_POST["login"])) {

    // Zet alle POST-waarden in aparte variabelen
    $username = $_POST["username"];
    $ww = $_POST["ww"];

    // Include database connectie en functies
    require_once '../../config/DB_connect.php';
    require_once 'functions.inc.php';

    // Controleer of velden leeg zijn
    if (emptyInputLogin($username, $ww)) {
        echo "<script>window.location.href = '../login.php?error=emptyinput';</script>";
        exit();
    }

    // Log de gebruiker in
    loginUser($conn, $username, $ww);

} else {
    // Ongeldig gebruik van het script (directe toegang)
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
    exit();
}
