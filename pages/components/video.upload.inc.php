<?php
if (isset($_POST["video-upload"])) {

    // alle items die worden gepost worden in een apparte variable gezet
    $title = $_POST["title"];
    $video_url = $_POST["video_url"];   
    $year = $_POST["year"];
    $beschrijving = $_POST["description"];

    // include de database connectie file.
    require_once '../../config/DB_connect.php';


    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
        move_uploaded_file(
            $_FILES['cover_image']['tmp_name'],
            '../../assets/Images/uploads/' . $_FILES['cover_image']['name']
        );
    } else {
        echo "<script>window.location.href = '../admin/add.admin.php?error=fileuploaderror';</script>";
        exit();
    }


    $sql = "INSERT INTO videos (title, video_url, cover_image, `year`, description) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);    

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "<script>window.location.href = '../admin/add.admin.php?error=stmtfailed';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $title, $video_url, $_FILES['cover_image']['name'], $year, $beschrijving);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    echo "<script>window.location.href = '../admin/add.admin.php?upload=success';</script>";
} else {
    echo "<script>window.location.href = '../login.php?error=wrongWay';</script>";
    exit();
}
?>