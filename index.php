<?php

require "Controllers/index-controller.php";

?>

<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="assets/css/style.css" rel="stylesheet">

  <title>35M - Accueil</title>
</head>

<body>

  <div class="wrapper">

    <?php include "includes/navbar.php"; ?>

    <div class="home-container">

      <h1>35M - Un univers à ta portée !</h1>

      <div class="presentation-block">
        <img src="assets/img/home/affiches.png" alt="Affiche Alien, Pulp fiction et Inception">
        <div>
          <h2>Que signifie « 35M » ?</h2>
          <p>C'est une référence au format 35mm des pellicules cinématographiques. Le format 35mm fut le plus utilisé du cinéma argentique et était considéré comme un standard.</p>
          <h2>À qui s'adresse le site ?</h2>
          <p>35M est dédié aux fans de cinéma en tous genres, cherchez et visualisez simplement des affiches de film et accédez à leurs informations, le tout de façon claire et précise.</p>
        </div>
      </div>

      <?php
      if (isset($_SESSION["userAccount"])) {
      ?>
        <div class="homeDisconnect-button">
          <a class="homeDisconnect-link" href="Views/logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </div>
      <?php
      } else {
      ?>
        <div class="homeRegister-button">
          <a class="homeRegister-link" href="Views/register.php"><i class="fas fa-user-plus"></i> S'inscrire</a>
        </div>
      <?php
      }
      ?>
    </div>

  </div>

  <?php include "includes/footer.php"; ?>

  <script src="https://kit.fontawesome.com/d89aa1e4ce.js" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>