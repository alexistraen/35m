<?php

require_once "../Controllers/movie-controller.php";

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - <?= $movieInformations["movie_title"] ?></title>
</head>

<body>

    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>
        <?php include "../includes/search-bar.php"; ?>

        <div class="movie-details-container">

            <button class="return-movie-details" onclick="goBack()"><i class="fas fa-angle-left"></i> Retour</button>

            <div class="movie-details-block">

                <div class="movie-details-content">
                    <img src="../uploads/affiches/<?= $movieInformations["movie_picture"] ?>" alt="Affiche de <?= $movieInformations["movie_title"] ?>">
                </div>

                <div class="movie-details-content-2">
                    <h1 class=text-center><?= $movieInformations["movie_title"] ?></h1>

                    <?php
                    if (isset($_SESSION["userAccount"])) {
                        if ($user->userHasSeenMovie($getSeenList["user_list_id"], $securedId)) {
                    ?>
                            <p class="add-movie-button-2">&#10084;</p>
                    <?php
                        }
                    }
                    ?>

                    <div class="container-type-duration-movie">
                        <h2 class="text-center movie-details-font-size"> <?= $movieInformations["movie_gender"] ?></h2>
                        <p class="text-center movie-details-font-size"><?= " <i class=\"far fa-clock movie-details-symbol-gold\"></i> " . $movieInformations["movie_duration"] ?></p>
                    </div>
                    <p><?= $movieInformations["movie_synopsis"] ?></p>
                </div>

                <div class="movie-details-infos">
                    <p class="text-center movie-details-title"><i class="fas fa-info-circle"></i> Infos sur le film</p>
                    <p><span class="text-color-movie">Réalisation</span></p>
                    <p class="margin-text-movie-infos"><?= $movieInformations["movie_director"] ?></p>
                    <p><span class="text-color-movie">Scénario</span></p>
                    <p class="margin-text-movie-infos"><?= $movieInformations["movie_writters"] ?></p>
                    <p><span class="text-color-movie">Acteurs principaux</span></p>
                    <p class="margin-text-movie-infos"><?= $movieInformations["movie_casting"] ?></p>
                    <div class="horizontal-separator-movie"></div>
                    <p><span class="text-color-movie">Pays d'origine</span></p>
                    <p class="margin-text-movie-infos"><?= $movieInformations["movie_nationality"] ?></p>
                    <p><span class="text-color-movie">Date de sortie</span></p>
                    <p><?= date("d/m/Y", strtotime($movieInformations["movie_release_date"])) ?></p>
                </div>

            </div>

            <p class="text-center title-text-trailer">Bande annonce</p>

            <div class="movie-details-trailer">
                <iframe class="responsive-iframe" src="<?= $movieInformations["movie_trailer"] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>

    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/d89aa1e4ce.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/find-movie.js"></script>
</body>

</html>