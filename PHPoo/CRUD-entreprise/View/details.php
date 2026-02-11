<?php 

// echo '<pre>'; print_r($title); echo '</pre>';
// echo '<pre>'; print_r($data); echo '</pre>';

?>
<div class="col-12 mt-5">
    <h1 class="pb-3 border-bottom"><?= $title . $data->id_employes ?></h1>
</div>

<div class="col-12 my-5">
    <ul class="list-group">
        <li class="list-group-item">Id : <?= $data->id_employes ?></li>
        <li class="list-group-item">Prénom : <?= $data->prenom ?></li>
        <li class="list-group-item">Nom : <?= $data->nom ?></li>
        <li class="list-group-item">Sexe : <?= $data->sexe ?></li>
        <li class="list-group-item">Salaire : <?= $data->salaire ?> €</li>
        <li class="list-group-item">Service : <?= $data->service ?></li>
        <li class="list-group-item">Date d'embauche : <?= $data->date_embauche ?></li>

    </ul>
</div>