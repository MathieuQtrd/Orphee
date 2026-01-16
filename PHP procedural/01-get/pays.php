<?php 
/* 
    EXERCICE : 
        La base de la manipulation de GET 
        
            Etapes :
                - Créer 4 liens indiquant 4 pays différents 
                - Sur chaque lien, créer une valeur GET à transmettre sur la même page
                - En fonction de la valeur transmise, afficher un message (par exemple pour un choix "France", afficher "Vous êtes français")

*/
$message = 'merci de choisir un pays';

if(isset($_GET['pays'])) {
    if($_GET['pays'] == 'fr') {
        $message = 'Vous êtes français';
    } elseif($_GET['pays'] == 'es') {
        $message = 'Vous êtes espagnol';
    } elseif($_GET['pays'] == 'it') {
        $message = 'Vous êtes italien';
    } elseif($_GET['pays'] == 'pt') {
        $message = 'Vous êtes portugais';
    } else {
        $message = 'Une erreur inattendue est arrivée.';
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 border">
        <div class="row">
            <div class="col">
                <h1 class="text-primary">Pays</h1>
                <hr>

                <ul class="list-group">
                    <li class="list-group-item"><a href="?pays=fr">France</a></li>
                    <li class="list-group-item"><a href="?pays=es">Espagne</a></li>
                    <li class="list-group-item"><a href="?pays=it">Italie</a></li>
                    <li class="list-group-item"><a href="?pays=pt">Portugal</a></li>
                </ul>

                <hr>
                <?= $message ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>