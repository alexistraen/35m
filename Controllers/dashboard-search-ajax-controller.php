<?php

require_once "../Models/Database.php";
require_once "../Models/Movies.php";
require_once "../includes/common_functions.php";

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

    foreach ($findMovieResult as $key => $movie) {
        $titleUrl = cleanMovieTitleUrl($movie["movie_title"]);
        $findMovieResult[$key] += ["title_url" => $titleUrl];
    }

    echo json_encode($findMovieResult);
}
