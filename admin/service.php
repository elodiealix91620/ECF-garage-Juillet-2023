<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}
$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `garageservice` WHERE Id = ?  ';
$stmt = $connexion->prepare($requete);
$stmt->bind_param('i', $id);
$stmt->execute();
$service = $stmt->get_result()->fetch_array();

?>
<main>
    <div class="container-lg" style="margin-top: 50px;">

        <h2><?php echo $service["Titre"]; ?></h2>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <img class="d-block w-100" src="../image/service/<?php echo $service["Id"] . "." . $service["Photo"]; ?>">
        </div>

        <div>
            <p><?php echo $service["Description"]; ?></p>
        </div>
        <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#editVoitureModal">Modifier le service</a>
        <a href="supprimer_service.php?id=<?php echo $service["Id"]; ?>" class="btn btn-danger">Supprimer le service</a>

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
                require_once 'formulaire_service.php'
                ?>
            </div>
        </div>
    </div>
</div>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>
