<?php 

require_once "layout/head.php";
require_once "functions/error.php";
require_once "functions/db.php";
require_once "functions/cloth_list_preview.php";

if(isset($_GET["error"])){
    $msgerror = getErrorMessage((intval($_GET["error"])));
    require_once "template/error.php";
}

?>


<h1>Éco-Vêt : Le style durable.</h1>

<div>Découvrer notre gamme de vêtement naturel</div>

<?php 

$category = ["homme","femme","enfant"];

foreach($category as $genre){ ?>

    <h2>Nos vêtements <?php echo $genre."s"; ?></h2>

    <?php $cloth_list = ClothListPreview($genre); ?>

    <section class="index_align">
        <div class="index_flex">

        <?php foreach($cloth_list as $value){ 
            require "template/cloth.php";
        } ?>

        </div>
        <a href="category.php?category=<?php echo $genre ?>">Voir plus</a>
    </section>
<?php } ?>

<? require_once "layout/footer.php";