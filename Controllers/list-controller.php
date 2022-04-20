<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Lists.php";
require_once "../Models/Movies.php";

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../index.php");
}

if (empty($_GET["list"])) {
    header("Location: lists");
}

$list = new UserLists;
$movieList = $list->getMoviesFromList($_GET["list"]);
$listName = $list->getListName($_GET["list"]);