<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}
$id = intval($_GET["id"]);

$connexion = new mysqli ("localhost", "root", "root", "elodie");

$requete = 'SELECT * FROM `formulairedecontact` WHERE Id = ?  ';
$stmt = $connexion->prepare($requete);
$stmt->bind_param('i', $id);
$stmt->execute();
$contact = $stmt->get_result()->fetch_array();

?>
<main>
    <div class="container-lg" style="margin-top: 50px;">

        <h2>Message de <?php echo $contact["Email"]; ?></h2>

        <div>
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Nom</th>
                    <td><?php echo $contact["Nom"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Prénom</th>
                    <td><?php echo $contact["Prenom"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td><?php echo $contact["Email"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Téléphone</th>
                    <td><?php echo $contact["Telephone"]; ?></td>
                </tr>
                <tr>
                    <th scope="row">Message</th>
                    <td><?php echo $contact["FormulaireMessage"]; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!--footer-->
<?php
require_once 'layout/footer.php'
?>
