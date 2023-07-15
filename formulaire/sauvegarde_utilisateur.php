<?php
session_start();

if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$id = intval($_POST["id"]);
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$estAdmin = $_POST["estAdmin"];
$motDePasse = !isset($_POST['motDePasse']) || $_POST['motDePasse'] == null ? null : md5($_POST['motDePasse'] . "JESUISICIPOURPROTEGERLEMOTDEPASSE");


$connexion = new mysqli ("localhost", "root", "root", "elodie");

if ($id == null) {
    $requete  = 'insert into `utilisateur` (`Nom`, `Prenom`,`Email`,`EstAdmin`, `MotDePasse`) VALUES (?, ?, ?, ?, ?)';
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("sssis", $nom, $prenom, $email, $estAdmin, $motDePasse);
    $stmt->execute();

    header("Location: ../admin/utilisateur.php?id=$stmt->insert_id");
} else {
    if ($motDePasse != null) {
        $requete = 'update  `utilisateur` SET `Nom` = ?, `Prenom` = ?,`Email` = ?,`EstAdmin` = ?, `MotDePasse` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("sssisi", $nom, $prenom, $email, $estAdmin, $motDePasse, $id);
        $stmt->execute();

        header("Location: ../admin/utilisateur.php?id=$id");
    } else {
        $requete = 'update  `utilisateur` SET `Nom` = ?, `Prenom` = ?,`Email` = ?,`EstAdmin` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("sssii", $nom, $prenom, $email, $estAdmin, $id);
        $stmt->execute();
        header("Location: ../admin/utilisateur.php?id=$id");
    }
}
?>

