<?php
if (isset($_POST['changepost-submit'])) {
    require 'dbh.inc.php';
    session_start();

    $user = $_SESSION['userUId'];
    $topic = $_POST["tema"];
    $text = $_POST["text"];

    if (isset($_POST['zmenitPost'])) {
        $sql = "UPDATE posty SET date, topic = $topic, postText = $text WHERE idPosts ="." ";
        $res = $mysqli->query($sql);
        $page = $_SERVER['PHP_SELF'];
        echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../addpost.php");
    exit();
}
