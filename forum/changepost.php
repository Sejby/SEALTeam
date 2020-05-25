<?php
    require "header.php";
?>
<main>
    <link rel="stylesheet" href="addpost-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <div id="addpostdiv">
        <h1>Změnit příspěvek</h1>
        <form method="post">
            <input type="text" id="tema-prispevku" class="form-control" name="tema" placeholder="Téma">
            <textarea class="form-control" id="textareaprispevku" name="text" rows="4" placeholder="Text příspěvku"></textarea>
            <button type="submit" class="btn btn-danger" name="changepost-submit">Změnit</button>

            <?php
                require "includes/dbh.inc.php";
                
                if (isset($_POST['zmenitPost'])) {
                    $_SESSION['pom'] = $_POST['zmenitPost'];
                    echo $_SESSION['pom'];
                }

                if(isset($_POST['changepost-submit'])){
                    $topic = $_POST['tema'];
                    $text = $_POST['text'];
                    $sql = "UPDATE posty SET topic = '$topic', postText = '$text' WHERE idPosts =" . $_SESSION['pom'] . " ";
                    $res = $conn->query($sql);
                    $page = $_SERVER['PHP_SELF'];
                    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
                }
            ?>
        </form>
    </div>
</main>

<?php
    require "footer.php";
?>