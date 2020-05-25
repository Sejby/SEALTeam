<?php
    require "header.php";
?>
<main>
    <link rel="stylesheet" href="kontakt-style.css">
    <link rel="shortcut icon" type="image/png" href="obrazky/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <div id="sendmessagediv">
        <h1>Kontaktní Formulář</h1>
        <form action="includes/kontakt.inc.php" method="post">
            
            <input type="text" id="tema-prispevku" class="form-control" name="tema" placeholder="Předmět">
            <textarea class="form-control" id="textareaprispevku" name="text" rows="4" placeholder="Text zprávy"></textarea>
            <button type="submit" class="btn btn-danger" name="kontakt-submit">Poslat</button>
        </form>
    </div>
</main>

<?php
    require "footer.php";
?>