<?php
session_start()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="garage automobile">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/occasion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Garage V.Parrot</title>
</head>

<body>
<header>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-primary rounded" style="background: #34AC9E"
             aria-label="Thirteenth navbar example">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                    <a class="navbar-brand col-lg-3 me-0" href="../index.php"><img class="logo"
                                                                        src="../image/Garage V.Parrot-logo2.png"
                                                                        alt="logo garage automobile"></a>
                    <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./voitures.php">Véhicules</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./aviss.php">Avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contacts.php">Contact</a>
                        </li>

                        <?php if (($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == true) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./services.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./utilisateurs.php">Utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./horaire.php">Horaires</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                        <?php
                        if (isset($_SESSION["utilisateur"])) {
                            ?>
                            Bonjour&nbsp
                            <a href="./admin/admin_voiture.php"
                               style="text-decoration: none; color: black"> <?php echo $_SESSION["utilisateur"]; ?></a>&nbsp
                            <a href="./deconnexion.php" style="text-decoration: none; color: black"><i
                                        class="fas fa-sign-out-alt"></i></a>
                            <?php
                        } else {
                            ?>
                            <a href="./Connexion.php" class="btn btn-secondary">Se connecter</a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<script src="../header.js"></script>