<?php
//---------------------------------------------------------------------------------------------------//
// Naam script       : video.upload.inc.php
// Omschrijving      : Verwerkt het uploaden van nieuwe video's door admin
// Naam ontwikkelaar  : Tejo Veldman
// Project           : NETFISH
// Datum             : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//

if (isset($_POST["video-upload"])) {

    // Zet alle POST-waarden in aparte variabelen
    $title = $_POST["title"];
    $video_url = $_POST["video_url"];
    $year = $_POST["year"];
    $beschrijving = $_POST["description"];

    // Include database connectie
    require_once '../../config/DB_connect.php';

    // Controleer en verplaats de cover afbeelding
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
        $upload_dir = '../../assets/images/uploads/';
        $cover_image_name = basename($_FILES['cover_image']['name']);

        if (!move_uploaded_file($_FILES['cover_image']['tmp_name'], $upload_dir . $cover_image_name)) {
            echo "<script>window.location.href = '../admin/add.admin.php?error=fileuploaderror';</script>";
            exit();
        }
    } else {
        echo "<script>window.location.href = '../admin/add.admin.php?error=fileuploaderror';</script>";
        exit();
    }

    // Voeg de video toe aan de database
    $sql = "INSERT INTO videos (title, video_url, cover_image, `year`, description) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.location.href = '../admin/add.admin.php?error=stmtfailed';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $title, $video_url, $cover_image_name, $year, $beschrijving);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Redirect naar add.admin.php met succesmelding
    echo "<script>window.location.href = '../admin/add.admin.php?upload=success';</script>";
    exit();

} else {
    // Directe toegang tot het script is niet toegestaan
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
    exit();
}
?>