<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$trie = isset($_GET["trie"]) ? $_GET["trie"] : null;

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `utilisateur`';

if ($trie != null) {
    $requete .= "ORDER BY " . mysqli_real_escape_string($connexion, $trie);
}

$requete .= " LIMIT 15 OFFSET ?";
$offset = 15 * ($page - 1);

$stmt = $connexion->prepare($requete);
$stmt->bind_param("i", $offset);

$stmt->execute();
$utilisateurs = $stmt->get_result();

?>
<main>
    <div class="container-lg">
        </br>
        <h1>Gestion des utilisateurs</h1>
        <div class="container-lg" style="margin-top: 50px;">

            <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#addModal">Ajouter un
                utilisateur</a>
            <!--Filtre pour les véhicules-->
            <div class="filter">
                <form action="utilisateurs.php" method="GET">
                    <label for="category">Trier par :</label>
                    <select id="category" name="trie">
                        <option value="tout">Tout</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Nom") ? "selected" : ""; ?>
                                value="Nom">Nom Croissant
                        </option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Nom DESC") ? "selected" : ""; ?>
                                value="Nom DESC">Nom Décroissant
                        </option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Prenom") ? "selected" : ""; ?>
                                value="Prenom">Prénom Croissant
                        </option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Prenom DESC") ? "selected" : ""; ?>
                                value="Prenom DESC">Prénom Décroissant
                        </option>
                    </select>
                    <button class="btn btn-primary">Trier</button>
                </form>
            </div>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Est Admin</th>
                    <th scope="col">Option</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while ($voiture = $utilisateurs->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $voiture["Nom"] ?></td>
                        <td><?php echo $voiture["Prenom"] ?></td>
                        <td><?php echo $voiture["Email"] ?></td>
                        <td><?php echo $voiture["EstAdmin"] == true ? "OUI" : "NON"; ?></td>

                        <td><a class="btn btn-primary"
                               href="utilisateur.php?id=<?php echo $voiture["Id"]; ?>">Voir</i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <div class="text-center container-lg">
                <a href="?<?php echo $page == 1 ? $_SERVER['QUERY_STRING'] . "&page=" . $page : $_SERVER['QUERY_STRING'] . "&page=" . $page - 1; ?>"><i
                            class="fa fa-arrow-left"></i> Page Précédente</a>
                /
                <a href="?<?php echo $_SERVER['QUERY_STRING'] . "&page=" . ($page + 1); ?>">Page Suivante <i
                            class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="addModal" role="dialog" aria-labelledby="AjouterUtilisateur">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
