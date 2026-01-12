<?php
//---------------------------------------------------------------------------------------------------//
// Naam script        : register.php
// Omschrijving      : Dit is de registreerpagina
// Naam ontwikkelaar : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
session_start();

if (isset($_SESSION["userid"])) {
        echo "<script>window.location.href = 'pages/Videos.php';</script>";
        exit();
}
// fout styles
$form_error = "form-container";
$error_txt  = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        $form_error = "form-container-error";
        $error_txt  = "<p class='error-text'> Eén of meerdere verplichte velden zijn leeg. Vul alle velden in om verder te gaan. </p>";
    } elseif ($_GET["error"] == "invalidemail") {
        $form_error = "form-container-error";
        $error_txt  = "<p class='error-text'> Het ingevoerde e-mailadres is ongeldig. Controleer of het formaat klopt, bijvoorbeeld: voorbeeld@domein.nl </p>";
    } elseif ($_GET["error"] == "passwordsdontmatch") {
    $form_error = "form-container-error";
    $error_txt  = "<p class='error-text'> De wachtwoorden komen niet overeen. </p>";
    } elseif ($_GET["error"] == "emailTaken") {
        $form_error = "form-container-error";
        $error_txt  = "<p class='error-text'> Dit e-mailadres is al in gebruik. Probeer een ander e-mailadres of log in. </p>";
    } elseif ($_GET["error"] == "stmtfailed") {
        $form_error = "form-container-error";
        $error_txt  = "<p class='error-text'> Er is een technische fout opgetreden. Probeer het later opnieuw of neem contact op met de beheerder. </p>";
    } elseif ($_GET["error"] == "wrongWay") {
        $form_error = "form-container-error";
        $error_txt  = "<p class='error-text'> Deze pagina is verkeerd geopend. Gebruik het formulier om verder te gaan. </p>";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - REGISTREREN</title>
    <link rel="shortcut icon" type="x-icon" href="../assets/images/NETFISH-logo-klein.png">
    <link rel="stylesheet" href="../assets/CSS/style.css">
</head>

<body>

    <!-- Header -->
    <header>
        <a href="../index.php">
            <img src="../assets/images/NETFISH-logo.png" alt="Logo">
        </a>

        <nav>
            <a href="videos.php">Video’s</a>
            <a href="beheer.php">Beheer</a>
            <a href="login.php">Inloggen</a>
        </nav>
    </header>

    <div class="register-container">
        <div class="<?php echo $form_error; ?>">

            <h2>Registreer</h2>

            <form action="components/register.inc.php" method="POST">

                <!-- Gebruikersnaam -->
                    <div class="input-group">
                        <label>Gebruikersnaam:</label>
                        <input
                            type="text"
                            name="username"
                            placeholder="Voer je gebruikersnaam in"
                            minlength="2"
                            maxlength="30"
                            required
                        />
                    </div>

                <!-- E-mail -->
                    <div class="input-group">
                        <label>E-mail:</label>
                        <input
                            type="email"
                            name="email"
                            placeholder="Voer je e-mailadres in"
                            minlength="5"
                            maxlength="50"
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
                        minlength="8"
                        required
                    />
                </div>

                <!-- Wachtwoord-herhalen -->
                <div class="input-group">
                    <label>Wachtwoord herhalen:</label>
                    <input
                        type="password"
                        name="ww-repeat"
                        placeholder="Voer je wachtwoord opnieuw in"
                        minlength="8"
                        required
                    />
                </div>

                <!-- Foutmelding -->
                <?php echo $error_txt; ?>

                <!-- Terug naar login -->
                <a class="back-link" href="login.php">&larr; Terug naar inloggen</a>

                <!-- Knoppen -->
                <div class="button-row">
                    <button type="submit" name="register" class="register-btn">
                        Registreren
                    </button>

                    <button type="reset" class="reset-btn">
                        Reset
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>
