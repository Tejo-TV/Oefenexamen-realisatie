<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : functions.inc.php
// Omschrijving      : Bevat alle functies voor registratie en inloggen
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//

// Controleer of velden leeg zijn bij registratie
function emptyInputRegister($username, $email, $ww) {
    return empty($username) || empty($email) || empty($ww);
}

// Controleer of het e-mailadres geldig is
function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Controleer of het e-mailadres al bestaat in de database
function emailExists($conn, $email) {
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.location.href = '../register.php?error=stmtfailed';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) { 
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

// Controleer of de gebruikersnaam al bestaat in de database
function usernameExists($conn, $username) {
    $sql = "SELECT * FROM user WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.location.href = '../register.php?error=stmtfailed';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

// Maak een nieuwe gebruiker aan in de database
function createUser($conn, $username, $email, $ww, $is_admin) {
    $sql = "INSERT INTO user (username, email, password, is_admin) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.location.href = '../register.php?error=stmtfailed';</script>";
        exit();
    }

    $db_ww = hash('sha256', $ww);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $db_ww, $is_admin);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo "<script>window.location.href = '../login.php?error=none';</script>";
    exit();
}

// Controleer of velden leeg zijn bij inloggen
function emptyInputLogin($username, $ww) {
    return empty($username) || empty($ww);
}

// Log een gebruiker in
function loginUser($conn, $username, $ww) {
    $usernameExists = usernameExists($conn, $username);

    if ($usernameExists === false) {
        echo "<script>window.location.href = '../login.php?error=wrongLogin';</script>";
        exit();
    }

    $db_ww = $usernameExists["password"];
    $wwHashed = hash('sha256', $ww);

    if ($db_ww !== $wwHashed) {
        echo "<script>window.location.href = '../login.php?error=wrongLogin';</script>";
        exit();
    }

    // Start de sessie en sla gegevens op
    session_start();
    $_SESSION["userid"] = $usernameExists["ID"];

    if ($usernameExists["is_admin"] == 1) {
        $_SESSION["is_admin"] = true;
        $_SESSION["role"] = "admin";
        echo "<script>window.location.href = '../admin/beheer.admin.php';</script>";
        exit();
    } else {
        $_SESSION["is_admin"] = false;
        echo "<script>window.location.href = '../videos.php';</script>";
        exit();
    }
}
