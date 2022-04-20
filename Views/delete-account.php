<?php

require_once "../Controllers/delete-account-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Supprimer mon compte</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <div class="container-large-responsive">

            <h1 class="title-custom">Gestion avancée</h1>

            <a class="return-block" href="account.php"><i class="fas fa-angle-left"></i> Retour</a>

            <div class="account-block">

                <h2 class="text-center"><i class="fas fa-user-times"></i> Suppression du compte</h2>
                <p class="title-block-content text-center">Entrez votre mot de passe pour confirmer la suppression. <span class="warning-message">Attention, cette action est irréversible !</span> </p>

                <div class="forms-block">
                    <div>

                        <div class="account-modify-block">

                            <form class="forms-style margin-top" action="delete-account.php" method="post">

                                <div>
                                    <label for="userAccountCurrentPassword">Mot de passe actuel</label>
                                </div>
                                <div>
                                    <input type="password" id="userAccountCurrentPassword" name="userAccountCurrentPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                                </div>

                                <p class="form-display-message">
                                    <?= isset($arrayErrors["userAccountCurrentPassword"]) ? $arrayErrors["userAccountCurrentPassword"] : "" ?>
                                </p>

                                <div class="red-button margin-top">
                                    <button type="submit" name="deleteAccountButton">Supprimer mon compte</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>

</body>

</html>