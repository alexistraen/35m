<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";
require_once "../Models/Lists.php";

if (isset($_SESSION["userAccount"])) {
    header("Location: logout.php");
}

if (isset($_POST["registerButton"])) {

    $user = new Users();

    // Account name regex : at least 5 characters and max 25
    $regexAccountName = "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ]{5,25}$/";
    // Password regex : at least one character, one number and one special character.
    // Total allocated characters : Min 8 - Max 25
    $regexPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,25}$/";

    $arrayErrors = [];
    $arraySuccess = [];
    $arrayAccountInformations = [];

    if (preg_match($regexAccountName, $_POST["userAccountName"])) {
        if (!$user->checkExistsAccountName($_POST["userAccountName"])) {
            $arrayAccountInformations["userAccountName"] = htmlspecialchars($_POST["userAccountName"]);
            $arraySuccess["userAccountName"] = "<i class=\"fas fa-check sucess-color-message\"></i>";
        } else {
            $arrayErrors["userAccountName"] = "Ce nom de compte est déjà utilisé.";
        }
    } else {
        $arrayErrors["userAccountName"] = "Le nom de compte doit contenir 5 à 25 caractères (sans espaces, tirets ou caractères spéciaux).";
    }

    if (filter_var($_POST["userAccountEmail"], FILTER_VALIDATE_EMAIL)) {
        if (!$user->checkExistsEmail($_POST["userAccountEmail"])) {
            $arrayAccountInformations["userAccountEmail"] = htmlspecialchars($_POST["userAccountEmail"]);
            $arraySuccess["userAccountEmail"] = "<i class=\"fas fa-check sucess-color-message\"></i>";
        } else {
            $arrayErrors["userAccountEmail"] = "Cette adresse mail est déjà utilisée.";
        }
    } else {
        $arrayErrors["userAccountEmail"] = "L'adresse email renseignée est incorrecte.";
    }

    if ($_POST["userAccountPassword"] === $_POST["userAccountConfirmPassword"]) {
        if (preg_match($regexPassword, $_POST["userAccountPassword"])) {
            $arrayAccountInformations["userAccountPassword"] = password_hash($_POST["userAccountPassword"], PASSWORD_BCRYPT);
        } else {
            $arrayErrors["userAccountPassword"] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial. (8 à 25 caractères).";
        }
    } else {
        $arrayErrors["userAccountConfirmPassword"] = "Les mots de passe renseignés ne sont pas identiques !";
    }

    if (empty($arrayErrors)) {
        if ($user->addUser($arrayAccountInformations)) {
            $idUser = $user->getDb()->lastInsertId();
            $list = new UserLists();
            if ($list->newUserDefaultLists($idUser)) {
                $_SESSION["registerSuccessMessage"] = "Votre inscription est terminée !";
                header("Location: login.php");
            }
        }
    }
}
