<?php
if (isset($_POST['addpost-submit'])) {
    require 'dbh.inc.php';
    session_start();

    $user = $_SESSION['userUId'];
    $topic = $_POST["tema"];
    $text = $_POST["text"];

    if (empty($topic) || empty($text)) {
        $error = "Prosím vyplňte všechny údaje";
        header("Location: ../addpost.php?error=emptyfields");
        exit();

    } else {
        $sql = "SELECT idPosts FROM posty WHERE idPosts=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../addpost.php?error=sqlerror");
            exit();
        } else {
            $sql = "INSERT INTO posty (user, topic, postText) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../addpost.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $user, $topic, $text);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../addpost.php?kontakt=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../addpost.php");
    exit();
}
