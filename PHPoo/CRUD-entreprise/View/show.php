<?php 

// echo '<pre>'; print_r($title); echo '</pre>';
// echo '<pre>'; print_r($data); echo '</pre>';

?>

<div class="col-12 mt-5">
    <h1 class="pb-3 border-bottom"><?= $title ?></h1>
</div>

<div class="col-12 my-5">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Service</th>
                <th>Sexe</th>
                <th>Salaire</th>
                <th>Date embauche</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data AS $ligne) : ?>
                <tr>
                    <td><?= $ligne->id_employes ?></td>
                    <td><?= $ligne->prenom ?></td>
                    <td><?= $ligne->nom ?></td>
                    <td><?= $ligne->service ?></td>
                    <td><?= $ligne->sexe ?></td>
                    <td><?= $ligne->salaire ?> €</td>
                    <td><?= $ligne->date_embauche ?></td>
                    <td>
                        <a href="?action=details&id=<?= $ligne->id_employes ?>" class="btn btn-primary" title="Voir les informations détaillées de <?= $ligne->prenom ?> <?= $ligne->nom ?>"><i class="bi bi-eye"></i></a>
                        <a href="?action=update&id=<?= $ligne->id_employes ?>" class="btn btn-warning" title="Modifier les informations détaillées de <?= $ligne->prenom ?> <?= $ligne->nom ?>"><i class="bi bi-pencil"></i></a>
                        <a href="?action=delete&id=<?= $ligne->id_employes ?>" class="btn btn-danger" title="Supprimer l'employé : <?= $ligne->prenom ?> <?= $ligne->nom ?>"><i class="bi bi-trash" onclick="return(confirm('Etes-vous sûr ?'))"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>