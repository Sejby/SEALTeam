<?php
if (isset($_POST['kontakt-submit'])) {
    require 'dbh.inc.php';
    session_start();

    $user = $_SESSION['userUId'];
    $topic = $_POST["tema"];
    $text = $_POST["text"];

    if (empty($topic) || empty($text)) {
        $error = "Prosím vyplňte všechny údaje";
        header("Location: ../kontakt.php?error=emptyfields");
        exit();

    } else {
        $sql = "SELECT idZprav FROM messages WHERE idZprav=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../kontakt.php?error=sqlerror");
            exit();
        } else {
            $sql = "INSERT INTO messages (user, topic, text) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../kontakt.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $user, $topic, $text);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                header("Location: ../kontakt.php?kontakt=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../kontakt.php");
    exit();
}
