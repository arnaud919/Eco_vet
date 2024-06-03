<?php

require_once "functions/db.php";
require_once "functions/valid_form.php";
require_once "functions/utils.php";
require_once "functions/error.php";

//verifie si les valeurs de $_POST sont valides
if(!IsRegisterFormValid($_POST) || empty($_POST)){
    redirect("register.php?error=". INVALID_FORM);
}

//vérifie si le mot de passe et le mot de passe de confirmation sont le mêmes
if(!IsPasswordTheSame($_POST["password"], $_POST["confirmed_password"])){
    redirect("register.php?error=". DIFFERENT_PASSWORD);
}

[
    "firstname"=> $firstname,
    "lastname"=> $lastname,
    "email"=> $email,
    "password"=> $password,
] = $_POST;

try{
    $pdo = GetConnection();
} catch(PDOException $e){
    redirect("register.php");
}

$sql = "INSERT INTO user (firstname_user, lastname_user, email_user, password_user, id_role) VALUES (?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$users = $stmt->execute([
    $firstname,
    $lastname,
    $email,
    $hashedPassword,
    2
]);

redirect("register_success.php");