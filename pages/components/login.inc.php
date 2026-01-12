<?php

if (isset($_POST["login"])) {

    // alle items die worden gepost worden in een apparte variable gezet
    $username = $_POST["username"];
    $ww = $_POST["ww"];

    // include de database connectie en de functies file.
    require_once '../../config/DB_connect.php';
    require_once 'functions.inc.php';


    if (emptyInputLogin($username, $ww) !== false) {
        echo "<script>window.location.href = '../login.php?error=emptyinput';</script>";
        exit();
    }

    loginUser($conn, $username, $ww);
} else {
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
    exit();
}

