<!--header-->
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
<table class="table">
    <thead>
    <tr>
        <th scope="col">Marque</th>
        <th scope="col">Modèle</th>
        <th scope="col">Prix</th>
        <th scope="col">Année</th>
        <th scope="col">Kilométrage</th>
        <th scope="col">Statut</th>
        <th scope="col">Option</th>
    </tr>
    </thead>
    <tbody>

    <?php
    while ($voiture = $voitures->fetch_array()) {
        ?>
        <tr>
            <td><?php echo $voiture["Marque"] ?></td>
            <td><?php echo $voiture["Modele"] ?></td>
            <td><?php echo $voiture["Prix"] ?></td>
            <td><?php echo $voiture["Annee"] ?></td>
            <td><?php echo $voiture["Km"] ?></td>
            <td><?php echo $voiture["Statut"] ?></td>
            <td><a class="btn btn-primary"
                   href="voiture.php?id=<?php echo $voiture["Id"]; ?>">Voir</i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
