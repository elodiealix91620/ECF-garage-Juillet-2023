<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}
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
            <img class="d-block w-100" src="../image/voiture/<?php echo $voiture["Id"] . "." . $voiture["Photo"]; ?>">
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
                    <th scope="row">Modèle</th>
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
                        <td>
                            <?php echo $voitureCaracteristique["Description"]; ?>

                            <a href="supprimer_voiture_option.php?id=<?php echo $voitureCaracteristique["Id"]; ?>&vehiculeId=<?php echo $voitureCaracteristique["VehiculeId"]; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#editVoitureModal">Modifier la voiture</a>
        <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#addOptionModal">Ajouter une option</a>
        <a href="supprimer_voiture.php?id=<?php echo $voiture["Id"]; ?>" class="btn btn-danger">Supprimer la voiture</a>

    </div>
</main>

<div class="modal fade" id="editVoitureModal" role="dialog" aria-labelledby="ModifierVoiture">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOPtionModalLabel">Nous Contacter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once 'formulaire_voiture.php'
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addOptionModal" role="dialog" aria-labelledby="AjouterOptionVoiture">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOPtionModalLabel">Nous Contacter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once 'formulaire_voiture_option.php'
                ?>
            </div>
        </div>
    </div>
</div>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>
