<?php

require_once "../Controllers/account-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Mon compte</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <?php
        if (isset($_SESSION["updateAccountConfirmMessage"])) {
        ?>
            <p class="banner-success-message"><?= $_SESSION["updateAccountConfirmMessage"] ?></p>
        <?php
            unset($_SESSION["updateAccountConfirmMessage"]);
        }
        ?>

        <div class="container-large-responsive">

            <h1 class="title-custom">Gestion du compte</h1>

            <div id="block-responsive">

                <div class="account-block">
                    <h2><i class="fas fa-user"></i> Détails du compte</h2>
                    <p class="title-block-content">Nom de compte</p>
                    <p><?= isset($_SESSION["userAccount"]["name"]) ? "- " . $_SESSION["userAccount"]["name"] : "" ?></p>
                    <p class="title-block-content">Adresse email</p>
                    <p><?= isset($_SESSION["userAccount"]["email"]) ? "- " . $_SESSION["userAccount"]["email"] : "" ?></p>

                </div>

                <div class="vertical-separator"></div>
                <div class="horizontal-separator"></div>

                <div class="account-block">

                    <h2><i class="fas fa-user-edit"></i> Modifier mes informations</h2>
                    <p class="text-margin-top title-block-content">Pour changer votre mot de passe, saisissez d'abord le mot de passe actuel puis le nouveau (avec confirmation).</p>

                    <div class="forms-block">
                        <div>

                            <div class="account-modify-block">

                                <form class="forms-style" action="account.php" method="post">

                                    <p class="form-display-message">
                                        <?= isset($arrayErrors["userAccountId"]) ? $arrayErrors["userAccountId"] : "" ?>
                                    </p>

                                    <div class="form-margin-top">
                                        <label for="userAccountEmail">Adresse email</label>
                                    </div>
                                    <div>
                                        <input type="email" id="userAccountEmail" name="userAccountEmail" placeholder="gandalf.legris@valinor.com" value="<?= isset($_POST["userAccountEmail"]) ? $_POST["userAccountEmail"] : $_SESSION["userAccount"]["email"] ?>" required>
                                    </div>

                                    <p class="form-display-message">
                                        <?= isset($arrayErrors["userAccountEmail"]) ? $arrayErrors["userAccountEmail"] : "" ?>
                                        <?= isset($arraySuccess["userAccountEmail"]) ? $arraySuccess["userAccountEmail"] : "" ?>
                                    </p>

                                    <div class="form-button margin-bot">
                                        <button type="submit" id="updateAccountInfosButton" name="updateAccountInfosButton">Valider</button>
                                    </div>

                                </form>

                                <form class="forms-style" action="account.php" method="post">

                                    <div>
                                        <label for="userAccountCurrentPassword">Mot de passe actuel</label>
                                    </div>
                                    <div>
                                        <input type="password" id="userAccountCurrentPassword" name="userAccountCurrentPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                                    </div>

                                    <p class="form-display-message">
                                        <?= isset($arrayErrors["userAccountCurrentPassword"]) ? $arrayErrors["userAccountCurrentPassword"] : "" ?>
                                    </p>

                                    <div>
                                        <label for="userAccountNewPassword">Nouveau mot de passe</label>
                                    </div>
                                    <div>
                                        <input type="password" id="userAccountNewPassword" name="userAccountNewPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                                    </div>

                                    <p class="form-display-message">
                                        <?= isset($arrayErrors["userAccountNewPassword"]) ? $arrayErrors["userAccountNewPassword"] : "" ?>
                                        <?= isset($arrayErrors["userAccountConfirmNewPassword"]) ? $arrayErrors["userAccountConfirmNewPassword"] : "" ?>
                                    </p>

                                    <div>
                                        <label for="userAccountConfirmNewPassword">Nouveau mot de passe <span class="confirm-password">(Confirmation)</span></label>
                                    </div>
                                    <div>
                                        <input type="password" id="userAccountConfirmNewPassword" name="userAccountConfirmNewPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                                    </div>

                                    <p class="form-display-message">
                                        <?= isset($arrayErrors["userAccountNewPassword"]) ? $arrayErrors["userAccountNewPassword"] : "" ?>
                                        <?= isset($arrayErrors["userAccountConfirmNewPassword"]) ? $arrayErrors["userAccountConfirmNewPassword"] : "" ?>
                                    </p>

                                    <div class="form-button">
                                        <button type="submit" name="updateAccountPasswordButton">Valider</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-large-responsive">

            <h1 class="title-custom">Gestion avancée</h1>

            <div class="account-block">

                <h2 class="text-center"><i class="fas fa-user-times"></i> Suppression du compte</h2>
                <p class="title-block-content text-center">La suppression du compte nécessite une confirmation par mot de passe.</p>

                <form action="delete-account.php" method="post">

                    <div class="red-button margin-top-2">
                        <a href="delete-account.php">Supprimer mon compte</a>
                    </div>

                </form>

            </div>

        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>

</body>

</html>