<?php 
require_once "layout/head.php";
require_once "functions/db.php";

$genre = $_GET["category"];

try{
    $pdo = GetConnection();
} catch(PDOException $e){
    redirect("index.php?error=4");
}

$sql = "SELECT id_cloth, name_cloth, price_cloth, image_url_cloth FROM cloth INNER JOIN person_type ON cloth.id_person_type = person_type.id_person_type WHERE person_type.name_person_type = :person_type";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('person_type', $genre, PDO::PARAM_STR);
$stmt->execute();

$stmt_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Vêtements pour <?php echo $genre; ?></h1>

<section class="category_align">
    <div class="category_flex">

    <?php foreach($stmt_result as $value){ 
        require "template/cloth.php";
    } ?>

    </div>
</section>

<?php

require_once "layout/footer.php";