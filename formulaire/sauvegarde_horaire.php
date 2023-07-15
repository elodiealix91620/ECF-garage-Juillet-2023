<?php
session_start();
if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$commentaire = $_POST["commentaire"];

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$query = 'update `horaires` SET `Commentaire` = ? WHERE Id = 1';
$stmt = $connexion->prepare($query);
$stmt->bind_param("s", $commentaire);
$stmt->execute();

header("Location: ../admin/horaire.php");

?>

