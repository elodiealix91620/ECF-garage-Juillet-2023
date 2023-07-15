<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$trie = isset($_GET["trie"]) ? $_GET["trie"] : null;

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `avisclients`';

if ($trie != null) {
    $requete .= "ORDER BY " . mysqli_real_escape_string($connexion, $trie);
}

$requete .= " LIMIT 15 OFFSET ?";
$offset = 15 * ($page - 1);

$stmt = $connexion->prepare($requete);
$stmt->bind_param("i", $offset);

$stmt->execute();
$aviss = $stmt->get_result();

?>
<main>
    <div class="container-lg">

</br>
        <h1>Gestion des Avis</h1>
        <div class="container-lg" style="margin-top: 50px;">

            <!--Filtre pour les véhicules-->
            <div class="filter">
                <form action="aviss.php" method="GET">
                    <label for="category">Trier par :</label>
                    <select id="category" name="trie">
                        <option value="">Tout</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Nom") ? "selected" : "";?> value="Nom">Nom Croissant</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Nom DESC") ? "selected" : "";?> value="Nom DESC">Nom Décroissant</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Prenom") ? "selected" : "";?> value="Prenom">Prénom Croissant</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Prenom DESC") ? "selected" : "";?> value="Prenom DESC">Prénom Décroissant</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Note") ? "selected" : "";?> value="Note">Note Croissante</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "Note DES") ? "selected" : "C";?> value="Note DESC">Note Décroissante</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "EstApprouve DESC") ? "selected" : "";?> value="EstApprouve DESC">Est Approuvé</option>
                        <option <?php echo (isset($_GET["trie"]) && $_GET["trie"] == "EstApprouve") ? "selected" : "" ;?> value="EstApprouve">N'est pas Approuvé</option>
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
                    <th scope="col">Note</th>
                    <th scope="col">Est Approuvé</th>
                    <th scope="col">Option</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while ($avis = $aviss->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $avis["Nom"] ?></td>
                        <td><?php echo $avis["Prenom"] ?></td>
                        <td><?php echo $avis["Email"] ?></td>
                        <td><?php echo $avis["Note"] ?></td>
                        <td><?php echo $avis["EstApprouve"] == true ? "OUI" : "NON"; ?></td>
                        <td><a class="btn btn-primary"
                               href="avis.php?id=<?php echo $avis["Id"]; ?>">Voir</i></a></td>
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
</main>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>
