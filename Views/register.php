<?php

require_once "../Controllers/register-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Inscription</title>
</head>

<body>
    <div class="wrapper">
        <div class="forms-block">
            <div>
                <a href="../index.php"><img class="logoSize" src="../assets/img/logo.png" alt="Logo 35M"></a>

                <div class="forms-block-content">

                    <h1><i class="fas fa-user-plus"></i> Inscription</h1>

                    <form class="forms-style" action="register.php" method="post">

                        <div>
                            <label for="userAccountName">Nom de compte</label>
                        </div>
                        <div>
                            <input type="text" id="userAccountName" name="userAccountName" placeholder="Gandalf" value="<?= isset($_POST["userAccountName"]) ? $_POST["userAccountName"] : "" ?>" required>
                        </div>

                        <p class="form-display-message">
                            <?= isset($arrayErrors["userAccountName"]) ? $arrayErrors["userAccountName"] : "" ?>
                            <?= isset($arraySuccess["userAccountName"]) ? $arraySuccess["userAccountName"] : "" ?>
                        </p>

                        <div>
                            <label for="userAccountEmail">Adresse mail</label>
                        </div>
                        <div>
                            <input type="email" id="userAccountEmail" name="userAccountEmail" placeholder="gandalf.legris@valinor.com" value="<?= isset($_POST["userAccountEmail"]) ? $_POST["userAccountEmail"] : "" ?>" required>
                        </div>

                        <p class="form-display-message">
                            <?= isset($arrayErrors["userAccountEmail"]) ? $arrayErrors["userAccountEmail"] : "" ?>
                            <?= isset($arraySuccess["userAccountEmail"]) ? $arraySuccess["userAccountEmail"] : "" ?>
                        </p>

                        <div>
                            <label for="userAccountPassword">Mot de passe</label>
                        </div>
                        <div>
                            <input type="password" id="userAccountPassword" name="userAccountPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                        </div>

                        <p class="form-display-message">
                            <?= isset($arrayErrors["userAccountPassword"]) ? $arrayErrors["userAccountPassword"] : "" ?>
                            <?= isset($arrayErrors["userAccountConfirmPassword"]) ? "<i class=\"fas fa-times\"></i>" : "" ?>
                        </p>

                        <div>
                            <label for="userAccountConfirmPassword">Mot de passe <span class="confirm-password">(Confirmation)</span></label>
                        </div>
                        <div>
                            <input type="password" id="userAccountConfirmPassword" name="userAccountConfirmPassword" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required>
                        </div>

                        <p class="form-display-message">
                            <?= isset($arrayErrors["userAccountPassword"]) ? "<i class=\"fas fa-times\"></i>" : "" ?>
                            <?= isset($arrayErrors["userAccountConfirmPassword"]) ? $arrayErrors["userAccountConfirmPassword"] : "" ?>
                        </p>

                        <div class="form-button-register text-center">
                            <button type="submit" name="registerButton">Créer mon compte</button>
                        </div>

                    </form>

                    <div class="register-box">
                        <p>Déjà inscrit ?</p>
                        <a href="login.php"><i class="fas fa-arrow-right"></i> Se connecter</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "../includes/footer.php"; ?>

    <script src="https://kit.fontawesome.com/1fff42e298.js" crossorigin="anonymous"></script>

</body>

</html>