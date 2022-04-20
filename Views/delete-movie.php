<?php

require_once "../Controllers/delete-movie-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Supprimer une affiche</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <div class="container-large-responsive">

            <h1 class="title-custom">Tableau de bord</h1>

            
            <form class="return-dashboard" action="dashboard-movie.php" method="POST">
                <button type="submit" name="editMovieButton" value="<?= isset($securedMovieId) ? $securedMovieId : "" ?>"><i class="fas fa-angle-left"></i> Retour</button>
                
            </form>

            <div class="account-block">

                <h2 class="text-center"><i class="fas fa-user-times"></i> Suppression d'une affiche</h2>

                <div class="delete-movie-card">
                    <div>
                        <p><?= isset($movieInformations["movie_title"]) ? $movieInformations["movie_title"] : "" ?> (<?= isset($movieInformations["movie_release_date"]) ? strftime("%Y", strtotime($movieInformations["movie_release_date"])) : "" ?>)</p>
                        <img src="../uploads/affiches/<?= isset($movieInformations["movie_picture"]) ? $movieInformations["movie_picture"] : "" ?>" alt="Affiche de <?= isset($movieInformations["movie_title"]) ? $movieInformations["movie_title"] : "" ?>">
                    </div>
                </div>

                <p class="title-block-content text-center">Entrez votre mot de passe pour confirmer la suppression. <span class="warning-message">L'affiche sera définitivement supprimée !</span> </p>

                <div id="custom-delete-movie-input">
                    <form class="dashboard-form margin-top-2" action="delete-movie.php" method="post">

                        <div class="text-center">
                            <label for="userAccountCurrentPassword">Mot de passe actuel</label>
                        </div>
                        <div>
                            <input type="password" id="userAccountCurrentPassword" name="userAccountCurrentPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                        </div>

                        <p class="form-large-message">
                            <?= isset($arrayErrors["userAccountCurrentPassword"]) ? $arrayErrors["userAccountCurrentPassword"] : "" ?>
                            <?= isset($arrayErrors["deleteMovie"]) ? $arrayErrors["deleteMovie"] : "" ?>
                        </p>

                        <div class="red-button margin-top">
                            <button type="submit" name="deleteMovieConfirmButton" value="<?= isset($securedMovieId) ? $securedMovieId : "" ?>">Supprimer l'affiche</button>
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