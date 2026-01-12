<?php

if (isset($_POST["register"])) {

    // alle items die worden gepost worden in een apparte variable gezet
    $username = $_POST["username"];
    $email = $_POST["email"];
    $ww = $_POST["ww"];
    $ww_repeat = $_POST["ww-repeat"];
    $is_admin = 0;

    // include de database connectie en de functies file.
    require_once '../../config/DB_connect.php';
    require_once 'functions.inc.php';

    if ($ww !== $ww_repeat) {
        echo "<script>window.location.href = '../register.php?error=passwordsdontmatch';</script>";
        exit();
    }

    // als de variable leeg is stuurt de pagina je trug
    if (emptyInputRegister($username, $email, $ww) !== false) {
        echo "<script>window.location.href = '../register.php?error=emptyinput';</script>";
        exit();
    }

    // Als de email geen valid email is stuurt de pagina je terug
    if (invalidEmail($email) !== false) {
        echo "<script>window.location.href = '../register.php?error=invalidemail';</script>";
        exit();
    }

     // Als de email al bestaat stuurt de pagina je terug
    if (emailExists($conn, $email) !== false) {
        echo "<script>window.location.href = '../register.php?error=emailTaken';</script>";
        exit();
    }

    createUser($conn, $username, $email, $ww, $is_admin);

} else {
    // stuurt persoon terug als er niks te doen is op deze pagina.
    echo "<script>window.location.href = '../register.php?error=wrongWay';</script>";
    exit();
}

?>