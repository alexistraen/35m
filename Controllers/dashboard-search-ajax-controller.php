<?php

require_once "../Models/Database.php";
require_once "../Models/Movies.php";

if (isset($_GET["dashboardSearchMovie"])) {

    $movie = new Movies();

    $dashbordSearchMovie = htmlspecialchars($_GET["dashboardSearchMovie"]);
    $dashboardSeachMovieQuery = "%" . $dashbordSearchMovie . "%";
    $dashboardSearchMovieResult = $movie->dashboardSearchMovie($dashboardSeachMovieQuery);

    echo json_encode($dashboardSearchMovieResult);
}

if (isset($_GET["findMovie"])) {

    $movie = new Movies();

    $dashbordSearchMovie = htmlspecialchars($_GET["findMovie"]);
    $dashboardSeachMovieQuery = "%" . $dashbordSearchMovie . "%";
    $findMovieResult = $movie->findMovie($dashboardSeachMovieQuery);

    echo json_encode($findMovieResult);
}
