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
                <th>Détails</th>
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
                    <td><a href="?action=details&id=<?= $ligne->id_employes ?>">Détails</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>