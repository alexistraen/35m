<?php

session_start();

require_once "../Models/Database.php";
require_once "../Models/Lists.php";

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../index.php");
}

$lists = new UserLists;

$secureId = $_SESSION["userAccount"]["id"];
$userLists = $lists->displayUserLists($secureId);