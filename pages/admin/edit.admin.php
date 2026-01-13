<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : edit.admin.php
// Omschrijving      : Adminpagina voor het bewerken van video's
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
session_start();

// Controleer of de gebruiker is ingelogd en admin is
if (!isset($_SESSION["userid"]) || ($_SESSION["role"] ?? '') !== "admin") {
    echo "<script>window.location.href = '../videos.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - Admin Video Bewerken</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/NETFISH-logo-klein.png">
    <link rel="stylesheet" href="../../assets/CSS/style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <a href="beheer.admin.php">
            <img src="../../assets/images/NETFISH-logo.png" alt="NETFISH Logo">
        </a>
        <nav>
            <a href="../videos.php">Video’s</a>
            <a href="beheer.admin.php">Beheer</a>
            <a href="../components/logout.inc.php">Uitloggen</a>
        </nav>
    </header>


    </div>
    
</body>
</html>
