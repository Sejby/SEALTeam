<?php
if (isset($_POST['recover-submit'])) {
    require 'dbh.inc.php';


    $uidUser = $_POST['username'];
    $password = $_POST["pwd"];
    $passwordrepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordrepeat)) {
        header("Location: ../recover.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    } else if ($password !== $passwordrepeat) {
        header("Location: ../recover.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
        exit();
    } else {

        $sql = "INSERT INTO pwdrecovers (userName, pwd) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../recover.php?error=sqlerror");
            exit();
        } else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $uidUser, $hashedPwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);



            $mysqli = new mysqli('localhost', 'root', '', 'loginsystemseal');
            $sql = "SELECT idPwd, userName, pwd FROM pwdrecovers";
            if ($stmt = $mysqli->prepare($sql)) {
                if ($stmt->execute()) {
                    $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($id, $user, $pwd);
                        while ($row = $stmt->fetch()) {
                            $sql = "UPDATE users SET pwdUsers = $pwd WHERE uidUsers = $user";
                            $res = $mysqli->query($sql);
                            $page = $_SERVER['PHP_SELF'];
                            echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
                        }
                    }
                }
            } else {
                echo $mysqli->error;
            }
            header("Location: ../recover.php?recover=success");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../recover.php");
    exit();
}
