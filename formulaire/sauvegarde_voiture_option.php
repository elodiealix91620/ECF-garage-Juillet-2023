<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$titre = $_POST["titre"];
$description = $_POST["description"];
$vehiculeId = $_POST["vehiculeIdId"];

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$query = 'insert into `vehiculecaracteristiques` (`Titre`, `Description`,`VehiculeId`) VALUES (?, ?, ?)';
$stmt = $connexion->prepare($query);
$stmt->bind_param("ssi", $titre, $description, $vehiculeId);
$stmt->execute();
header("Location: ../admin/voiture.php?id=$vehiculeId");
?>

