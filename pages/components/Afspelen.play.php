<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : afspelen.play.php
// Omschrijving      : Pagina om een video af te spelen
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION["userid"])) {
    echo "<script>window.location.href = 'login.php?error=wrongWay';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - Video Afspelen</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/NETFISH-logo-klein.png">
    <link rel="stylesheet" href="../assets/CSS/style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <a href="../index.php">
            <img src="../assets/images/NETFISH-logo.png" alt="NETFISH Logo">
        </a>
        <nav>
            <a href="videos.php">Video’s</a>
            <a href="beheer.php">Beheer</a>
            <a href="components/logout.inc.php">Uitloggen</a>
        </nav>
    </header>

    
</body>
</html>
