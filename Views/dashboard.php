<?php

require_once "../Controllers/dashboard-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Tableau de bord</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <?php
        if (isset($_SESSION["addMovieSuccess"])) {
        ?>
            <p class="banner-success-message"><?= $_SESSION["addMovieSuccess"] ?></p>
        <?php
            unset($_SESSION["addMovieSuccess"]);
        }

        if (isset($_SESSION["updateMovieSuccess"])) {
        ?>
            <p class="banner-success-message"><?= $_SESSION["updateMovieSuccess"] ?></p>
        <?php
            unset($_SESSION["updateMovieSuccess"]);
        }

        if (isset($_SESSION["deleteMovieSuccess"])) {
        ?>
            <p class="banner-success-message"><?= $_SESSION["deleteMovieSuccess"] ?></p>
        <?php
            unset($_SESSION["deleteMovieSuccess"]);
        }
        ?>

        <div class="container-large-responsive">

            <h1 class="title-custom">Tableau de bord</h1>

            <div id="block-responsive">

                <div class="dashboard-block">

                    <h2><i class="fas fa-folder-plus"></i> Ajouter une affiche</h2>

                    <form class="dashboard-form" enctype="multipart/form-data" action="dashboard.php" method="post">

                        <div class="form-margin-top">
                            <label for="movieTitle">Titre</label>
                        </div>
                        <div>
                            <input type="text" id="movieTitle" name="movieTitle" placeholder="Alien" value="<?= isset($_POST["movieTitle"]) ? $_POST["movieTitle"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieTitle"]) ? $arrayErrors["movieTitle"] : "" ?>
                            <?= isset($arraySuccess["movieTitle"]) ? $arraySuccess["movieTitle"] : "" ?>
                        </p>

                        <div>
                            <label for="moviePicture">Affiche (max. 2Mo)</label>
                        </div>
                        <div>
                            <input type="file" id="moviePicture" name="moviePicture" accept=".png, .jpg" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["moviePicture"]) ? $arrayErrors["moviePicture"] : "" ?>
                            <span class="success-darker-message"><?= isset($arraySuccess["moviePicture"]) ? $arraySuccess["moviePicture"] : "" ?></span>
                        </p>

                        <div>
                            <label for="movieGender">Genre</label>
                        </div>
                        <div>
                            <input type="text" id="movieGender" name="movieGender" placeholder="Horreur" value="<?= isset($_POST["movieGender"]) ? $_POST["movieGender"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieGender"]) ? $arrayErrors["movieGender"] : "" ?>
                            <?= isset($arraySuccess["movieGender"]) ? $arraySuccess["movieGender"] : "" ?>
                        </p>

                        <div>
                            <label for="movieDuration">Durée</label>
                        </div>
                        <div>
                            <input type="text" id="movieDuration" name="movieDuration" placeholder="1h56" value="<?= isset($_POST["movieDuration"]) ? $_POST["movieDuration"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieDuration"]) ? $arrayErrors["movieDuration"] : "" ?>
                            <?= isset($arraySuccess["movieDuration"]) ? $arraySuccess["movieDuration"] : "" ?>
                        </p>

                        <div>
                            <label for="movieNationality">Pays d'origine</label>
                        </div>
                        <div>
                            <input type="text" id="movieNationality" name="movieNationality" placeholder="États-Unis, Royaume-Uni" value="<?= isset($_POST["movieNationality"]) ? $_POST["movieNationality"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieNationality"]) ? $arrayErrors["movieNationality"] : "" ?>
                            <?= isset($arraySuccess["movieNationality"]) ? $arraySuccess["movieNationality"] : "" ?>
                        </p>

                        <div>
                            <label for="movieReleaseDate">Date de sortie</label>
                        </div>
                        <div>
                            <input type="date" id="movieReleaseDate" name="movieReleaseDate" value="<?= isset($_POST["movieReleaseDate"]) ? $_POST["movieReleaseDate"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieReleaseDate"]) ? $arrayErrors["movieReleaseDate"] : "" ?>
                            <?= isset($arraySuccess["movieReleaseDate"]) ? $arraySuccess["movieReleaseDate"] : "" ?>
                        </p>

                        <div>
                            <label for="movieDirector">Réalisateur</label>
                        </div>
                        <div>
                            <input type="text" id="movieDirector" name="movieDirector" placeholder="Ridley Scott" value="<?= isset($_POST["movieDirector"]) ? $_POST["movieDirector"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieDirector"]) ? $arrayErrors["movieDirector"] : "" ?>
                            <?= isset($arraySuccess["movieDirector"]) ? $arraySuccess["movieDirector"] : "" ?>
                        </p>

                        <div>
                            <label for="movieWritters">Scénaristes</label>
                        </div>
                        <div>
                            <input type="text" id="movieWritters" name="movieWritters" placeholder="Dan O'Bannon, Walter Hill" value="<?= isset($_POST["movieWritters"]) ? $_POST["movieWritters"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieWritters"]) ? $arrayErrors["movieWritters"] : "" ?>
                            <?= isset($arraySuccess["movieWritters"]) ? $arraySuccess["movieWritters"] : "" ?>
                        </p>

                        <div>
                            <label for="movieCasting">Acteurs</label>
                        </div>
                        <div>
                            <input type="text" id="movieCasting" name="movieCasting" placeholder="Sigourney Weaver, Tom Skerritt, Veronica Cartwright" value="<?= isset($_POST["movieCasting"]) ? $_POST["movieCasting"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieCasting"]) ? $arrayErrors["movieCasting"] : "" ?>
                            <?= isset($arraySuccess["movieCasting"]) ? $arraySuccess["movieCasting"] : "" ?>
                        </p>

                        <div>
                            <label for="movieSynopsis">Synopsis</label>
                        </div>
                        <div>
                            <textarea type="text" id="movieSynopsis" name="movieSynopsis" placeholder="Durant le voyage de retour d'un immense cargo spatial en mission commerciale de routine, ses passagers, cinq hommes et deux femmes plongés en hibernation, sont tirés de leur léthargie dix mois plus tôt que prévu par Mother, l'ordinateur de bord. Ce dernier a en effet capté dans le silence interplanétaire des signaux sonores, et suivant une certaine clause du contrat de navigation, les astronautes sont chargés de prospecter tout indice de vie dans l'espace." required><?= isset($_POST["movieSynopsis"]) ? $_POST["movieSynopsis"] : "" ?></textarea>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieSynopsis"]) ? $arrayErrors["movieSynopsis"] : "" ?>
                            <?= isset($arraySuccess["movieSynopsis"]) ? $arraySuccess["movieSynopsis"] : "" ?>
                        </p>

                        <div>
                            <label for="movieTrailer">Bande annonce</label>
                        </div>
                        <div>
                            <input type="url" id="movieTrailer" name="movieTrailer" placeholder="https://www.youtube.com/watch?v=LjLamj-b0I8" value="<?= isset($_POST["movieTrailer"]) ? $_POST["movieTrailer"] : "" ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieTrailer"]) ? $arrayErrors["movieTrailer"] : "" ?>
                            <?= isset($arraySuccess["movieTrailer"]) ? $arraySuccess["movieTrailer"] : "" ?>
                            <?= isset($arrayErrors["addMovie"]) ? $arrayErrors["movieTitle"] : "" ?>
                        </p>

                        <div class="form-button">
                            <button type="submit" name="addMovieButton">Valider</button>
                        </div>

                    </form>

                </div>

                <div class="vertical-separator"></div>
                <div class="horizontal-separator"></div>

                <div class="dashboard-block">

                    <h2><i class="fas fa-edit"></i> Modifier / supprimer une affiche</h2>

                    <form class="dashboard-form margin-bot" action="dashboard.php" method="get">

                        <div class="form-margin-top">
                            <label for="dashboardSearchMovie">Rechercher une affiche</label>
                        </div>
                        <div class="dashboard-search-movie">
                            <input type="text" name="dashboardSearchMovie" id="dashboardSearchMovie">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>

                    </form>

                    <div id="dashboardMovieResult"></div>

                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/dashboard-search.js"></script>

</body>

</html>