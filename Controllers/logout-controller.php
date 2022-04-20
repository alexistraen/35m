<?php

session_start();

if (!isset($_SESSION["userAccount"])) {
    header("Location: ../");
}

if (isset($_POST["logoutButton"])) {
    session_destroy();
    header("Location: ../");
}