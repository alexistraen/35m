<?php

require_once "../Controllers/logout-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Déconnexion</title>
</head>

<body>
    <div class="wrapper">
        <div class="forms-block">
            <div>
                <a href="../index.php"><img class="logoSize" src="../assets/img/logo.png" alt="Logo 35M"></a>

                <div class="forms-block-content-logout">

                    <div class="logout-text-container">
                        <h1><i class="fas fa-sign-out-alt"></i> Déconnexion</h1>

                        <p>Voulez-vous vraiment être déconnecté ?</p>
                    </div>

                    <div class="headband-logout">
                        <div class="logout-buttons-container">
                            <form class="forms-style" action="logout" method="post">

                                <div class="form-button-logout">
                                    <button type="submit" name="logoutButton">Déconnexion</button>
                                </div>

                            </form>

                            <div class="form-button-logout-return">

                                <button onclick="goBack()">Retour</button>

                            </div>
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