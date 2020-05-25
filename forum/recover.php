<?php
require "header.php";
?>
<main>
    <link rel="stylesheet" href="recover-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <div id="registrdiv">
        <h1>Obnovit heslo</h1>
        <form action="includes/recover.inc.php" method="post">
            <input type="text" class="form-control" name="username" placeholder="Uživatelské jméno">
            <input type="password" class="form-control" name="pwd" placeholder="Heslo">
            <input type="password" class="form-control" name="pwd-repeat" placeholder="Zadejte heslo znovu">
            <button type="submit" class="btn btn-info" name="recover-submit">Obnovit</button>

        </form>
    </div>
</main>

<?php
require "footer.php";
?>