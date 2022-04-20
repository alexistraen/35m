<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../index.php");
}

if (isset($_POST["deleteAccountButton"])) {

    $user = new Users();

    $regexId = "/^[0-9]+$/";
    $regexPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,25}$/";

    $arrayErrors = [];

    $accountId = htmlspecialchars($_SESSION["userAccount"]["id"]);

    if (preg_match($regexId, $accountId)) {
        $securedAccountId = (int)$accountId;
    } else {
        $arrayErrors["userAccountId"] = "Une erreur s'est produite.";
    }

    if (preg_match($regexPassword, $_POST["userAccountCurrentPassword"])) {
        $userAccountCurrentPassword = $_POST["userAccountCurrentPassword"];
        $getCurrentPassword = $user->getCurrentPassword($securedAccountId);

        if (!password_verify($userAccountCurrentPassword, $getCurrentPassword["account_password"])) {
            $arrayErrors["userAccountCurrentPassword"] = "Le mot de passe est incorrect.";
        }
    } else {
        $arrayErrors["userAccountCurrentPassword"] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial. (8 à 25 caractères).";
    }

    if (empty($arrayErrors)) {
        if ($user->deleteAccountById($securedAccountId)) {
            session_destroy();
            header("Location: ../index.php");
        }
    }
}
