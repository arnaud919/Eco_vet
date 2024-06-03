<?php

const REGISTER_FORM_VALUE = ['firstname', 'lastname', 'email', 'password', 'confirmed_password'];
const SIGNIN_FORM_VALUE = ['email','password'];

/* vérifie si le formulaire d'inscription est valide */
function IsRegisterFormValid(array $form):bool{
    foreach(REGISTER_FORM_VALUE as $value){
        if(empty($form[$value]) || !isset($form[$value])){
            return false;
        }
    }
    return true;
}

/* vérifie si les deux mots de passes saisis sont les même pour l'inscription */
function IsPasswordTheSame(string $pass, string $confirmed_pass):bool{
    if($pass !== $confirmed_pass){
        return false;
    }
    return true;
}

function IsSiginFormValid(array $form):bool{
    foreach(SIGNIN_FORM_VALUE as $value){
        if(empty($form[$value]) || !isset($form[$value])){
            return false;
        }
    }
    return true;
}