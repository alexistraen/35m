<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";
require_once "../Models/UserMovies.php";

if (isset($_SESSION["userAccount"])) {
    if (isset($_POST["movieId"])) {

        $user = new Users();
        $list = new UserLists();

        $seenListId = $list->getToWatchMoviesId($_SESSION["userAccount"]["id"]);

        // On force l'int pour passer les valeurs dans la fonction
        $movieId = intval($_POST["movieId"]);

        $userHasSeenMovie = $user->userHasSeenMovie($seenListId, $movieId);

        if ($userHasSeenMovie) {

            if ($list->removeMovieInSeenList($seenListId, $movieId)) {
                echo json_encode(true);
            }

        } else {
            
            $time = time();
            $dateTime = date("Y-m-d h:m:s");

            if ($list->addMovieInSeenList($seenListId, $movieId, $dateTime)) {
                echo json_encode(false);
            }
        }
    }
}