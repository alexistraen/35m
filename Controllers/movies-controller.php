<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Movies.php";
require_once "../Models/Users.php";
require_once "../Models/UserMovies.php";

$movies = new Movies();

if (isset($_GET["findMovie"])) {
    header("Location: movies.php");
}

if (isset($_GET["page"])) {

    $regexPage = "/^[0-9]+$/";
    $actualPage = htmlspecialchars($_GET["page"]);

    if ($actualPage <= 0) {
        header("Location: movies?page=1");
    }

    if (preg_match($regexPage, $actualPage)) {
        $moviePerPage = 42;
        $countMovies = $movies->countMovies();
        $totalPages = ceil((int)$countMovies["totalMoviesNumber"] / $moviePerPage);

        $startId = ($actualPage - 1) * $moviePerPage;
        $movieInformations = $movies->getMoviesPaging($startId, $moviePerPage);
        $sidePages = 3;

        if ($_GET["page"] > $totalPages) {
            header("Location: movies?page=1");
        }
    } else {
        header("Location: movies?page=1");
    }
} else {
    header("Location: movies?page=1");
}

if (isset($_SESSION["userAccount"])) {
    if (!isset($getSeenList)) {
        $user = new Users();
        $getSeenList = $user->getSeenListId($_SESSION["userAccount"]["id"]);
    }
    if (!isset($getToWatchList)) {
        $userLists = new UserLists();
        $getToWatchList = $userLists->getToWatchMoviesId($_SESSION["userAccount"]["id"]);
    }
}
