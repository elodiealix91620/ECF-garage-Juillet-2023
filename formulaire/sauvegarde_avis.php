<?php

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$commentaire = $_POST["commentaire"];
$note = $_POST["note"];
$estApprouve = 0;

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$requete  = 'insert into `avisclients` (`Nom`, `Prenom`,`Email`,`Commentaire`, `Note`, `EstApprouve`) VALUES (?, ?, ?, ?, ?, ?)';
$stmt = $connexion->prepare($requete);
$stmt->bind_param("ssssii", $nom, $prenom, $email, $commentaire, $note, $estApprouve);
$stmt->execute();

header("Location: ./../remerciement_avis.php");
?>

