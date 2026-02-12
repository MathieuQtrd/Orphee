<div class="row">
    <div class="col-12">
        <h1 class="border-bottom my-5 pb-3"><?= $title ?></h1>       
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <form method="post" >
                    <?= $messages ?><br>
                    <input type="hidden" name="id_employes" value="<?= $data->id_employes ?>">
                    <div class="mb-3">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" value="<?= $data->prenom ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="<?= $data->nom ?>">
                    </div>
                    <div class="mb-3">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" class="form-select">
                            <option value="m" <?= ($data->sexe == 'm') ? 'selected' : '' ?>>masculin</option>
                            <option value="f" <?= ($data->sexe == 'f') ? 'selected' : '' ?>>feminin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="service">Service</label>
                        <select name="service" id="service" class="form-select">
                            <?php foreach($services as $service) : ?>
                                <option <?= ($service == $data->service) ? 'selected' : '' ?> ><?= $service ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salaire">Salaire</label>
                        <input type="text" name="salaire" id="salaire" class="form-control" value="<?= $data->salaire ?>">
                    </div>
                    <input type="submit" id="ajouter" class="btn btn-outline-primary" value="Modifier">
                </form>
            </div>
        </div>

    </div>
</div>