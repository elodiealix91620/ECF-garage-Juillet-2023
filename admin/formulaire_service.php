<div class="container-lg">
    <div style="margin-top: 50px;">
        <form action="../formulaire/sauvegarde_service.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo isset($service) ? $service["Id"] : null;?>" required>
            </div>

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" class="form-control" id="titre" name="titre" value="<?php echo isset($service) ? $service["Titre"] : null;?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="avis" class="form-control" name="description" required><?php echo isset($service) ? $service["Description"] : null;?></textarea>
            </div>

            <div class="form-group">
                <label for="photo">Photo :</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>

            <div class="text-center" style="margin-top: 25px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>

</div>

