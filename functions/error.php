<?php

const INVALID_FORM = 1;
const DIFFERENT_PASSWORD = 2;
const UNREGISTERED_EMAIL = 3;
function getErrorMessage($code_error):string{

    $msgerror = "";

    switch($code_error){
        case INVALID_FORM:
            $msgerror = "Le formulaire est invalide";
            break;
        case DIFFERENT_PASSWORD:
            $msgerror = "Le mot de passe et le mot de passe de confirmation ne correspondent pas";
            break;
        case UNREGISTERED_EMAIL:
            $msgerror = "l'email est incorrect ou incconu";
            break;
        default:
        $msgerror = "une erreur est survenue";
    }

    return $msgerror;
}