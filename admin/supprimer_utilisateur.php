<?php
session_start();

if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$query = 'DELETE FROM `utilisateur` WHERE Id = ?';

$stmt = $connexion->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: ../admin/utilisateurs.php");

?>

