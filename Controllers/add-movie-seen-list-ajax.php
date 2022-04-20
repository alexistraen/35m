<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Users.php";
require_once "../Models/Lists.php";

if (isset($_SESSION["userAccount"])) {
    if (isset($_POST["movieId"])) {

        $user = new Users();
        $list = new UserLists();

        $seenListId = $user->getSeenListId($_SESSION["userAccount"]["id"]);

        // On force l'int pour passer les valeurs dans la fonction
        $movieId = intval($_POST["movieId"]);
        $listId = intval($seenListId["user_list_id"]);

        $userHasSeenMovie = $user->userHasSeenMovie($listId, $movieId);

        if ($userHasSeenMovie) {

            if ($list->removeMovieInSeenList($listId, $movieId)) {
                echo json_encode(true);
            }

        } else {
            
            $time = time();
            $dateTime = date("Y-m-d h:m:s");

            if ($list->addMovieInSeenList($listId, $movieId, $dateTime)) {
                echo json_encode(false);
            }
        }
    }
}