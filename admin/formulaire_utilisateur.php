<div class="container-lg">
    <div style="margin-top: 50px;">
        <form action="../formulaire/sauvegarde_utilisateur.php" method="POST">

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="nom"
                           value="<?php echo isset($utilisateur) ? $utilisateur["Nom"] : null; ?>" required>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group">
                        <label for="nom">Prénom :</label>
                        <input type="text" class="form-control" id="prenom" name="prenom"
                               value="<?php echo isset($utilisateur) ? $utilisateur["Prenom"] : null; ?>" required>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group">
                        <label for="motDePasse">Mot de Passe :</label>
                        <input type="password" class="form-control" id="motDePasse" name="motDePasse"
                               value="">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?php echo isset($utilisateur) ? $utilisateur["Email"] : null; ?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="photo">Est Admin :</label>
                            <select class="form-select" name="estAdmin">
                                <option <?php echo !isset($utilisateur) || $utilisateur["EstAdmin"] == 0 ? "selected" : ""; ?>
                                        value=0>NON
                                </option>
                                <option <?php echo isset($utilisateur) && $utilisateur["EstAdmin"] == 1 ? "selected" : ""; ?>
                                        value=1>OUI
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id"
                               value="<?php echo isset($utilisateur) ? $utilisateur["Id"] : null; ?>" required>
                    </div>

                    <div class="text-center" style="margin-top: 25px;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


