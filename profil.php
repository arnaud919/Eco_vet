<?php

require_once "layout/basic_head.php";
require_once "functions/db.php";
require_once "functions/error.php";
require_once "functions/utils.php";

if(empty($_SESSION["email_user"])){
    redirect("need_to_be_connected.php");
}

try{
    $pdo = GetConnection();
} catch(PDOException $e){
    redirect("index.php?error=4");
}

?>

<a href="index.php">Retour à la page d'accueil</a>

<div class="profil">
    <div class="profil_name">
        <?php echo $_SESSION["firstname_user"]; ?> <?php echo $_SESSION["lastname_user"]; ?>
    </div>
    <div class="profil_email">
        <?php echo $_SESSION["email_user"]; ?>
    </div>
    <div class="profil_modification">
        <a href="modify_profil.php">Modifier mon profil</a>
    </div>
</div>

<div class="profil">
    <div class="profil_order">Ma commande</div>
</div>


<?php
require_once "layout/footer.php";