<?php

require_once "../Controllers/my-movies-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Mes films</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <div class="container-large-responsive">

            <h1 class="title-custom">Mes films</h1>

            <div id="block-responsive">

                <div class="dashboard-block">

                    <p class="list-name">
                        <a href="liked-movies.php?list=<?= $likedMovies ?>"><i class="fas fa-heart"></i> Coups de coeur</a>
                    </p>

                </div>

                <div class="vertical-separator"></div>
                <div class="horizontal-separator"></div>

                <div class="dashboard-block">

                    <p class="list-name">
                        <a href="liked-movies.php?list=<?= $toWatchMovies ?>"><i class="fas fa-clock"></i> À regarder</a>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/find-movie.js"></script>

</body>

</html>