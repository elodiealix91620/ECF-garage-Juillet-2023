<!--header-->
<?php
require_once './layout/header.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $motDePasse = md5($_POST['motDePasse'] . "JESUISICIPOURPROTEGERLEMOTDEPASSE");

    $connexion = new mysqli ("localhost", "root", "root", "elodie");

    $requete = "SELECT `Prenom`, `Nom`, `EstAdmin`  FROM `utilisateur` WHERE `Email` = ? and `MotDePasse` = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->bind_param("ss", $email, $motDePasse);
    $stmt->execute();

    $row = $stmt->get_result()->fetch_array();
    if (empty($row)) {
        $connexionEchec = true;
    } else {
        $_SESSION["utilisateur"] = $row["Prenom"] . " " . $row["Nom"];
        $_SESSION["estAdmin"] = $row["EstAdmin"];

        header("Location: index.php");
    }
}

?>

<main>

    <div class="row">
        <div class="col-md-4 mb-5 mb-md-0">
        </div>
        <div class="col-md-4 mb-5 mb-md-0">
            <form action="" method='POST' class="form-signin justify-content-center">
                </br>
                </br>
                <h1 class="h3 mb-3 font-weight-normal">Accès à votre compte</h1>
                <?php
                if (isset($connexionEchec) && $connexionEchec = true) {
                    ?>
                    <h6 class="h6 mb-3 font-weight-normal" style="color: red">Accès à votre compte</h6>
                    <?php
                }
                ?>
                <label for="inputEmail" class="sr-only">Adresse email</label>
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Adresse email"
                       required="" autofocus="">
                <label for="inputPassword" class="sr-only">Mot de passe</label>
                <input name="motDePasse" type="password" id="inputPassword" class="form-control"
                       placeholder="Mot de passe" required="">
                <div class="checkbox mb-3">
                    <!--<label>
                      </br>
                      <input type="checkbox" value="remember-me"> Se souvenir de moi
                    </label>-->
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
            </form>
            <div class="d-flex justify-content-center mb-4">
            </div>
        </div>
        <div class="col-md-4 mb-0">
            <div class="d-flex justify-content-center mb-4">
            </div>
        </div>
    </div>
</main>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>