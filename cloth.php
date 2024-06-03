<?php

require_once "layout/head.php";
require_once "functions/db.php";

if(empty($_GET)){
    redirect("index.php");
}

try{
    $pdo = GetConnection();
} catch(PDOException $e){
    redirect("index.php?error=4");
}

//Avoir l'id du vêtement
$id_cloth = $_GET["cloth"];

//Avoir les données liés au vêtement avec l'id avec le nom de la categorie de vêtement, le nom de type de tissu et le nom de type de personne
$sql_cloth = "SELECT id_cloth, name_cloth, price_cloth, description_cloth, id_cloth_category, image_url_cloth, cloth.id_fabric, name_person_type, name_fabric, name_category FROM cloth INNER JOIN person_type ON cloth.id_person_type = person_type.id_person_type INNER JOIN cloth_fabric ON cloth_fabric.id_fabric = cloth.id_fabric INNER JOIN cloth_category ON cloth_category.id_category = cloth.id_cloth_category WHERE id_cloth = :id_cloth";

$stmt = $pdo->prepare($sql_cloth);
$stmt->bindValue('id_cloth', $id_cloth, PDO::PARAM_STR);
$stmt->execute();
$stmt_description_value = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cloth_value = $stmt_description_value[0];

//Nom du vêtement sans espace
$cloth_name = str_replace("_"," ",$cloth_value["name_cloth"]);

//Avoir la liste des couleurs disponibles
$sql_color = "SELECT name_color FROM cloth_color";
$stmt = $pdo->prepare($sql_color);
$stmt->execute();
$stmt_color = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Nombre de couleur disponible
$number_color = count($stmt_color) - 1;

//Avoir la liste des taille
$sql_size = "SELECT name_size, coefficient_price FROM cloth_size";
$stmt = $pdo->prepare($sql_size);
$stmt->execute();
$stmt_size = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Nombre de taille disponible
$number_size = count($stmt_size) - 1;

require_once "layout/description_cloth.php";

?>


<?php

require_once "layout/footer.php";