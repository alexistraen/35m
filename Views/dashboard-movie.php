<?php

require_once "../Controllers/dashboard-movie-controller.php";

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

        <div class="container-large-responsive">

            <h1 class="title-custom">Tableau de bord</h1>

            <a class="return-block" href="dashboard.php"><i class="fas fa-angle-left"></i> Retour</a>

            <div id="block-responsive">

                <div class="dashboard-block">

                    <h2><i class="fas fa-edit"></i> Modifier l'affiche</h2>

                    <form class="dashboard-form" enctype="multipart/form-data" action="dashboard-movie.php" method="post">

                        <p class="form-large-message">
                            <?= isset($arrayErrors["updateMovieInvalidId"]) ? $arrayErrors["updateMovieInvalidId"] : "" ?>
                        </p>

                        <div class="form-margin-top">
                            <label for="movieTitle">Titre</label>
                        </div>
                        <div>
                            <input type="text" id="movieTitle" name="movieTitle" placeholder="Alien" value="<?= isset($_POST["movieTitle"]) ? $_POST["movieTitle"] : $movieInformations["movie_title"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieTitle"]) ? $arrayErrors["movieTitle"] : "" ?>
                            <?= isset($arraySuccess["movieTitle"]) ? $arraySuccess["movieTitle"] : "" ?>
                        </p>

                        <p>Affiche actuelle</p>

                        <div class="container-picture-dashboard">
                            <img src="../uploads/affiches/<?= isset($movieInformations["movie_picture"]) ? $movieInformations["movie_picture"] : "" ?>" alt="Affiche de <?= isset($movieInformations["movie_title"]) ? $movieInformations["movie_title"] : "" ?>">
                        </div>

                        <div>
                            <label for="moviePicture">Sélectionner une nouvelle affiche (max. 2Mo)</label>
                        </div>

                        <div>
                            <input type="file" id="moviePicture" name="moviePicture" accept=".png, .jpg">
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["moviePicture"]) ? $arrayErrors["moviePicture"] : "" ?>
                            <span class="success-darker-message"><?= isset($arraySuccess["moviePicture"]) ? $arraySuccess["moviePicture"] : "" ?></span>
                        </p>

                        <div class="margin-bot-2">
                            <label for="movieRemoveOldPicture">Supprimer l'affiche actuelle</label>
                        </div>

                        <div class="radio-custom-block">
                            <div class="radio-center">
                                <input class="radio-custom" type="radio" id="movieRemoveOldPicture" name="movieRemoveOldPicture" value="Oui" <?= isset($_POST["movieRemoveOldPicture"]) && $_POST["movieRemoveOldPicture"] == "Oui" ? "checked" : "" ?>></input>
                                <label class="radio-margin-label" for="movieRemoveOldPicture">Oui</label>
                                <input class="radio-custom" type="radio" id="movieRemoveOldPicture" name="movieRemoveOldPicture" value="Non" <?= isset($_POST["movieRemoveOldPicture"]) && $_POST["movieRemoveOldPicture"] == "Oui" ? "" : "checked" ?>></input>
                                <label for="movieRemoveOldPicture">Non</label>
                            </div>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieRemoveOldPicture"]) ? $arrayErrors["movieRemoveOldPicture"] : "" ?>
                            <?= isset($arraySuccess["movieRemoveOldPicture"]) ? $arraySuccess["movieRemoveOldPicture"] : "" ?>
                        </p>

                        <div>
                            <label for="movieGender">Genre</label>
                        </div>
                        <div>
                            <input type="text" id="movieGender" name="movieGender" placeholder="Horreur" value="<?= isset($_POST["movieGender"]) ? $_POST["movieGender"] : $movieInformations["movie_gender"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieGender"]) ? $arrayErrors["movieGender"] : "" ?>
                            <?= isset($arraySuccess["movieGender"]) ? $arraySuccess["movieGender"] : "" ?>
                        </p>

                        <div>
                            <label for="movieDuration">Durée</label>
                        </div>
                        <div>
                            <input type="text" id="movieDuration" name="movieDuration" placeholder="1h56" value="<?= isset($_POST["movieDuration"]) ? $_POST["movieDuration"] : $movieInformations["movie_duration"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieDuration"]) ? $arrayErrors["movieDuration"] : "" ?>
                            <?= isset($arraySuccess["movieDuration"]) ? $arraySuccess["movieDuration"] : "" ?>
                        </p>

                        <div>
                            <label for="movieNationality">Pays d'origine</label>
                        </div>
                        <div>
                            <input type="text" id="movieNationality" name="movieNationality" placeholder="États-Unis, Royaume-Uni" value="<?= isset($_POST["movieNationality"]) ? $_POST["movieNationality"] : $movieInformations["movie_nationality"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieNationality"]) ? $arrayErrors["movieNationality"] : "" ?>
                            <?= isset($arraySuccess["movieNationality"]) ? $arraySuccess["movieNationality"] : "" ?>
                        </p>

                        <div>
                            <label for="movieReleaseDate">Date de sortie</label>
                        </div>
                        <div>
                            <input type="date" id="movieReleaseDate" name="movieReleaseDate" value="<?= isset($_POST["movieReleaseDate"]) ? $_POST["movieReleaseDate"] : $movieInformations["movie_release_date"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieReleaseDate"]) ? $arrayErrors["movieReleaseDate"] : "" ?>
                            <?= isset($arraySuccess["movieReleaseDate"]) ? $arraySuccess["movieReleaseDate"] : "" ?>
                        </p>

                        <div>
                            <label for="movieDirector">Réalisateur</label>
                        </div>
                        <div>
                            <input type="text" id="movieDirector" name="movieDirector" placeholder="Ridley Scott" value="<?= isset($_POST["movieDirector"]) ? $_POST["movieDirector"] : $movieInformations["movie_director"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieDirector"]) ? $arrayErrors["movieDirector"] : "" ?>
                            <?= isset($arraySuccess["movieDirector"]) ? $arraySuccess["movieDirector"] : "" ?>
                        </p>

                        <div>
                            <label for="movieWritters">Scénaristes</label>
                        </div>
                        <div>
                            <input type="text" id="movieWritters" name="movieWritters" placeholder="Dan O'Bannon, Walter Hill" value="<?= isset($_POST["movieWritters"]) ? $_POST["movieWritters"] : $movieInformations["movie_writters"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieWritters"]) ? $arrayErrors["movieWritters"] : "" ?>
                            <?= isset($arraySuccess["movieWritters"]) ? $arraySuccess["movieWritters"] : "" ?>
                        </p>

                        <div>
                            <label for="movieCasting">Acteurs</label>
                        </div>
                        <div>
                            <input type="text" id="movieCasting" name="movieCasting" placeholder="Sigourney Weaver, Tom Skerritt, Veronica Cartwright" value="<?= isset($_POST["movieCasting"]) ? $_POST["movieCasting"] : $movieInformations["movie_casting"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieCasting"]) ? $arrayErrors["movieCasting"] : "" ?>
                            <?= isset($arraySuccess["movieCasting"]) ? $arraySuccess["movieCasting"] : "" ?>
                        </p>

                        <div>
                            <label for="movieSynopsis">Synopsis</label>
                        </div>
                        <div>
                            <textarea type="text" id="movieSynopsis" name="movieSynopsis" placeholder="Durant le voyage de retour d'un immense cargo spatial en mission commerciale de routine, ses passagers, cinq hommes et deux femmes plongés en hibernation, sont tirés de leur léthargie dix mois plus tôt que prévu par Mother, l'ordinateur de bord. Ce dernier a en effet capté dans le silence interplanétaire des signaux sonores, et suivant une certaine clause du contrat de navigation, les astronautes sont chargés de prospecter tout indice de vie dans l'espace." required><?= isset($_POST["movieSynopsis"]) ? $_POST["movieSynopsis"] : $movieInformations["movie_synopsis"] ?></textarea>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieSynopsis"]) ? $arrayErrors["movieSynopsis"] : "" ?>
                            <?= isset($arraySuccess["movieSynopsis"]) ? $arraySuccess["movieSynopsis"] : "" ?>
                        </p>

                        <div>
                            <label for="movieTrailer">Bande annonce</label>
                        </div>
                        <div>
                            <input type="url" id="movieTrailer" name="movieTrailer" placeholder="https://www.youtube.com/watch?v=LjLamj-b0I8" value="<?= isset($_POST["movieTrailer"]) ? $_POST["movieTrailer"] : $movieInformations["movie_trailer"] ?>" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["movieTrailer"]) ? $arrayErrors["movieTrailer"] : "" ?>
                            <?= isset($arraySuccess["movieTrailer"]) ? $arraySuccess["movieTrailer"] : "" ?>
                            <?= isset($arrayErrors["updateMovie"]) ? $arrayErrors["updateMovie"] : "" ?>
                        </p>

                        <div class="form-button">
                            <button type="submit" name="updateMovieButton" value="<?= isset($securedId) ? $securedId : "" ?>">Valider</button>
                        </div>

                    </form>

                </div>

                <div class="vertical-separator"></div>
                <div class="horizontal-separator"></div>

                <div class="dashboard-block">

                    <h2><i class="fas fa-trash-alt"></i> Supprimer l'affiche</h2>

                    <p class="title-block-content">Une confirmation par mot de passe sera nécessaire.</p>

                    <form enctype="multipart/form-data" action="delete-movie.php" method="post">
                        <div class="red-button margin-top-2">
                            <button type="submit" name="deleteMovieButton" value="<?= isset($securedId) ? $securedId : "" ?>">Supprimer l'affiche</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>

</body>

</html>