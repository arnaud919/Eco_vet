<?php

require_once "layout/basic_head.php";
require_once "functions/utils.php";

if(empty($_POST) || !isset($_POST)){
    redirect("index.php?error");
}

if(empty($_SESSION) || !isset($_SESSION["email_user"]) || empty($_SESSION["email_user"])){
    redirect("need_to_be_connected.php");
}

[
    "id_cloth" => $id_cloth,
    "name_color" => $color,
    "name_size" => $size,
    "quantity" => $quantity
] = $_POST;

if(!isset($_SESSION["order"])){
    $_SESSION["order"] = [[$id_cloth, $color, $size, $quantity]];
}else{
    array_push($_SESSION["order"], [$id_cloth, $color, $size, $quantity]);
}

redirect("index.php");