<?php
session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$id = intval($_POST["id"]);
$marque = $_POST["marque"];
$modele= $_POST["modele"];
$prix = intval($_POST["prix"]);
$km = intval($_POST["km"]);
$annee = intval($_POST["annee"]);
$description = $_POST["description"];
$statut = $_POST["statut"];
$titre = "$marque - $modele - $annee";

$path_parts = pathinfo($_FILES["photo"]["name"]);
$extension = isset($path_parts['extension']) != null ? $path_parts['extension'] : null;

if(isset($extension) && $extension != ""){
    $target_dir = "../image/voiture/";
}

$connexion = new mysqli ("localhost", "root", "root", "elodie");

if ($id == null) {
    $requete = 'insert into `vehiculesoccasion` (`Titre`, `Marque`,`Modele`,`Annee`, `Prix`, `Km`, `Description`, `Statut`, `Photo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("sssiiisss", $titre, $marque, $modele, $annee, $prix, $km, $description, $statut, $extension);
    $stmt->execute();

    $target_file = $target_dir . $stmt->insert_id . "." . $extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    header("Location: ../admin/voiture.php?id=$stmt->insert_id");
} else {
    if (isset($extension)) {
        $requete = 'update  `vehiculesoccasion` SET `Titre` = ?, `Marque` = ?,`Modele` = ?,`Annee` = ?, `Prix` = ?, `Km` = ?, `Description` = ?, `Statut` = ?, `Photo` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("sssiiisssi", $titre, $marque, $modele, $annee, $prix, $km, $description, $statut, $extension, $id);
        $stmt->execute();

        $target_file = $target_dir . $id . "." . $extension;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

        header("Location: ../admin/voiture.php?id=$id");
    } else {
        $requete = 'update  `vehiculesoccasion` SET `Titre` = ?, `Marque` = ?,`Modele` = ?,`Annee` = ?, `Prix` = ?, `Km` = ?, `Description` = ?, `Statut` = ? WHERE Id = ?';
        echo $requete;
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("sssiiissi", $titre, $marque, $modele, $annee, $prix, $km, $description, $statut, $id);
        $stmt->execute();
        header("Location: ../admin/voiture.php?id=$id");
    }
}
?>

