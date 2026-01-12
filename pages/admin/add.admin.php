<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : login.php
// Omschrijving      : Dit is de inlogpagina
// Naam ontwikkelaar : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
if (isset($_GET["error"])) {
    if ($_GET["error"] == "success ") {
        echo "<div class='popup-message'>
                        <p>Video succesvol toegevoegd!</p>
                    </div>";
    } elseif ($_GET["error"] == "fileuploaderror") {
        echo "<div class='popup-message-error'>
                        <p>Fout bij het uploaden van de cover afbeelding. Probeer het opnieuw.</p>
                    </div>";
    }
}
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
            <a href="../videos.php">Video’s</a>
            <!-- admins gaan naar beheer.admin.php en anders naar beheer.php -->
            <a href="<?php echo ($_SESSION['role'] ?? '') === 'admin' ? 'beheer.admin.php' : 'beheer.php'; ?>">Beheer</a>
            <a href="components/logout.inc.php">Log Uit</a>
        </nav>
    </header>
    <!-- body -->
            <div class="register-container">
        <div class="form-container">

            <h2>Voeg Nieuwe Video Toe</h2>

            <form action="../components/video.upload.inc.php" method="POST">

                    <!-- Gebruikersnaam -->
                    <div class="input-group">
                        <label>Titel:</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Voer de titel in"
                            minlength="1"
                            required
                        />
                    </div>

                <!-- Video-url -->
                    <div class="input-group">
                        <label>Video-url:</label>
                        <input
                            type="url"
                            name="video_url"
                            placeholder="https://example.com/video"
                            required
                        />
                    </div>

                <!-- Cover afbeelding -->
                <div class="input-group">
                    <label>Cover afbeelding:</label>
                    <input
                        type="file"
                        name="cover_image"
                        accept=".png, .jpg"
                        required
                    />
                </div>

                <!-- Jaar -->
                <div class="input-group">
                    <label>Jaar:</label>
                    <input
                        type="number"
                        name="year"
                        placeholder="Voer het jaar in"
                        required
                    />
                </div>

                <!-- Beschrijving -->
                <div class="input-group">
                    <label>Beschrijving:</label>
                    <input
                        type="text"
                        name="description"
                        placeholder="Voer de beschrijving in"
                        required
                    />
                </div>

                <!-- Terug naar login -->
                <a class="back-link" href="beheer.admin.php">&larr; Terug naar beheer</a>

                <!-- Knoppen -->
                <div class="button-row">
                    <button type="submit" name="video-upload" class="register-btn">
                        Voeg video toe
                    </button>
                </div>

            </form>

        </div>
    </div>

    
</body>
</html>
