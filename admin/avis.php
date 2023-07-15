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

$requete = 'SELECT * FROM `avisclients` WHERE Id = ?  ';
$stmt = $connexion->prepare($requete);
$stmt->bind_param('i', $id);
$stmt->execute();
$avis = $stmt->get_result()->fetch_array();

?>
<main>
    <div class="container-lg" style="margin-top: 50px;">

        <h2>Avis de <?php echo $avis["Email"]; ?></h2>

        <!--tableau des caractéristiques techniques dans le modal-->
        <div>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Nom</th>
                    <td><?php echo $avis["Nom"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Prénom</th>
                    <td><?php echo $avis["Prenom"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?php echo $avis["Email"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Note</th>
                    <td><?php echo $avis["Note"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Est Approuvé</th>
                    <td><?php echo $avis["EstApprouve"] == true ? "OUI" : "NON"; ?></td>
                </tr>
                <tr>
                    <th scope="row">Commentaire</th>
                    <td><?php echo $avis["Commentaire"]; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#validerAvis">Valider l'avis</a>
    </div>
</main>

<div class="modal fade" id="validerAvis" role="dialog" aria-labelledby="ValiderAvis">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../formulaire/sauvegarde_avis_admin.php" method="POST">
                    <label for="photo">Est Approuvé:</label>
                    <select class="form-select" name="estApprouve">
                        <option <?php echo $avis["EstApprouve"] == 0 ? "selected" : ""; ?> value=0>NON</option>
                        <option <?php echo $avis["EstApprouve"] == 1 ? "selected" : ""; ?> value=1>OUI</option>
                    </select>

                    <input type="hidden" value="<?php echo $avis["Id"];?>" name="id">

                    <div style="margin: 10px;">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--footer-->
<?php
require_once 'layout/footer.php'
?>
