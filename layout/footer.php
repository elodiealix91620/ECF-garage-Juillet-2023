<!--header-->
<?php
require_once './layout/header.php';

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$requete = 'SELECT * FROM `horaires`';
$stmt = $connexion->prepare($requete);
$stmt->execute();
$horaire= $stmt->get_result()->fetch_array();

?>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">

    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    </section>

    <section class="footer">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Nos horaires
                    </h6>
                    <p>
                    <pre><?php echo ($horaire["Commentaire"]); ?></pre>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Liens utiles
                    </h6>
                    <p>
                        <a href="/mentions legales.php" class="text-reset">Mentions légales</a>
                    </p>
                    <p>
                        <a href="/RGPD.php" class="text-reset">RGPD</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i><a href="https://goo.gl/maps/5SBjMqKuBQsfiPx68"> 21 rue Condeau – 31000 Toulouse</a></p>
                    <p>
                        <i class="fas fa-envelope me-3"></i><a href="mailto:contact@v-parrot.fr">
                        contact@v-parrot.fr</a>
                        
                    </p>
                    <p><i class="fas fa-phone me-3"></i><a href="tel:+33164907664"> 01.64.90.76.64</a></p>
                    <p><i class="fa-solid fa-network-wired"></i> Retrouvez-nous sur <i class="fa-brands fa-facebook"></i> <i
                                class="fa-brands fa-instagram"></i> <i class="fa-brands fa-snapchat"></i></p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        Copyright 2023 & Designed by Elodie ALIX
    </div>
</footer>
<!-- Footer -->

</body>

<script src="./header.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous"
        async></script>
<script src="./index.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- partial -->
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
<script src="https://kit.fontawesome.com/691245f9cf.js" crossorigin="anonymous"></script>
</html>