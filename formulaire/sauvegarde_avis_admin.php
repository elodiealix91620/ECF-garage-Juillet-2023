<?php
session_start();
if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$id = intval($_POST["id"]);
$estApprouve = $_POST["estApprouve"];

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$query = 'update  `avisclients` SET `EstApprouve` = ? WHERE Id = ?';
$stmt = $connexion->prepare($query);
$stmt->bind_param("ii", $estApprouve,  $id);
$stmt->execute();

header("Location: ../admin/avis.php?id=$id");

?>

