<!--header-->
<?php
require_once './layout/header.php';

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$requeteAvis = 'SELECT * FROM `avisclients` WHERE `EstApprouve` = 1';
$stmt = $connexion->prepare($requeteAvis);
$stmt->execute();
$avis = $stmt->get_result();

$requeteService = 'SELECT * FROM `garageservice`';
$stmt = $connexion->prepare($requeteService);
$stmt->execute();
$services = $stmt->get_result();

?>
<main>
    <!--Présentation de l'entreprise-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0"
                                                                     src="./image/car_repair_car_workshop_repair_shop_garage_repairs_car_black_and_white_man-1101392.jpg!d.jpeg"
                                                                     alt="réparation automobile"/></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">A propos de nous</h2>
                    <p class="lead fw-normal text-muted mb-0 align-items-center">
                        Fort d’une expérience de 15 ans dans le domaine de l’automobile, votre garagiste Vincent Parrot
                        met toute son expertise et son savoir-faire à votre disposition.
                        </br>Ancré depuis 2021 dans la région toulousaine, nous saurons vous proposer une large gamme de
                        services et un diagnostic personnalisé pour votre véhicule.
                        </br>Afin de devenir votre garage de confiance, nous saurons allier performance et sécurité.
                        </br>Alors n’attendez plus pour prendre rendez-vous !
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--Début de la présentation des 4 services du garage-->
    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Notre gamme de services</h2>
                </br>
            </div>
            <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                <?php
                $j = 0;
                while ($service = $services->fetch_array()) {
                    $j++;
                    ?>
                    <div class="col mb-5 mb-5 mb-xl-0">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle mb-4 px-4" src="./image/service/<?php echo $service["Id"].'.'.$service["Photo"] ?>"
                                 alt="<?php echo $service["Titre"]; ?>"/>
                            <h5 class="fw-bolder"><?php echo $service["Titre"]; ?></h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row align-items-start">
            <div class="col">
                <!--Formulaire pour laisser des commentaires-->

                <div class="colonne">
                    <div class="row">
                        <div class="col-md-1 mb-5 mb-md-0">
                        </div>
                        <div class="col-md-8 mb-5 mb-md-0">
                            <h3 class="titre1">Laissez votre avis</h3>
                            </br>
                            <form action="formulaire/sauvegarde_avis.php" method="post">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="nom" class="form-control" id="nom" name="nom" aria-describedby="nom"
                                           placeholder="Votre nom" required>
                                </div>

                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="prenom" class="form-control" id="prenom" name="prenom"
                                           placeholder="Votre prénom" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Votre email" required>
                                </div>

                                <div class="form-group">
                                    <label for="commentaire">Votre avis</label>
                                    <textarea type="commentaire" class="form-control" name="commentaire"
                                              id="commentaire" required></textarea>
                                </div>

                                <!--option permettant de mettre le nombre d'étoiles pour la notation-->

                                <!-- star rating -->
                                <h6 class="titreNote">Votre note :</h6>
                                <div class="rating-wrapper">

                                    <!-- star 5 -->
                                    <input type="radio" id="5-star-rating" name="note" value="5">
                                    <label for="5-star-rating" class="star-rating">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>

                                    <!-- star 4 -->
                                    <input type="radio" id="4-star-rating" name="note" value="4">
                                    <label for="4-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>

                                    <!-- star 3 -->
                                    <input type="radio" id="3-star-rating" name="note" value="3">
                                    <label for="3-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>

                                    <!-- star 2 -->
                                    <input type="radio" id="2-star-rating" name="note" value="2">
                                    <label for="2-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>

                                    <!-- star 1 -->
                                    <input type="radio" id="1-star-rating" name="note" value="1">
                                    <label for="1-star-rating" class="star-rating star">
                                        <i class="fas fa-star d-inline-block"></i>
                                    </label>
                                </div>
                                </br>
                                </br>
                                <div>
                                    <button type="submit" class="btn btn-secondary">Publier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </br>
                </div>
            </div>
            <div class="col">

                <!--Avis des clients qui défilent-->

                <h2 class="AvisTitre">Que pensez vous de nous?</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $j = 0;
                        while ($row = $avis->fetch_array()) {
                            $j++;
                            ?>
                            <div class="carousel-item <?php echo $j == 1 ? "active" : ""; ?>">
                                <p class="testimonial"><?php echo $row["Commentaire"] ?></p>
                                <p class="overview"><b><?php echo $row["Prenom"] ?><?php echo $row["Nom"] ?></b></p>
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <?php
                                        for ($i = 0; $i < $row["Note"]; $i++) {
                                            echo '<li class="list-inline-item"><i class="fa fa-star"></i></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--footer-->
<?php
require_once 'layout/footer.php'
?>

<script>
    $(document).ready(function () {
        var silder = $(".owl-carousel");
        silder.owlCarousel({
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false,
            items: 1,
            stagePadding: 20,
            center: true,
            nav: false,
            margin: 50,
            dots: true,
            loop: true,
            responsive: {
                0: {items: 1},
                480: {items: 2},
                575: {items: 2},
                768: {items: 2},
                991: {items: 3},
                1200: {items: 4}
            }
        });
    });
</script>

