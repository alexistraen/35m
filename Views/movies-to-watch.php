<?php

require_once "../Controllers/movies-to-watch-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Films à regarder</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>
        <?php include "../includes/search-bar.php"; ?>

        <div class="list-top-container">

            <button class="return-movie-details" onclick="goBack()"><i class="fas fa-angle-left"></i> Retour</button>

            <h1 class="text-center margin-top-2"><i class="fas fa-clock"></i> À regarder</h1>

        </div>

        <div class="movie-card-container">

            <?php
            if (!empty($movieList)) {
                foreach ($movieList as $key => $value) {
            ?>

                    <div class="movie-card">

                        <p class="card-year"><?= date("Y", strtotime($value["movie_release_date"])) ?></p>

                        <div class="movie-picture-container">
                            <a href="../movie?film=<?= $value["movie_id"]?>"><img src="../uploads/affiches/<?= $value["movie_picture"] ?>" alt="Affiche de <?= $value["movie_title"] ?>"></a>
                        </div>

                        <p class="movie-card-title p-movie-list"><?= $value["movie_title"] ?></p>
                        <p class="movie-card-add-date">Ajouté le <?= date("d-m-y", strtotime($value["movie_add_date"])) ?></p>

                    </div>

            <?php
                }
            }
            ?>

        </div>

    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/find-movie.js"></script>

</body>

</html>