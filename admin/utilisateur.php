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

$requete = 'SELECT * FROM `utilisateur` WHERE Id = ?  ';
$stmt = $connexion->prepare($requete);
$stmt->bind_param('i', $id);
$stmt->execute();
$utilisateur = $stmt->get_result()->fetch_array();

?>
<main>
    <div class="container-lg" style="margin-top: 50px;">

        <h2>Compte de <?php echo $utilisateur["Email"]; ?></h2>

        <div>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Nom</th>
                    <td><?php echo $utilisateur["Nom"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Prénom</th>
                    <td><?php echo $utilisateur["Prenom"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?php echo $utilisateur["Email"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Est Admin</th>
                    <td><?php echo $utilisateur["EstAdmin"] == true ? "OUI" : "NON"; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#editUtilisateurModal">Modifier l'utilisateur</a>
        <a href="supprimer_utilisateur.php?id=<?php echo $utilisateur["Id"]; ?>" class="btn btn-danger">Supprimer l'utilisateur</a>
    </div>
</main>


<div class="modal fade" id="editUtilisateurModal" role="dialog" aria-labelledby="ModifierUtilisateur">
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
                require_once 'formulaire_utilisateur.php'
                ?>
            </div>
        </div>
    </div>
</div>


<!--footer-->
<?php
require_once 'layout/footer.php'
?>
