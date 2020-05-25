<?php
    require "header.php";
?>
<main>
    <link rel="stylesheet" href="addpost-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <div id="addpostdiv">
        <h1>Přidat Příspěvek</h1>
        <form action="includes/addpost.inc.php" method="post">
            <input type="text" id="tema-prispevku" class="form-control" name="tema" placeholder="Téma">
            <textarea class="form-control" id="textareaprispevku" name="text" rows="4" placeholder="Text příspěvku"></textarea>
            <button type="submit" class="btn btn-danger" name="addpost-submit">Přidat</button>
        </form>                                                                   
    </div>
</main>

<?php
    require "footer.php";
?>