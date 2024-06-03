<?php

$name_cloth = str_replace("_", " ", $value["name_cloth"]);

?>

<a href="cloth.php?cloth=<?php echo $value["id_cloth"] ?>" class="cloth">
    <div class="name"><?php echo $name_cloth ?></div>
    <div class="image">
        <img class="cloth_image" src= <?php echo "assets_css/img/cloth/".$genre."/".$value["image_url_cloth"] ?> alt="<?php echo $value["image_url_cloth"]?>">
    </div>
    <div class="price"><?php echo $value["price_cloth"] ?> €</div>
</a>