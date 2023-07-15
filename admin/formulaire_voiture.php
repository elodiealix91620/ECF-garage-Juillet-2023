<div class="container-lg">
    <div style="margin-top: 50px;">
        <form action="../formulaire/sauvegarde_voiture.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nom">Marque :</label>
                    <input type="text" class="form-control" id="marque" name="marque" value="<?php echo isset($voiture) ? $voiture["Marque"] : null;?>" required>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="nom">Modèle :</label>
                        <input type="text" class="form-control" id="modele" name="modele" value="<?php echo isset($voiture) ? $voiture["Modele"] : null;?>" required>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="prix">Prix :</label>
                        <input type="number" class="form-control" id="prix" name="prix" value="<?php echo isset($voiture) ? $voiture["Prix"] : null;?>" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="km">kilométrage :</label>
                        <input type="number" class="form-control" id="km" name="km" value="<?php echo isset($voiture) ? $voiture["Km"] : null;?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="annee">Année :</label>
                        <input type="number" class="form-control" id="annee" name="annee" value="<?php echo isset($voiture) ? $voiture["Annee"] : null;?>" required>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="photo">Statut :</label>
                        <select class="form-select" name="statut" aria-label="">
                            <option selected value="ENVENTE">EN VENTE</option>
                            <option value="VENDU">VENDU</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <div class="form-group">
                        <label for="photo">Photos :</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="avis" class="form-control" name="description" required><?php echo isset($voiture) ? $voiture["Description"] : null;?></textarea>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($voiture) ? $voiture["Id"] : null;?>" required>
            </div>

            <div class="text-center" style="margin-top: 25px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>

</div>

