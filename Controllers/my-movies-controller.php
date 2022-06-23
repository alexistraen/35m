<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/UserMovies.php";

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../index.php");
}

$lists = new UserLists;

$secureId = $_SESSION["userAccount"]["id"];
$likedMovies = (int)$lists->getLikedMoviesId($secureId);
$toWatchMovies = (int)$lists->getToWatchMoviesId($secureId);