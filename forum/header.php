<?php
session_start();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>SEAL Team - Forum</title>
</head>

<body>
    <header>
        <a href="index.php">
            <img src="obrazky/logo_forum.png" id="logo">
        </a>
        <nav>
            <ul>
                <li><a href="../index.html">About</a></li>
                <li><a href="kontakt.php">Contact</a></li>
            </ul>
        </nav>
        <div class="form-inline">
            <?php
            if (isset($_SESSION['userId'])) {
                echo '<form action="includes/logout.inc.php" method="post">
                            <h3 id="jmenousera">User: '.$_SESSION['userUId']. '</h3>
                            <button type="submit" class="btn btn-danger" name="logout-submit">Sign Out</button>
                            </form>';
            } else {
                echo '
                        <form action="includes/login.inc.php" method="post">
                        <input type="text" class="form-control" name="mailuid" placeholder="Username">
                        <input type="password" class="form-control" name="pwd" placeholder="Password">
                        <button type="submit" class="btn btn-dark" name="login-submit">Login</button>
                        </form>
                        <form action="signup.php">
                        <button type="submit" class="btn btn-light" id="registr-button">Signup</button>
                        </form>';
            }
            ?>
        </div>
    </header>
</body>

</html>