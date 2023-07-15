<!--header-->
<?php
require_once './layout/header.php';
?>
<main>

    <!--formulaire de contact-->

    </br>
    <div class="row">
        <div class="col-md-4 mb-5 mb-md-0">
        </div>
        <div class="col-md-4 mb-5 mb-md-0">

            <form action="./formulaire/sauvegarde_contact.php" method='POST'>
                <h4 class="titreFormulaire"> Formulaire de contact </h4>

                <div class="form-floating">
                    <input name="nom" type="name" class="form-control" id="floatingInput" placeholder="name">
                    <label for="floatingInput">Nom</label>
                </div>

                <div class="form-floating">
                    <input name="prenom" type="surname" class="form-control" id="floatingSurname" placeholder="Surname">
                    <label for="floatingPassword">Prénom</label>
                </div>

                <div class="form-floating">
                    <input name="telephone" type="phone" class="form-control" id="floatingPhone" placeholder="phone">
                    <label for="floatingPhone">Téléphone</label>
                </div>

                <div class="form-floating">
                    <input name="email" type="email" class="form-control" id="floatingEmail"
                           placeholder="name@example.com">
                    <label for="floatingPassword">Email</label>
                </div>

                <div class="form-floating">
                    <textarea name="formulaireMessage" type="comment" class="form-control" id="floatingMessage"
                              placeholder="text"></textarea>
                    <label for="floatingPassword">Message</label>
                </div>
                </br>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once 'layout/footer.php'
?>
