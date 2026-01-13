<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : beheer.admin.php
// Omschrijving      : Adminpagina voor beheer van video's
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
session_start();

// Check of de gebruiker is ingelogd en admin is
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
    <title>NETFISH - Admin Beheer</title>
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

    <!-- Body: Admin acties -->
    <div class="admin-container">
        <h1>Welkom bij de Admin Pagina</h1>

        <div class="button-container">
            <a href="add.admin.php">
                <button class="admin-btn add-btn">Voeg Video Toe</button>
            </a>
            <a href="edit.admin.php">
                <button class="admin-btn edit-btn">Bewerk Video</button>
            </a>
        </div>
    </div>
    
</body>
</html>
