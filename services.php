<!--header-->
<?php
require_once './layout/header.php';

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$requeteService = 'SELECT * FROM `garageservice`';
$stmt = $connexion->prepare($requeteService);
$stmt->execute();
$services = $stmt->get_result();

?>

<main>
    <div class="container-lg">


        <!--Texte principal-->
        <div class="px-4 pt-5 my-5 text-center">
            <h1 class="display-4 fw-bold text-body-emphasis">Bienvenue chez V.Parrot</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Bienvenue chez notre garage automobile polyvalent ! Nous sommes spécialisés dans la
                    carrosserie, la peinture, la mécanique, l'entretien de véhicules et la vente de véhicules
                    d'occasion. Notre équipe expérimentée et qualifiée est là pour répondre à tous vos besoins en
                    matière de réparation, d'amélioration et de maintenance automobile.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                </div>
            </div>
            <div class="overflow-hidden" style="max-height: 20%;">
                <div class="container px-5">
                    <img src="./image/viktor-theo-MKG01FfX8nM-unsplash.jpg"
                         class="img-fluid border rounded-3 shadow-lg mb-4" alt="automotive image" width="700"
                         height="500" loading="lazy">
                </div>
            </div>
        </div>


        <!--Présentation des 4 types de services -->
        <div class="row align-items-md-stretch">
            <?php
            $j = true;
            while ($service = $services->fetch_array()) {
            $j = !$j;
            ?>
            <div class="col-md-6" style="padding: 15px">
                <?php if ($j == true) {
                    echo '<div class="h-100 p-5 bg-body-tertiary border rounded-3">';
                } ?>
                <?php if ($j == false) {
                    echo '<div class="h-100 p-5 text-bg-secondary rounded-3">';
                } ?>
                <h2><?php echo $service["Titre"]; ?></h2>
                <p><?php echo $service["Description"]; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="px-4 pt-5 my-5 text-center">
        <div class="overflow-hidden" style="max-height: 20%;">
            <div class="container px-5">
                <img src="./image/artur-aldyrkhanov-XmsxXelvq30-unsplash.jpg"
                     class="img-fluid border rounded-3 shadow-lg mb-4" alt="automotive image" width="700"
                     height="500" loading="lazy">
            </div>
        </div>
    </div>

    <div class="px-4 pt-5 my-5 text-center">
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Dans notre garage, la satisfaction de nos clients est notre priorité. Nous nous
                engageons à fournir un service de qualité, des résultats durables et des tarifs compétitifs.
                Confiez-nous vos besoins en carrosserie, peinture, mécanique et entretien automobile, et nous vous
                assurerons un service professionnel et fiable.
                N'hésitez pas à nous contacter pour prendre rendez-vous ou pour toute autre demande d'information.
                Nous serons ravis de vous aider et de prendre soin de votre véhicule avec le plus grand soin.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            </div>
            <a href="contact.php" class="btn btn-secondary">Nous contacter</a>
        </div>
    </div>
    </div>
</main>
<?php
require_once 'layout/footer.php'
?>
