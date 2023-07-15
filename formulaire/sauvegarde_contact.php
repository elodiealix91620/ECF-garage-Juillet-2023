<?php

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$message = $_POST["formulaireMessage"];

$connexion = new mysqli ("localhost", "root", "root", "elodie");
$requete  = 'insert into `formulairedecontact` (`Nom`, `Prenom`,`Email`, `Telephone`,`FormulaireMessage`) VALUES (?, ?, ?, ?, ?)';
$stmt = $connexion->prepare($requete);
$stmt->bind_param("sssss", $nom, $prenom, $email, $telephone, $message);
$stmt->execute();

header("Location: ./../remerciement_contact.php");
?>

