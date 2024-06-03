<?php
require_once "layout/head.php";
require_once "functions/error.php";

if(isset($_GET["error"])){
    $msgerror = getErrorMessage((intval($_GET["error"])));
    require_once "template/error.php";
}

?>

<h1 class="connect_title">Inscription</h1>

<form action="completed_register_form.php" method="post" class="center_form">
    <div class="flex_form">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="lastname" required>
    
        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname" required>
    
        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" required>
    
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    
        <label for="confirmed_password">Confirmer le mot de passe</label>
        <input type="password" name="confirmed_password" id="confirmed_password" required>

        <input type="submit" value="S'inscrire">
    </div>
</form>

<div class="signin_link">
    <a href="signin.php">Déjà inscrit ? Connectez-vous ici</a>
</div>

<?php

require_once "layout/footer.php";