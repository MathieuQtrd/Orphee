<?php
    // exercice faire en sorte de récupérer toutes les images présentes dans le dossier img/ afin de les afficher ici
    // $liste_image = scandir('img/');
    // echo '<pre>'; var_dump($liste_image); echo '</pre>';

    // Pour gérer potentiellement des majuscules et/ou minuscules    
    // $liste_images = glob('img/*.{[jJ][pP][gG],[jJ][pp][eE][gG],[pP][nN][gG],[gG][iI][fF],[wW][eE][bB][pP]}', GLOB_BRACE);

    $liste_image = glob('img/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
    // echo '<pre>'; var_dump($liste_image); echo '</pre>';
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
            <div class="col-12 d-flex justify-content-between flex-wrap">
                <?php foreach($liste_image AS $img) : ?>
                    <img src="<?= $img ?>" alt="" width="30%" class="mb-3">
                <?php endforeach ?>
                
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>