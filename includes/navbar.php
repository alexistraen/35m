<div class="navbar-area">
    <div class="container">
        <nav class="site-navbar">
            <ul>
                <li class="navLogo"><a href="../"><img class="logoSize" src="../assets/img/logo.png" alt="Logo 35M"></a></li>

                <li><a class="navItem" href="../Views/movies.php">Les affiches</a></li>

                <?php
                if (isset($_SESSION["userAccount"]["id"])) {
                ?>
                    <li><a class="navItem" href="../Views/lists.php">Mes listes</a></li>
                    <li><a class="navItem" href="../Views/account.php">Mon compte</a></li>

                    <?php
                    if ($_SESSION["userAccount"]["role"] == "admin") {
                    ?>
                        <li><a class="navItem" href="../Views/dashboard.php">Tableau de bord</a></li>
                    <?php
                    }
                    ?>

                    <li><a class="navItem" href="../Views/logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                <?php
                } else {
                ?>
                    <li><a class="navItem" href="../Views/login.php"><i class="fas fa-user-circle"></i> Se connecter</a></li>
                <?php
                }
                ?>
            </ul>

            <button class="nav-toggler">
                <span></span>
            </button>
            <a class="logoResponsive" href="../"><img class="logoSize" src="../assets/img/logo.png" alt="Logo 35M"></a>
        </nav>
    </div>
</div>