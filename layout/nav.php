<nav>
    <ul>
        <a href="index.php">
            <li>Eco-vet</li>
        </a>
        <a href="category.php?category=homme">
            <li>Homme</li>
        </a>
        <a href="category.php?category=femme">
            <li>Femme</li>
        </a>
        <a href="category.php?category=enfant">
            <li>Enfants</li>
        </a>
    </ul>

    <?php
    if(!empty($_SESSION["email_user"])){
        require_once "connected.php";
    } else{
        require_once "not_connected.php";
    }
    ?>
</nav>