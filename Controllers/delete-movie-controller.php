<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";
require_once "../Models/Movies.php";

if (!isset($_SESSION["userAccount"]) || $_SESSION["userAccount"]["role"] != "admin") {
    header("Location: ../index.php");
}

if (empty($_POST)) {
    header("Location: dashboard.php");
}

if (isset($_POST["deleteMovieButton"])) {

    $regexId = "/^[0-9]+$/";
    $movieId = htmlspecialchars($_POST["deleteMovieButton"]);

    if (preg_match($regexId, $movieId)) {

        $movie = new Movies();

        $securedMovieId = (int)$movieId;
        $movieInformations = $movie->getMovieMinimumInformations($securedMovieId);
    } else {
        header("Location: dashboard.php");
    }
}

if (isset($_POST["deleteMovieConfirmButton"])) {

    $regexId = "/^[0-9]+$/";
    $regexPassword = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,25}$/";
    $arrayErrors = [];

    $accountId = htmlspecialchars($_SESSION["userAccount"]["id"]);
    $movieId = htmlspecialchars($_POST["deleteMovieConfirmButton"]);

    if (preg_match($regexId, $accountId)) {
        $securedAccountId = (int)$accountId;
    } else {
        $arrayErrors["userAccountId"] = "Une erreur s'est produite.";
    }

    if (preg_match($regexId, $movieId)) {
        $movie = new Movies();
        $securedMovieId = (int)$movieId;
        $movieInformations = $movie->getMovieMinimumInformations($securedMovieId);
    } else {
        $arrayErrors["movieId"] = "Une erreur s'est produite.";
    }

    if (preg_match($regexPassword, $_POST["userAccountCurrentPassword"])) {

        $user = new Users();
        $userAccountCurrentPassword = $_POST["userAccountCurrentPassword"];
        $getCurrentPassword = $user->getCurrentPassword($securedAccountId);

        if (password_verify($userAccountCurrentPassword, $getCurrentPassword["account_password"])) {
            if (file_exists("../uploads/affiches/" . $movieInformations["movie_picture"])) {
                if (!unlink("../uploads/affiches/" . $movieInformations["movie_picture"])) {
                    $arrayErrors["moviePicture"] = "L'ancienne affiche n'a pas pu être supprimée. Nom du fichier : " . $movieInformations["movie_picture"];
                }
            }
        } else {
            $arrayErrors["userAccountCurrentPassword"] = "Le mot de passe est incorrect.";
        }
    } else {
        $arrayErrors["userAccountCurrentPassword"] = "Le mot de passe doit contenir au moins une lettre, un chiffre et un caractère spécial. (8 à 25 caractères).";
    }

    if (empty($arrayErrors)) {

        if ($movie->deleteMovieById($securedMovieId)) {
            $_SESSION["deleteMovieSuccess"] = "<i class=\"fas fa-check\"></i> Affiche supprimée";
            header("Location: dashboard.php");
        } else {
            $arrayErrors["deleteMovie"] = "Une erreur s'est produite lors de la suppression de l'affiche.";
        }
    }
}
