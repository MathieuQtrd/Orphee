<?php 

    if(isset($_GET['lang'])) {
        // choix utilisateur
        $lang = $_GET['lang'];
    } elseif (isset($_COOKIE['LANG'])) {
        // un cookie existe 
        $lang = $_COOKIE['LANG'];
    } else {
        // cas par défaut
        $lang = 'fr';
    }



    if($lang == 'fr') {
        $message = '<h2>Bonjour</h2>';
    } elseif($lang == 'es') {
        $message = '<h2>Hola</h2>';
    } elseif($lang == 'it') {
        $message = '<h2>Ciao</h2>';
    } elseif($lang == 'pt') {
        $message = '<h2>Bom dia</h2>';
    } else {
        $message = '<h2>Bonjour</h2>';
    }

    $un_an = 365*24*3600;

    // On crée un cookie sur le navigateur 
    // setcookie(SON_NOM, sa_valeur, duree_de_vie_en_seconde)
    // time() nous renvoie la valeur du timestamp
    // cette fonction comme header() doit être exécutée avant le moindre affichage dans la page !!!
    setcookie('LANG', $lang, time() + $un_an);

    // Pour supprimer un cookie on donne une durée de vie négative
    // setcookie('LANG', $lang, time() - 1);

    // Il est possible de récupérer la langue du navigateur
    // $langue = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); 


    // echo '<pre>'; print_r($_COOKIE); echo '</pre>'; 
    // echo '<pre>'; print_r($langue); echo '</pre>'; 

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 border">
        <div class="row">
            <div class="col">
                <h1 class="text-primary">Pays</h1>
                <hr>

                <ul class="list-group">
                    <li class="list-group-item"><a href="?lang=fr">Français</a></li>
                    <li class="list-group-item"><a href="?lang=es">Espagnol</a></li>
                    <li class="list-group-item"><a href="?lang=it">Italien</a></li>
                    <li class="list-group-item"><a href="?lang=pt">Portugais</a></li>
                </ul>

                <hr>
                <?= $message ?>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>