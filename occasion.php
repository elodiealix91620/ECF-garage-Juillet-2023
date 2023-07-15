<!--header-->
<?php
require_once './layout/header.php';

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
$trie = isset($_GET["trie"]) ? $_GET["trie"] : null;

$params = "";
$trieRequete = "";
$paramsValues = [];

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `vehiculesoccasion` WHERE Statut = "ENVENTE"  ';

if ($trie != null) {
    $params .= "s";
    array_push($paramsValues, $trie);
    $requete .= " ORDER BY ? ";
}

$requete .= " LIMIT 15 OFFSET ?";
$offset = 15 * ($page - 1);
$params .= 'i';
array_push($paramsValues, $offset);

$stmt = $connexion->prepare($requete);
$stmt->bind_param($params, ...$paramsValues);

$stmt->execute();
$voitures = $stmt->get_result();

?>
<main>

    <div class="container-lg" style="margin-top: 50px;">
        <!--Filtre pour les véhicules-->
        <div class="filter">
            <label for="category">Trier par :</label>
            <select id="category">
                <option value="tout">Tout</option>
                <option value="année">Année</option>
                <option value="km">Km</option>
                <option value="prix">Prix</option>
            </select>
        </div>

        <!--Présentation des véhicules-->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            while ($voiture = $voitures->fetch_array()) {
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                             src="image/voiture/<?php echo $voiture["Id"].'.'.$voiture["Photo"];?>">
                        <div class="card-body">
                            <h3><?php echo $voiture["Titre"];?></h3>
                            <p class="card-text"> <?php echo $voiture["Annee"];?> - <?php echo $voiture["Km"];?> </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <!--option modal-->
                                    <a class="btn btn-secondary" href="./voiture.php?id=<?php echo $voiture["Id"]; ?>">Voir plus</a>
                                </div>
                                <p class="price"><?php echo $voiture["Prix"];?> €</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="text-center container-lg">
            <a href="?<?php echo $page == 1 ? $_SERVER['QUERY_STRING']."&page=".$page : $_SERVER['QUERY_STRING']."&page=".$page - 1; ?>"><i class="fa fa-arrow-left"></i> Page Précedente</a>
            /
            <a href="?<?php echo $_SERVER['QUERY_STRING']."&page=".($page + 1); ?>">Page Suivante <i class="fa fa-arrow-right"></i></a>
        </div>
</main>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>
