<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";

if (isset($_SESSION["userAccount"])) {
    header("Location: logout");
}

if (isset($_POST["loginButton"])) {

    $regexAccountName = "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ]{5,25}$/";
    $regexPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,25}$/";
    $arrayErrors = [];

    if (preg_match($regexAccountName, $_POST["userAccountName"])) {
        $securedUserAccountName = htmlspecialchars($_POST["userAccountName"]);
        $user = new Users();
        $accountInformations = $user->checkAccountInformations($securedUserAccountName);
    } else {
        $arrayErrors["userAccountName"] = "Le nom de compte doit contenir 5 à 25 caractères (sans espaces, tirets ou caractères spéciaux).";
    }

    if (preg_match($regexPassword, $_POST["userAccountPassword"])) {
        $userAccountPassword = $_POST["userAccountPassword"];
    } else {
        $arrayErrors["userAccountPassword"] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial. (8 à 25 caractères).";
    }

    if (empty($arrayErrors)) {
        if (!empty($accountInformations) && password_verify($userAccountPassword, $accountInformations["account_password"])) {
           
            $userAccount = [];
            $userAccount["id"] = $accountInformations["account_id"];
            $userAccount["name"] = $accountInformations["account_name"];
            $userAccount["email"] = $accountInformations["account_email"];
            $userAccount["password"] = $accountInformations["account_password"];
            $userAccount["role"] = $accountInformations["role_name"];

            $_SESSION["userAccount"] = $userAccount;
            $_SESSION["loginMessage"] = "Bienvenue sur 35M !";

            header("Location: movies.php?page=1");
        } else {
            $wrongAccountInformationsMessage = "Vos identifiants sont incorrects.";
        }
    }
}
