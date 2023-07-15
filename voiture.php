<?php
require_once './layout/header.php';

$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `vehiculesoccasion` WHERE Id = ?  ';
$stmt = $connexion->prepare($requete);
$stmt->bind_param('i', $id);
$stmt->execute();
$voiture = $stmt->get_result()->fetch_array();


$requete = 'SELECT * FROM `vehiculecaracteristiques` WHERE VehiculeId = ?  ';
$stmt = $connexion->prepare($requete);
$stmt->bind_param('i', $id);
$stmt->execute();
$voitureCaracteristiques = $stmt->get_result();
?>

<main>

    <div class="container-lg" style="margin-top: 50px;">

        <h2><?php echo $voiture["Titre"]; ?></h2>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <img class="d-block w-100" src="./image/voiture/<?php echo $voiture["Id"] . "." . $voiture["Photo"]; ?>">
        </div>

        <!--tableau des caractéristiques techniques dans le modal-->
        <div>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Marque</th>
                    <td><?php echo $voiture["Marque"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Modele</th>
                    <td><?php echo $voiture["Modele"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Prix</th>
                    <td><?php echo $voiture["Prix"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Année</th>
                    <td><?php echo $voiture["Annee"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Km</th>
                    <td><?php echo $voiture["Km"]; ?></td>
                </tr>

                <?php
                while ($voitureCaracteristique = $voitureCaracteristiques->fetch_array()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $voitureCaracteristique["Titre"]; ?></th>
                        <td><?php echo $voitureCaracteristique["Description"]; ?></td>
                    </tr>

                    <?php
                }
                ?>
                </tbody>
            </table>

            <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#contactModal">Nous
                contacter</a>

            <div class="modal fade" id="contactModal" role="dialog" aria-labelledby="Contact">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addOPtionModalLabel">Nous Contacter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./formulaire/sauvegarde_contact.php" method='POST'>
                                <h4 class="titreFormulaire"> Formulaire de contact </h4>

                                <div class="form-floating">
                                    <input name="nom" type="name" class="form-control" id="floatingInput"
                                           placeholder="name">
                                    <label for="floatingInput">Nom</label>
                                </div>

                                <div class="form-floating">
                                    <input name="prenom" type="surname" class="form-control" id="floatingSurname"
                                           placeholder="Surname">
                                    <label for="floatingPassword">Prénom</label>
                                </div>

                                <div class="form-floating">
                                    <input name="telephone" type="phone" class="form-control" id="floatingPhone"
                                           placeholder="phone">
                                    <label for="floatingPhone">Téléphone</label>
                                </div>

                                <div class="form-floating">
                                    <input name="email" type="email" class="form-control" id="floatingEmail"
                                           placeholder="name@example.com">
                                    <label for="floatingPassword">Email</label>
                                </div>

                                <div class="form-floating">
                                    <textarea name="formulaireMessage" type="comment" class="form-control"
                                              id="floatingMessage"
                                              placeholder="text">Bonjour, je vous contact pour l'annonce de la voiture <?php echo $voiture["Titre"] ?>.</textarea>
                                    <label for="floatingPassword">Message</label>
                                </div>
                                </br>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>
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
