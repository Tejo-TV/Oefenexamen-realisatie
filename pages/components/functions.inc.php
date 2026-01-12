<?php

// Check of de variable leeg zijn
function emptyInputRegister($username, $email, $ww) {
    $result;
    if(empty($username) || empty($email) || empty($ww)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check of de layout email klopt
function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

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
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

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
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

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

function emptyInputLogin($username, $ww) {
    $result;
    if(empty($username) || empty($ww)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $ww) {
    $usernameExists = usernameExists($conn, $username);

    if ($usernameExists === false) {
        echo "<script>window.location.href = '../login.php?error=wrongLogin';</script>";
        exit();
    }

    $db_ww = $usernameExists["password"];
    $wwHashed = hash('sha256', $ww);
    if($db_ww === $wwHashed) {
        $wwChecker = true;
    } else {
        $wwChecker = false;
    }

    if ($wwChecker === false) {
        echo "<script>window.location.href = '../login.php?error=wrongLogin';</script>";
        exit();
    } else if ($wwChecker === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["ID"];
        if ($emailExists["is_admin"] == 1){
            $_SESSION["is_admin"] = true;
            echo "<script>window.location.href = '../admin.php';</script>";
            exit();
        } else {
            $_SESSION["is_admin"] = false;
            echo "<script>window.location.href = '../account.php';</script>";
            exit();
        }
    }
}