<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : register.php
// Omschrijving		  : Dit is de registreer pagina
// Naam ontwikkelaar  : Tejo Veldman
// Project		      : NETFISH 
// Datum		      : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//

// error styles
$form_error = "form-container";
$error_txt = "";

if(isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> One or more required fields are empty. Please complete all fields to continue. </p>";
    } else if ($_GET["error"] == "invalidemail") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> The email address you entered is invalid. Please check that you entered a valid email address, for example: example@domain.com </p>";
    } else if ($_GET["error"] == "emailTaken") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> This email address is already in use. Try a different email address or log in if you already have an account. </p>";
    } else if ($_GET["error"] == "stmtfailed") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> A technical error has occurred. Please try again later or contact your administrator. </p>";
    } else if ($_GET["error"] == "wrongWay") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> You've accessed this page incorrectly. Please use the form to continue. </p>";
    }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - Registreer</title>
    <link rel="shortcut icon" type="x-icon" href="../assets/images/NETFISH-logo-klein.png">
<link rel="stylesheet" href="../assets/CSS/style.css">
</head>
<body>
        <!-- Header -->
    <header>
        <a href="../index.php"><img src="../assets/images/NETFISH-logo.png" alt="Logo"></a>
        <nav>
            <a href="videos.php">Videos</a>
            <a href="beheer.php">Beheer</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    <div class="register-container">  
<div class="<?php echo $form_error; ?>">
        <h2>Registration Form</h2>

        <form action="components/register.inc.php" method="POST">

            <!-- First + Last Name -->
            <div class="name-row">
                <div class="input-group">
                    <label>First Name:</label>
                    <input type="text" name="voornaam" placeholder="Enter your first name" minlength="2" maxlength="30" required />
                </div>

                <div class="input-group">
                    <label>Last Name:</label>
                    <input type="text" name="achternaam" placeholder="Enter your last name" minlength="2" maxlength="30" required />
                </div>
            </div>

            <!-- Contact Number + Email -->
            <div class="contact-row">
                <div class="input-group">
                    <label>Contact Number:</label>
                    <input type="text" name="contact" placeholder="Enter your contact number" minlength="10" maxlength="15" pattern="[0-9]{10,15}" required />
                </div>

                <div class="input-group">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Enter your email" minlength="5" maxlength="50" required />
                </div>
            </div>

            <!-- Username -->
            <div class="input-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Enter your username" minlength="4" maxlength="10" required />
            </div>

            <!-- Password -->
            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="ww" placeholder="Enter your password" minlength="8" required />
            </div>

            <!-- Error text -->
            <?php echo $error_txt; ?>

            <!-- Back to Login -->
            <a class="back-link" href="login.php"><- Back to login</a>

            <!-- Register Button -->
            <div class="button-row">
                <button type="submit" name="register" class="register-btn">Register</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>

        </form>
    </div>
    </div>

</body>
</html>