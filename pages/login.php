<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : login.php
// Omschrijving      : Pagina voor het inloggen van gebruikers
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
session_start();

// Redirect als gebruiker al is ingelogd
if (isset($_SESSION["userid"])) {
    echo "<script>window.location.href = 'pages/videos.php';</script>";
    exit();
}

// Foutmeldingen variabelen
$form_error = "form-container";
$error_txt  = "";

// Check GET-parameter voor fouten of successen
if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case "emptyinput":
            $form_error = "form-container-error";
            $error_txt  = "<p class='error-text'>Één of meerdere verplichte velden zijn leeg. Vul alle velden in om verder te gaan.</p>";
            break;
        case "wrongLogin":
            $form_error = "form-container-error";
            $error_txt  = "<p class='error-text'>De gebruikersnaam of het wachtwoord is onjuist. Controleer je gegevens en probeer het opnieuw.</p>";
            break;
        case "stmtfailed":
            $form_error = "form-container-error";
            $error_txt  = "<p class='error-text'>Er is een technische fout opgetreden. Probeer het later opnieuw of neem contact op met de beheerder.</p>";
            break;
        case "wrongWay":
            $form_error = "form-container-error";
            $error_txt  = "<p class='error-text'>Deze pagina is verkeerd geopend. Gebruik het formulier om verder te gaan.</p>";
            break;
        case "uitgelogd":
            $form_error = "form-container-error2";
            $error_txt  = "<p class='error-text2'>Je bent succesvol uitgelogd.</p>";
            break;
        case "none":
            $form_error = "form-container-error2";
            $error_txt  = "<p class='error-text2'>Account succesvol aangemaakt. Log nu in.</p>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - Inloggen</title>
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
            <a href="#">Beheer</a>
            <a href="register.php">Registreren</a>
        </nav>
    </header>

    <!-- Login formulier -->
    <div class="login-container">
        <div class="<?php echo $form_error; ?>">
            <h2>Log In</h2>

            <form action="components/login.inc.php" method="POST">

                <!-- Gebruikersnaam -->
                <div class="input-group">
                    <label>Gebruikersnaam:</label>
                    <input
                        type="text"
                        name="username"
                        placeholder="Voer je gebruikersnaam in"
                        required
                    />
                </div>

                <!-- Wachtwoord -->
                <div class="input-group">
                    <label>Wachtwoord:</label>
                    <input
                        type="password"
                        name="ww"
                        placeholder="Voer je wachtwoord in"
                        required
                    />
                </div>

                <!-- Foutmelding -->
                <?php echo $error_txt; ?>

                <!-- Link naar registreren -->
                <p class="small-text">
                    Nog geen account? <a href="register.php">Registreer hier</a>
                </p>

                <!-- Knoppen -->
                <div class="button-row">
                    <button type="submit" name="login" class="login-btn">Inloggen</button>
                    <button type="reset" class="reset-btn">Reset</button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
