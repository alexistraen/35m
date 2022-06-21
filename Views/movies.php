<?php

require_once "../Controllers/movies-controller.php";
require_once "../includes/common_functions.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Les affiches</title>
</head>

<body>

    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <?php include "../includes/search-bar.php"; ?>

        <div id="cardContainer" class="movie-card-container">

            <?php
            if (!empty($movieInformations)) {
                foreach ($movieInformations as $key => $value) {
            ?>

                    <div class="movie-card">

                        <p class="card-year"><?= date("Y", strtotime($value["movie_release_date"])) ?></p>

                        <div class="movie-picture-container">
                            <a href="../movie/<?= $value["movie_id"] . "-" . cleanMovieTitleUrl($value["movie_title"])?>"><img src="../uploads/affiches/<?= $value["movie_picture"] ?>" alt="Affiche de <?= $value["movie_title"] ?>"></a>
                        </div>

                        <?php
                        if (isset($_SESSION["userAccount"])) {
                        ?>

                            <div class="container-button-movie">

                                <?php
                                if ($user->userHasSeenMovie($getSeenList["user_list_id"], $value["movie_id"])) {
                                ?>
                                    <button type="button" value="<?= $value["movie_id"] ?>" class="add-movie-button">&#10084;</button>
                                <?php
                                } else {
                                ?>
                                    <button type="button" value="<?= $value["movie_id"] ?>" class="remove-movie-button">&#10006;</button>
                                <?php
                                }
                                ?>

                            </div>

                        <?php
                        }
                        ?>

                        <p class="movie-card-title p-movie-all"><?= $value["movie_title"] ?></p>

                    </div>

            <?php
                }
            }
            ?>

        </div>

        <div class="pagination">
            <?php
            if (isset($totalPages)) {
                if ($actualPage != 1) {
            ?>
                    <a class="previousNextPages" href="movies?page=<?= $actualPage > 1 ? $actualPage - 1 : 1 ?>">Précédent</a>
                    <?php
                }
                for ($page = $actualPage - $sidePages; $page < $actualPage; $page++) {
                    if ($page > 0) {
                    ?>
                        <a class="sidePages" href="movies?page=<?= $page ?>"><?= $page ?></a>
                <?php
                    }
                }
                ?>

                <span class="actualPage"><?= $actualPage ?></span>

                <?php
                for ($page = $actualPage + 1; $page <= $totalPages; $page++) {
                    if ($page <= $actualPage + $sidePages) {
                ?>
                        <a class="sidePages" href="movies?page=<?= $page ?>"><?= $page ?></a>
                    <?php
                    }
                }

                if ($actualPage != $totalPages) {
                    ?>
                    <a class="previousNextPages" href="movies?page=<?= $actualPage < $totalPages ? $actualPage + 1 : $totalPages ?>">Suivant</a>
            <?php
                }
            }
            ?>
        </div>

    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/d89aa1e4ce.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/find-movie.js"></script>
    <script src="../assets/js/add-remove-seen-movie.js"></script>
</body>

</html>