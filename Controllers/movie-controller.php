<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Movies.php";
require_once "../Models/Users.php";

if (isset($_GET["film"])) {

    $regexId = "/^[0-9]+$/";
    $movieId = htmlspecialchars($_GET["film"]);

    if (preg_match($regexId, $movieId)) {

        $movie = new Movies();

        if ($movie->checkIfMovieExists($movieId)) {
            
            $securedId = (int)$movieId;
            $movieInformations = $movie->getMovieInformations($securedId);

        } else {
            header("Location: ../Views/movies.php");
        }
    } else {
        header("Location: movies.php");
    }
} else {
    header("Location: movies.php");
}

if (isset($_SESSION["userAccount"])) {
    if (!isset($getSeenList)) {
        $user = new Users();
        $getSeenList = $user->getSeenListId($_SESSION["userAccount"]["id"]);
    }
}
