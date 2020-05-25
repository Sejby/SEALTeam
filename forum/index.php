<?php
require "header.php";
?>
<main>
    <link rel="stylesheet" href="main-style.css">
    <link rel="shortcut icon" type="image/png" href="obrazky/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <div id="content">


        <?php
        if (isset($_SESSION['userId'])) {
            echo '<div id="pridaniPrispevku">
                  <form action="addpost.php" id="nejlepsiform">
                  <h3 id="pridejsvujnapad">What is on your mind?</h3><button type="submit" class="btn btn-success" id="tlacitkopridani">Add Post</button>
                  </form>
                  </div>';
        } else {
            echo '<div id="pridaniPrispevku">
                  <h3 id="info-warning">To add a post you need to login or <a href="signup.php">signup </a>first.</h3>
                  </div>';
        }

        $mysqli = new mysqli('localhost', 'root', '', 'loginsystemseal');
        $sql = "SELECT idPosts, date, user, topic, postText FROM posty";
        if ($stmt = $mysqli->prepare($sql)) {
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $date, $user, $topic, $text);
                    while ($row = $stmt->fetch()) {
                        echo '
                        <div class="prispevek">';

                        if (isset($_SESSION['userUId'])) {
                            if ($user == $_SESSION['userUId']) {
                                echo '<form method="post" action="changepost.php" id="formsbuttonama1">
                            <button type="submit" name="zmenitPost" value=' . $id . ' class="btn btn-warning btn-sm" id="meniciTlacitko" value=' . $id . '>Edit</button>
                            </form>
                            <form method="post" id="formsbuttonama2">
                            <button type="submit" name="odstranitPost" value=' . $id . ' class="btn btn-danger btn-sm" id="odstranovaciTlacitko">Remove</button>
                            </form>';
                            }
                        }
                        echo '<h3 class="jmenouzivatele">' . $topic . '</h3>
                                <p class="textuzivatele">' . $text . '</p>          
                                <h3 class="datum">Posted: ' . $date . '</h3>
                                <h3 class="autor">Author: ' . $user . '</h3>
                                </div>';
                      
                    }
                }
            }
        } else {
            echo $mysqli->error;
        }

        if (isset($_POST['odstranitPost'])) {
            $sql = "DELETE FROM posty WHERE idPosts =" . $_POST['odstranitPost'] . " ";
            $res = $mysqli->query($sql);
            $page = $_SERVER['PHP_SELF'];
            echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
        }

        ?>
    </div>
</main>

<?php
require "footer.php";
?>