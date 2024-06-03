<?php

require_once "layout/head.php";
require_once "functions/error.php";

if(isset($_GET["error"])){
    $msgerror = getErrorMessage((intval($_GET["error"])));
    require_once "template/error.php";
}

?>

<h1 class="connect_title">Connexion</h1>

<form action="completed_signin_form.php" method="post" class="center_form">
    <div class="flex_form">

        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" required>
    
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Se connecter">
    </div>
</form>

<div class="register_link">
    <a href="register.php">Pas encore de compte ? Créez-en un ici</a>
</div>

<?php

require_once "layout/footer.php";