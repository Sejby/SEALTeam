<?php
    require "header.php";
?>
    <main>
        <link rel="stylesheet" href="signup-style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
        <div id="registrdiv">
            <h1>Registrace</h1>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" class="form-control" name="uid" placeholder="Uživatelské jméno">
                <input type="text" class="form-control" name="mail" placeholder="E-mail">
                <input type="password" class="form-control" name="pwd" placeholder="Heslo">
                <input type="password" class="form-control" name="pwd-repeat" placeholder="Zadejte heslo znovu">
                <a href="recover.php" id="odkaz">Obnovit heslo</a>
                <button type="submit" class="btn btn-info" name="signup-submit">Registrovat</button>
                
        
            </form>
        </div>
    </main>

<?php
    require "footer.php";
?>