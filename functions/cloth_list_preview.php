<?php

require_once "db.php";

function ClothListPreview($genre):array{

    $pdo = GetConnection();

    $sql = "SELECT id_cloth, name_cloth, price_cloth, image_url_cloth FROM cloth INNER JOIN person_type ON cloth.id_person_type = person_type.id_person_type WHERE person_type.name_person_type = :person_type LIMIT 5";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('person_type', $genre, PDO::PARAM_STR);
    $stmt->execute();

    $cloth_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $cloth_list;
}