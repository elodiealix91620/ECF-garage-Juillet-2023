<?php 
    $email = $_POST['email'];
    $MotDePasse = $_POST['MotDePasse'];

    echo $email . $MotDePasse ;

    $connexion = new mysqli('localhost','root', 'root','testelodie');
    $query = "SELECT * FROM `Utilisateur` WHERE `email` = '".$email."' AND `MotDePasse`= '".$MotDePasse."'";

    echo $query;

    $result = $connexion->query($query);
    echo $result;

    while ($connexion = mysqli_fetch_assoc($result)) {
        echo "Colonne 1 : " . $row["colonne1"] . "<br>";
        echo "Colonne 2 : " . $row["colonne2"] . "<br>";
    }
    
?>