<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../index.php");
}

if (!empty($_POST)) {

    $user = new Users();

    $regexId = "/^[0-9]+$/";
    $arrayErrors = [];
    $arrayUpdateAccountInformations = [];

    $accountId = htmlspecialchars($_SESSION["userAccount"]["id"]);

    if (preg_match($regexId, $accountId)) {
        $arrayUpdateAccountInformations["userAccountId"] = (int)$accountId;
    } else {
        $arrayErrors["userAccountId"] = "Une erreur s'est produite.";
    }
}

if (isset($_POST["updateAccountInfosButton"])) {
    if (filter_var($_POST["userAccountEmail"], FILTER_VALIDATE_EMAIL)) {
        $arrayUpdateAccountInformations["userAccountEmail"] = htmlspecialchars($_POST["userAccountEmail"]);
        $checkEmail = $user->checkOthersAccountsEmail($arrayUpdateAccountInformations);

        if ($checkEmail) {
            if ($checkEmail["account_id"] === $accountId) {
                $arrayErrors["userAccountEmail"] = "Vous utilisez déjà cette adresse email.";
            } else {
                $arrayErrors["userAccountEmail"] = "Cette adresse email est déjà utilisée.";
            }
        }
    } else {
        $arrayErrors["userAccountEmail"] = "L'adresse email renseignée est incorrecte.";
    }

    if (empty($arrayErrors)) {
        if ($user->updateAccountInformations($arrayUpdateAccountInformations)) {
            $_SESSION["userAccount"]["email"] = $arrayUpdateAccountInformations["userAccountEmail"];
            $_SESSION["updateAccountConfirmMessage"] = "<i class=\"fas fa-check\"></i> Adresse email modifiée.";
            header("Location: account.php");
            exit();
        }
    }
}

if (isset($_POST["updateAccountPasswordButton"])) {

    $regexPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,25}$/";

    if (preg_match($regexPassword, $_POST["userAccountCurrentPassword"])) {

        $userAccountCurrentPassword = $_POST["userAccountCurrentPassword"];
        $getCurrentPassword = $user->getCurrentPassword($arrayUpdateAccountInformations["userAccountId"]);

        if ($userAccountCurrentPassword == $_POST["userAccountNewPassword"]) {
            $arrayErrors["userAccountNewPassword"] = "Vous devez renseigner un nouveau mot de passe.";
        }

        if (!password_verify($userAccountCurrentPassword, $getCurrentPassword["account_password"])) {
            $arrayErrors["userAccountCurrentPassword"] = "Le mot de passe est incorrect.";
        }
    } else {
        $arrayErrors["userAccountCurrentPassword"] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial. (8 à 25 caractères).";
    }

    if ($_POST["userAccountNewPassword"] === $_POST["userAccountConfirmNewPassword"]) {
        if (preg_match($regexPassword, $_POST["userAccountNewPassword"])) {
            $arrayUpdateAccountInformations["userAccountNewPassword"] = password_hash($_POST["userAccountNewPassword"], PASSWORD_BCRYPT);
        } else {
            $arrayErrors["userAccountNewPassword"] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial. (8 à 25 caractères).";
        }
    } else {
        $arrayErrors["userAccountConfirmNewPassword"] = "Les mots de passe renseignés ne sont pas identiques !";
    }

    if (empty($arrayErrors)) {
        if ($user->updateAccountPassword($arrayUpdateAccountInformations)) {
            $_SESSION["userAccount"]["password"] = $arrayUpdateAccountInformations["userAccountNewPassword"];
            $_SESSION["updateAccountConfirmMessage"] = "<i class=\"fas fa-check\"></i> Mot de passe modifié.";
            header("Location: account.php");
            exit();
        }
    }
}
