<?php

require_once "../Controllers/login-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Connexion</title>
</head>

<body>
    <div class="wrapper">
        <div class="forms-block">
            <div>
                <a href="../index.php"><img class="logoSize" src="../assets/img/logo.png" alt="Logo 35M"></a>

                <div class="forms-block-content">

                    <h1><i class="fas fa-user-circle"></i> Connexion</h1>

                    <form class="forms-style" action="login.php" method="post">

                        <?php
                        if (isset($_SESSION["registerSuccessMessage"])) {
                        ?>
                            <p class="form-display-message">
                                <span class="sucess-color-message"><?= $_SESSION["registerSuccessMessage"] ?></span>
                            </p>
                        <?php
                            unset($_SESSION["registerSuccessMessage"]);
                        }
                        ?>

                        <div>
                            <label for="userAccountName">Nom de compte</label>
                        </div>
                        <div>
                            <input type="text" id="userAccountName" name="userAccountName" placeholder="Gandalf" value="<?= isset($_POST["userAccountName"]) ? $_POST["userAccountName"] : "" ?>">
                        </div>

                        <p class="form-display-message">
                            <?= isset($arrayErrors["userAccountName"]) ? $arrayErrors["userAccountName"] : "" ?>
                        </p>

                        <div class="form-label-space">
                            <label for="userAccountPassword">Mot de passe</label>
                        </div>
                        <div>
                            <input type="password" id="userAccountPassword" name="userAccountPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;">
                        </div>

                        <p class="form-display-message">
                            <?= isset($arrayErrors["userAccountPassword"]) ? $arrayErrors["userAccountPassword"] : "" ?>
                            <?= isset($wrongAccountInformationsMessage) ? $wrongAccountInformationsMessage : "" ?>
                        </p>

                        <div class="form-button-login text-center">
                            <button type="submit" name="loginButton">Connexion</button>
                        </div>

                    </form>

                    <div class="register-box">
                        <p>Pas encore inscrit ?</p>
                        <a href="register.php"><i class="fas fa-arrow-right"></i> Créer un compte</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>

</body>

</html>