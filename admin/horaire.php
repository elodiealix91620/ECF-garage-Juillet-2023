<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}
$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `horaires`';
$stmt = $connexion->prepare($requete);
$stmt->execute();
$horaire = $stmt->get_result()->fetch_array();


?>
<main>
    <div class="container-lg" style="margin-top: 50px;">
</br>
        <h2>Gestion des Horaires</h2>

        <div>
            <form action="../formulaire/sauvegarde_horaire.php" method="POST">
                <div class="form-group">
                    <label for="horaire">Horaires :</label>
                    <textarea id="texte" class="form-control" name="commentaire" required><?php echo isset($horaire) ? $horaire["Commentaire"] : null;?></textarea>
                </div>

                <div style="margin: 10px;">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</main>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>
