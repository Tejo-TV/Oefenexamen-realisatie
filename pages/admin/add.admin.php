<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : add.admin.php
// Omschrijving      : Pagina voor admins om nieuwe video's toe te voegen
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

// Popup-meldingen
if (isset($_GET["error"])) {
    if ($_GET["error"] === "success") {
        echo "<div class='popup-message'>
                <p>Video succesvol toegevoegd!</p>
              </div>";
    } elseif ($_GET["error"] === "fileuploaderror") {
        echo "<div class='popup-message-error'>
                <p>Fout bij het uploaden van de coverafbeelding. Probeer het opnieuw.</p>
              </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - Admin Video Toevoegen</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/NETFISH-logo-klein.png">
    <link rel="stylesheet" href="../../assets/CSS/style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <a href="beheer.admin.php"><img src="../../assets/images/NETFISH-logo.png" alt="NETFISH Logo"></a>
        <nav>
            <a href="../videos.php">Video’s</a>
            <a href="beheer.admin.php">Beheer</a>
            <a href="../components/logout.inc.php">Uitloggen</a>
        </nav>
    </header>

    <!-- Body: Video Toevoegen Formulier -->
    <div class="register-container">
        <div class="form-container">
            <h2>Voeg Nieuwe Video Toe</h2>

            <form action="../components/video.upload.inc.php" method="POST" enctype="multipart/form-data">

                <!-- Titel -->
                <div class="input-group">
                    <label>Titel:</label>
                    <input type="text" name="title" placeholder="Voer de titel in" minlength="1" required />
                </div>

                <!-- Video-url -->
                <div class="input-group">
                    <label>Video-url:</label>
                    <input type="url" name="video_url" placeholder="https://example.com/video" required />
                </div>

                <!-- Cover afbeelding -->
                <div class="input-group">
                    <label>Coverafbeelding:</label>
                    <input type="file" name="cover_image" accept=".png, .jpg" required />
                </div>

                <!-- Jaar -->
                <div class="input-group">
                    <label>Jaar:</label>
                    <input type="number" name="year" placeholder="Voer het jaar in" required />
                </div>

                <!-- Beschrijving -->
                <div class="input-group">
                    <label>Beschrijving:</label>
                    <input type="text" name="description" placeholder="Voer de beschrijving in" required />
                </div>

                <!-- Terug naar beheer -->
                <a class="back-link" href="beheer.admin.php">&larr; Terug naar beheer</a>

                <!-- Submit knop -->
                <div class="button-row">
                    <button type="submit" name="video-upload" class="register-btn">Voeg video toe</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
