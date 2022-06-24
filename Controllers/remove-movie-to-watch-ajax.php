<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";
require_once "../Models/UserMovies.php";

if (isset($_SESSION["userAccount"])) {
    if (isset($_POST["toWatchId"])) {

        $user = new Users();
        $list = new UserLists();

        $seenListId = $list->getToWatchMoviesId($_SESSION["userAccount"]["id"]);

        // On force l'int pour passer les valeurs dans la fonction
        $movieId = intval($_POST["toWatchId"]);
        $seenListIdInt = intval($seenListId);

        $userHasSeenMovie = $user->userHasSeenMovie($seenListIdInt, $movieId);

        if ($userHasSeenMovie) {

            if ($list->removeMovieInSeenList($seenListIdInt, $movieId)) {
                echo json_encode(true);
            }
        }
    }
}