<?php

$marque = isset($_GET["marque"]) ? $_GET["marque"] : null;
$prixMax = isset($_GET["prixMax"]) ? $_GET["prixMax"] : null;
$prixMin = isset($_GET["prixMin"]) ? $_GET["prixMin"] : null;
$anneeMax = isset($_GET["anneeMax"]) ? $_GET["anneeMax"] : null;
$anneeMin = isset($_GET["anneeMin"]) ? $_GET["anneeMin"] : null;
$kmMax = isset($_GET["kmMax"]) ? $_GET["kmMax"] : null;
$kmMin = isset($_GET["kmMin"]) ? $_GET["kmMin"] : null;

$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$query = 'SELECT * FROM `vehiculesoccasion` ';

$filters = [];
$filterString = "";
$filterQuery = "";

if($marque != null){
    $filterQuery .= "Marque = ? AND ";
    array_push($filters, $marque);
    $filterString .= "s";
}
if($prixMax != null){
    $filterQuery .= "Prix <= ? AND ";
    array_push($filters, intval($prixMax));
    $filterString .= "i";
}
if($prixMin != null){
    $filterQuery .= "Prix >= ? AND ";
    array_push($filters, intval($prixMin));
    $filterString .= "i";
}
if($anneeMax != null){
    $filterQuery .= "Annee <= ? AND ";
    array_push($filters, intval($anneeMax));
    $filterString .= "i";
}
if($anneeMin != null){
    $filterQuery .= "Annee >= ? AND ";
    array_push($filters, intval($anneeMin));
    $filterString .= "i";
}
if($kmMax != null){
    $filterQuery .= "Km <= ? AND ";
    array_push($filters, intval($kmMax));
    $filterString .= "i";
}
if($kmMin != null){
    $filterQuery .= "Km >= ? AND ";
    array_push($filters, intval($kmMin));
    $filterString .= "i";
}

$query .= $filterQuery != "" ? " WHERE " . $filterQuery : "";

if(substr($query, -4) == "AND "){
    $query = substr($query, 0, -4);
}
$query .= " LIMIT 15 OFFSET ?";

$offset = 15*($page-1);
$filterString .= 'i';
array_push($filters, $offset);

$stmt = $connexion->prepare($query);
$stmt->bind_param($filterString, ...$filters);

$stmt->execute();
$voitures = $stmt->get_result();

?>

<div class="container-lg" style="margin-top: 50px;">
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
</div>
