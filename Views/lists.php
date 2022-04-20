<?php

require_once "../Controllers/lists-controller.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../assets/css/style.css" rel="stylesheet">

    <title>35M - Listes</title>
</head>

<body>
    <div class="wrapper">

        <?php include "../includes/navbar.php"; ?>

        <div class="container-large-responsive">

            <h1 class="title-custom">Gestion des listes</h1>

            <div id="block-responsive">

                <div class="dashboard-block">

                    <h2 class="margin-bot"><i class="fas fa-stream"></i> Mes listes</h2>

                    <?php
                    if (!empty($userLists)) {
                        
                        foreach ($userLists as $key => $value) {
                    ?>
                            <p class="list-name">
                                <a href="list.php?list=<?= $value["user_list_id"] ?>"><i class="fas fa-angle-right"></i> <?= $value["user_list_name"] ?></a>
                            </p>
                    <?php
                        }
                    }
                    ?>

                </div>

                <div class="vertical-separator"></div>
                <div class="horizontal-separator"></div>

                <div class="dashboard-block">

                    <h2><i class="fas fa-plus-circle"></i> Ajouter une liste</h2>

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