<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/UserMovies.php";
require_once "../Models/Movies.php";

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../index.php");
}

if (empty($_GET["list"])) {
    header("Location: my-movies");
}

$list = new UserLists;

$secureId = $_SESSION["userAccount"]["id"];
$likedMovies = (int)$list->getToWatchMoviesId($secureId);

if ($likedMovies != $_GET["list"]) {
    header("Location: my-movies");
}

$movieList = $list->getMoviesFromList($_GET["list"]);