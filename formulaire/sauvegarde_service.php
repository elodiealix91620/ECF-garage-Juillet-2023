<?php
session_start();

if (!isset($_SESSION["estAdmin"]) || isset($_SESSION["estAdmin"]) && $_SESSION["estAdmin"] == false) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}

$id = intval($_POST["id"]);
$titre = $_POST["titre"];
$description = $_POST["description"];

$path_parts = pathinfo($_FILES["photo"]["name"]);
$extension = isset($path_parts['extension']) != null ? $path_parts['extension'] : null;

if(isset($extension) && $extension != ""){
    $target_dir = "../image/service/";
}

$connexion = new mysqli ("localhost", "root", "root", "elodie");

if ($id == null) {
    $requete = 'insert into `garageservice` (`Titre`, `Description`, `Photo`) VALUES (?, ?, ?)';

    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("sss", $titre, $description, $extension);
    $stmt->execute();

    $target_file = $target_dir . $stmt->insert_id . "." . $extension;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    header("Location: ../admin/service.php?id=$stmt->insert_id");
} else {
    if (isset($extension)) {
        $requete = 'update  `garageservice` SET `Titre` = ?, `Description` = ?,`Photo` = ? WHERE Id = ?';
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("sssi", $titre, $description, $extension, $id);
        $stmt->execute();

        $target_file = $target_dir . $id . "." . $extension;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

        header("Location: ../admin/service.php?id=$id");
    } else {
        $requete = 'update `garageservice` SET `Titre` = ?, `Description` = ? WHERE Id = ?';
        echo $requete;
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("ssi", $titre, $description, $id);
        $stmt->execute();
        header("Location: ../admin/service.php?id=$id");
    }
}
?>

