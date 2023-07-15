<!--header-->
<?php

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$requete = 'SELECT * FROM `avisclients` WHERE `EstApprouve` = 1';
$stmt = $connexion->prepare($requete);
$stmt->execute();
$avis = $stmt->get_result();

require_once './layout/header.php';
?>
<main>
    <!--Présentation de l'entreprise-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-12 text-center">
                    <h2 class="fw-bolder">Merci pour votre avis</h2>
                    <p class="mb-0 align-items-center">
                        Après vérification il sera visible sur notre site
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
<!--footer-->
<?php
require_once 'layout/footer.php'
?>


