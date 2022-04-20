<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Movies.php";

if (!isset($_SESSION["userAccount"]) || $_SESSION["userAccount"]["role"] != "admin") {
    header("Location: ../index.php");
}

if (isset($_POST["addMovieButton"])) {

    // Regex for text inputs with 3 differents sizes
    $regexTextSmall = "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ_\-\():!?.,' ]{0,100}$/";
    $regexTextMedium = "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ_\-\():!?.,' ]{0,300}$/";
    $regexTextLarge = "/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸ_\-\():!?.,' ]{0,1000}$/";
    // Regex for release date
    $regexDate = "/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/";
    // Regex for movie duration
    $regexDuration = "/[0-9]{1,2}[h|m]{1}[0-9]{0,2}$/";
    // Arrays for errors and success messages display
    $arrayErrors = [];
    $arraySuccess = [];
    // Array for stock secure input values
    $arrayMovieInformations = [];

    // Title field
    if (!preg_match($regexTextSmall, $_POST["movieTitle"])) {
        $arrayErrors["movieTitle"] = "Le titre contient un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieTitle"] = htmlspecialchars($_POST["movieTitle"]);
        $arraySuccess["movieTitle"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Picture field
    if (isset($_FILES["moviePicture"]) && $_FILES["moviePicture"]["error"] == 0) {

        $allowedExtensions = array('.png', '.jpeg', '.jpg');
        $uploadedFileExtension = strrchr($_FILES['moviePicture']['name'], '.');

        $AllowedExtensionsType = array('image/png', 'image/jpeg');
        $uploadedFileType = mime_content_type($_FILES['moviePicture']['tmp_name']);

        if (in_array($uploadedFileExtension, $allowedExtensions) && in_array($uploadedFileType, $AllowedExtensionsType)) {

            $fileSize = $_FILES['moviePicture']['size'];
            $maxSize = 1024 * 1024 * 2;

            if ($fileSize <= $maxSize) {
                $arraySuccess["moviePicture"] = "<i class=\"fas fa-check\"></i> L'affiche doit être re-sélectionnée avant l'envoi du formulaire";
            } else {
                $arrayErrors["moviePicture"] = "La taille du fichier doit être inférieure à 2Mo.";
            }
        } else {
            $arrayErrors["moviePicture"] = "Le fichier n'est pas une image.";
        }
    } else {
        $arrayErrors["moviePicture"] = "Une erreur s'est produite.";
    }

    // Gender field
    if (!preg_match($regexTextSmall, $_POST["movieGender"])) {
        $arrayErrors["movieGender"] = "Le genre contient un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieGender"] = htmlspecialchars($_POST["movieGender"]);
        $arraySuccess["movieGender"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Duration field
    if (!preg_match($regexDuration, $_POST["movieDuration"])) {
        $arrayErrors["movieDuration"] = "La durée renseignée n'est pas correcte.";
    } else {
        $arrayMovieInformations["movieDuration"] = htmlspecialchars($_POST["movieDuration"]);
        $arraySuccess["movieDuration"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Nationality field
    if (!preg_match($regexTextSmall, $_POST["movieNationality"])) {
        $arrayErrors["movieNationality"] = "Le pays d'origine contient un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieNationality"] = htmlspecialchars($_POST["movieNationality"]);
        $arraySuccess["movieNationality"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Date field
    if (!preg_match($regexDate, $_POST["movieReleaseDate"])) {
        $arrayErrors["movieReleaseDate"] = "Le format de date n'est pas respecté.";
    } else {
        $arrayMovieInformations["movieReleaseDate"] = htmlspecialchars($_POST["movieReleaseDate"]);
        $arraySuccess["movieReleaseDate"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Director field
    if (!preg_match($regexTextSmall, $_POST["movieDirector"])) {
        $arrayErrors["movieDirector"] = "Le réalisateur contient un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieDirector"] = htmlspecialchars($_POST["movieDirector"]);
        $arraySuccess["movieDirector"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Writters field
    if (!preg_match($regexTextSmall, $_POST["movieWritters"])) {
        $arrayErrors["movieWritters"] = "Les scénaristes contiennent un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieWritters"] = htmlspecialchars($_POST["movieWritters"]);
        $arraySuccess["movieWritters"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Casting field
    if (!preg_match($regexTextMedium, $_POST["movieCasting"])) {
        $arrayErrors["movieCasting"] = "Les acteurs contiennent un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieCasting"] = htmlspecialchars($_POST["movieCasting"]);
        $arraySuccess["movieCasting"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Synopsis field
    if (!preg_match($regexTextLarge, $_POST["movieSynopsis"])) {
        $arrayErrors["movieSynopsis"] = "Les acteurs contiennent un caractère non autorisé.";
    } else {
        $arrayMovieInformations["movieSynopsis"] = htmlspecialchars($_POST["movieSynopsis"]);
        $arraySuccess["movieSynopsis"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    // Trailer field
    if (!filter_var($_POST["movieTrailer"], FILTER_VALIDATE_URL)) {
        $arrayErrors["movieTrailer"] = "L'url de la bande annonce n'est pas valide.";
    } else {
        $arrayMovieInformations["movieTrailer"] = filter_input(INPUT_POST, "movieTrailer", FILTER_SANITIZE_URL);
        $arraySuccess["movieTrailer"] = "<i class=\"fas fa-check success-darker-message\"></i>";
    }

    if (empty($arrayErrors)) {

        $fileName = uniqid() . $uploadedFileExtension;
        $repertory = "../uploads/affiches/";

        if (move_uploaded_file($_FILES['moviePicture']['tmp_name'], $repertory . $fileName)) {
            $arrayMovieInformations["moviePicture"] = htmlspecialchars($fileName);
        } else {
            $arrayErrors["moviePicture"] = "Une erreur s'est produite lors de la tentative d'upload.";
        }
    }

    if (empty($arrayErrors)) {

        $movie = new Movies();

        if ($movie->addMovie($arrayMovieInformations)) {
            $_SESSION["addMovieSuccess"] = "<i class=\"fas fa-check\"></i> Affiche ajoutée ! (" . $arrayMovieInformations["movieTitle"] . ")";
            header("Location: dashboard.php");
            exit();
        } else {
            $arrayErrors["addMovie"] = "Une erreur s'est produite lors de l'ajout du film.";
        }
    }
}

if (isset($_GET["dashboardSearchMovie"])) {
    header("Location: dashboard.php");
}
