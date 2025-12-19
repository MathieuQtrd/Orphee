<?php

    $error = '';
    // echo uniqid();

    // echo '<pre>'; print_r($_FILES); echo '</pre>';
    if(!empty($_FILES['image']['name'])) {
        $extensions_valides = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        // echo '<pre>'; print_r($extension); echo '</pre>';

        if(in_array($extension, $extensions_valides)) {

            $nom_image = uniqid() . '.' . $extension;

            // copy($_FILES['image']['tmp_name'], __DIR__ . '/img/' . $nom_image);
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $nom_image);

            // on a enregistré l'image on redirige vers la page galerie.php
            // la fonction header() permet notamment de rediriger vers une url, cette fonction doit obligatoirement être exécutée AVANT le moindre affichage dans la page (html ou même un espace ...)
            // /!\ en local vous pouvez ne pas avoir cette erreur.
            header('location:galerie.php');


        } else {
            $error = 'Extension de l\'image invalide, extensions acceptées : jpg, jpeg, png, gif, webp';
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
            <div class="col-6 mx-auto">
                <h1 class="text-primary">Charger votre image</h1>

                <form action="" method="POST" enctype="multipart/form-data" class="p-3 border my-5">

                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>