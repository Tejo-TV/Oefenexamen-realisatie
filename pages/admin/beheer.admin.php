<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : login.php
// Omschrijving      : Dit is de inlogpagina
// Naam ontwikkelaar : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
session_start();

if (isset($_SESSION["userid"])) {
} elseif ($_SESSION["role"] != "admin") {
    
} else {
    echo "<script>window.location.href = '../videos.php';</script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - ADMIN</title>
    <link rel="shortcut icon" type="x-icon" href="../../assets/images/NETFISH-logo-klein.png">
    <link rel="stylesheet" href="../../assets/CSS/style.css">
</head>

<body>

    <!-- Header -->
    <header>
        <a href="beheer.admin.php">
            <img src="../../assets/images/NETFISH-logo.png" alt="Logo">
        </a>

        <nav>
            <a href="videos.php">Video’s</a>
            <!-- admins gaan naar beheer.admin.php en anders naar beheer.php -->
            <a href="<?php echo ($_SESSION['role'] ?? '') === 'admin' ? 'beheer.admin.php' : 'beheer.php'; ?>">Beheer</a>
            <a href="components/logout.inc.php">Log Uit</a>
        </nav>
    </header>
    <!-- body -->

        <div class="admin-container">
        <h1>Welkom bij de Admin Pagina</h1>

        <div class="button-container">
            <a href="add.admin.php"><button class="admin-btn add-btn">Voeg Video Toe</button></a>
            <a href="edit.admin.php"><button class="admin-btn edit-btn">Bewerk Video</button></a>
        </div>
    </div>
    
</body>
</html>
