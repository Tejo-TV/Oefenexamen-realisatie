<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : login.php
// Omschrijving		  : Dit is de login pagina
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
    } else if ($_GET["error"] == "wrongLogin") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> The email address or password is incorrect. Please check your information and try again. </p>";
    } else if ($_GET["error"] == "stmtfailed") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> A technical error has occurred. Please try again later or contact your administrator. </p>";
    } else if ($_GET["error"] == "wrongWay") {
        $form_error = "form-container-error";
        $error_txt = "<p class='error-text'> You've accessed this page incorrectly. Please use the form to continue. </p>";
    } else if ($_GET["error"] == "uitgelogd") {
        $form_error = "form-container-error2";
        $error_txt = "<p class='error-text2'> You successfully logged out! </p>";
    } else if ($_GET["error"] == "none") {
        $form_error = "form-container-error2";
        $error_txt = "<p class='error-text2'> Account successfully created, log in now! </p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - LOGIN</title>
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
            <a href="register.php">Registreer</a>
        </nav>
    </header>

    <!-- Login form -->
     <div class= "login-container">
    <div class="<?php echo $form_error; ?>">
        <h2>Login Form</h2>

        <form action="components/login.inc.php" method="POST">

            <!-- Email -->
            <div class="input-group">
                <label>Email:</label>
                <input type="text" name="email" placeholder="Enter your email" required />
            </div>

            <!-- Password -->
            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="ww" placeholder="Enter your password" required />
            </div>

            <!-- Error text -->
            <?php echo $error_txt; ?>

            <!-- Back to Register -->
            <p class="small-text">
                No account? <a href="register.php">Register here</a>
            </p>

            <!-- Register Button -->
            <div class="button-row">
                <button type="submit" name="login" class="login-btn">Login</button>
                <button type="reset" class="reset-btn">Reset</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>