<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Movies.php";
require_once "../includes/common_functions.php";

if (isset($_GET["film"]) && isset($_GET["title"])) {

    $regexId = "/^[0-9]+$/";
    $movieId = htmlspecialchars($_GET["film"]);
    $urlTitle = htmlspecialchars($_GET["title"]);

    if (preg_match($regexId, $movieId)) {

        $movie = new Movies();

        if ($movie->checkIfMovieExists($movieId)) {
            
            $securedId = (int)$movieId;
            $movieInformations = $movie->getMovieInformations($securedId);

            $movieTitle = cleanMovieTitleUrl($movieInformations["movie_title"]);

            if (strcmp($movieTitle, $urlTitle) !== 0) {
                header("Location: " . $securedId . "-" . $movieTitle);
            }

        } else {
            header("Location: ../Views/movies.php");
        }
    } else {
        header("Location: movies.php");
    }
} else {
    header("Location: movies.php");
}
