<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$id = intval($_GET["id"]);
$vehiculeId = intval($_GET["vehiculeId"]);

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$query = 'DELETE FROM `vehiculecaracteristiques` WHERE Id = ?';

$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../admin/voiture.php?id=".$vehiculeId);

?>

