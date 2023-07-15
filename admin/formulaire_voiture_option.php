<div class="container-lg">
    <form action="../formulaire/sauvegarde_voiture_option.php" method="POST">
        <div class="form-group" style="margin: 10px;">
            <label for="nom">Titre :</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>

        <div class="form-group" style="margin: 10px;">
            <label for="description">Description :</label>
            <textarea id="avis" class="form-control" name="description" required></textarea>
        </div>

        <input type="hidden" class="form-control" id="vehiculeIdId" name="vehiculeIdId" value="<?php echo $id; ?>" required>

        <div class="text-center" style="margin-top: 30px;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>