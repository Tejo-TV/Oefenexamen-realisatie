<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : register.inc.php
// Omschrijving      : Verwerkt het registreren van nieuwe gebruikers
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//

if (isset($_POST["register"])) {

    // Zet alle POST-waarden in aparte variabelen
    $username = $_POST["username"];
    $email = $_POST["email"];
    $ww = $_POST["ww"];
    $ww_repeat = $_POST["ww-repeat"];
    $is_admin = 0; // Standaard geen admin

    // Include database connectie en functies
    require_once '../../config/DB_connect.php';
    require_once 'functions.inc.php';

    // Controleer of de wachtwoorden overeenkomen
    if ($ww !== $ww_repeat) {
        echo "<script>window.location.href = '../register.php?error=passwordsdontmatch';</script>";
        exit();
    }

    // Controleer op lege velden
    if (emptyInputRegister($username, $email, $ww)) {
        echo "<script>window.location.href = '../register.php?error=emptyinput';</script>";
        exit();
    }

    // Controleer of het e-mailadres geldig is
    if (invalidEmail($email)) {
        echo "<script>window.location.href = '../register.php?error=invalidemail';</script>";
        exit();
    }

    // Controleer of het e-mailadres al bestaat
    if (emailExists($conn, $email)) {
        echo "<script>window.location.href = '../register.php?error=emailTaken';</script>";
        exit();
    }

    // Maak de gebruiker aan
    createUser($conn, $username, $email, $ww, $is_admin);

} else {
    // Directe toegang tot deze pagina zonder POST
    echo "<script>window.location.href = '../register.php?error=wrongWay';</script>";
    exit();
}
