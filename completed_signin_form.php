<?php

require_once "functions/db.php";
require_once "functions/valid_form.php";
require_once "functions/utils.php";
require_once "functions/error.php";

if(!IsSiginFormValid($_POST) || empty($_POST)){
    redirect("register.php?error=". INVALID_FORM);
    exit;
}

[
    "email" => $email,
    "password"=> $password
] = $_POST;

try{
    $pdo = GetConnection();
} catch(PDOException $e){
    redirect("signin.php");
    exit;
}

$sql_email = "SELECT * FROM user WHERE email_user = :email";
$stmt = $pdo->prepare($sql_email);
$stmt->bindValue('email', $email, PDO::PARAM_STR);
$stmt->execute();

$stmt_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$data_user = $stmt_result[0];

if(!$data_user["email_user"]){
    redirect('signin.php?error='.UNREGISTERED_EMAIL);
    exit;
} else if(!password_verify($password, $data_user["password_user"])){
        redirect("signin.php?error=". INVALID_FORM);
        exit;
    } else {
    session_start();

    unset($data_user["password_user"]);
    foreach($data_user as $key => $value)
    {
        $_SESSION[$key] = $value;
    }
    
    redirect("index.php");

    }