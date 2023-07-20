<!--header-->
<?php
require_once './layout/header.php';

if (!isset($_SESSION["estAdmin"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "401 Unauthorized";
    exit;
}
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;

$marque = isset($_GET["marque"]) ? $_GET["marque"] : null;
$prixMax = isset($_GET["prixMax"]) ? $_GET["prixMax"] : null;
$prixMin = isset($_GET["prixMin"]) ? $_GET["prixMin"] : null;
$anneeMax = isset($_GET["anneeMax"]) ? $_GET["anneeMax"] : null;
$anneeMin = isset($_GET["anneeMin"]) ? $_GET["anneeMin"] : null;
$kmMax = isset($_GET["kmMax"]) ? $_GET["kmMax"] : null;
$kmMin = isset($_GET["kmMin"]) ? $_GET["kmMin"] : null;

?>

<script>
    var page = <?php echo $page ?>;

    function onLoadFunctions() {
        getVoiture();
    }

    function getVoiture(query) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.withCredentials = true;
        xmlhttp.open("GET", "voitures_liste.php?page=" + page + "&" + query, true);
        xmlhttp.send();
    }

    function filter() {
        const formData = new FormData((document.getElementById('formFilter')));
        const queryString = new URLSearchParams(formData).toString();
        getVoiture(queryString);
    }

    function pageSuivante() {
        page += 1;
        filter();
    }

    function pagePrecedente() {
        page = page == 1 ? page : page - 1;
        filter();
    }

    window.onload = onLoadFunctions;
</script>

<main>
    <div class="container-lg">
        </br>
        <h1>Gestion des voitures</h1>
        <div class="container-lg" style="margin-top: 50px;">

            <a class="btn btn-secondary" type="submit" data-toggle="modal" data-target="#addModal">Ajouter une
                voiture</a>
            <!--Filtre pour les véhicules-->
            <div class="container-lg">
                <div class="row">
                    <form id="formFilter" action="#" method="get">
                        <div class="row">
                        <div class="form-group col-md-3 col-sm-6">
                                <label for="anneeMin">Année:</label>
                                <input type="number" class="form-control" id="anneeMin" name="anneeMin"
                                       placeholder="Min"
                                       value="<?php echo $anneeMin ?>">
                                <input type="number" class="form-control" id="anneeMax" name="anneeMax"
                                       placeholder="Max"
                                       value="<?php echo $anneeMax ?>">
                            </div>

                            <div class="form-group col-md-3  col-sm-6">
                                <label for="prixMin">Prix:</label>
                                <input type="number" class="form-control" id="prixMin" name="prixMin" placeholder="Min"
                                       value="<?php echo $prixMin ?>">
                                <input type="number" class="form-control" id="prixMax" name="prixMax" placeholder="Max"
                                       value="<?php echo $prixMax ?>">
                            </div>

                            <div class="form-group col-md-3  col-sm-6">
                                <label for="kilometreMin">Kilometrage:</label>
                                <input type="number" class="form-control" id="kmMin" name="kmMin" placeholder="Min"
                                       value="<?php echo $kmMin ?>">
                                <input type="number" class="form-control" id="kmMax" name="kmMax" placeholder="Max"
                                       value="<?php echo $kmMax ?>">
                            </div>

                            <div class="form-group col-md-3 col-sm-6">
                                <label for="marque">Marque:</label>
                                <input type="text" class="form-control" id="marque" name="marque"
                                       value="<?php echo $marque ?>">
                            </div>

                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-3 offset-md-9">
                                <button class="btn btn-secondary" type="button" onclick="filter()"><i
                                            class="fa fa-filter"></i> Filtrer
                            </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="txtHint"><b>Chargement</b></div>

            <div class="text-center container-lg">
                <div class="text-center container-lg">
                    <bouton class="btn btn-secondary"
                            onclick="pagePrecedente()"><i
                                class="fa fa-arrow-left"></i> Page Précedente
                    </bouton>
                    /
                    <bouton class="btn btn-secondary" onclick="pageSuivante()">Page Suivante <i
                                class="fa fa-arrow-right"></i></bouton>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="addModal" role="dialog" aria-labelledby="AjouterVoiture">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOPtionModalLabel">Nous Contacter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                require_once 'formulaire_voiture.php'
                ?>
            </div>
        </div>
    </div>
</div>


<!--footer-->
<?php
require_once 'layout/footer.php'
?>
