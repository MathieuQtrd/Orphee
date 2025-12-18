<?php
// https://stackoverflow.com/questions/19220158/php-filter-validate-email-does-not-work-correctly
// Superglobale $_POST 
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
                <h1 class="text-primary">Formulaire</h1>

                <form action="" method="POST" enctype="multipart/form-data" class="p-3 border my-5">

                    <?php
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre><hr>';

                    // affichez proprement le pseudo saisie avec une contrainte de taille : le pseudo doit avoir entre 4 et 14 caractères inclus
                    // on affiche un message d'erreur si c'est le cas sinon on affiche le pseudo

                    if (isset($_POST['pseudo']) && isset($_POST['email'])) {

                        $pseudo = trim($_POST['pseudo']);
                        $email = trim($_POST['email']);

                        $taille_pseudo = iconv_strlen($pseudo);
                        if ($taille_pseudo < 4 || $taille_pseudo > 14) {
                            echo '<div class="alert alert-danger">Le pseudo doit avoir entre 4 et 14 caractères inclus</div>';
                        } else {
                            echo 'Pseudo : ' . $pseudo . '<br>';
                        }

                        // controle sur le format du mail.
                        // https://www.php.net/manual/fr/function.filter-var.php
                        // if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<div class="alert alert-danger">Le format du mail est incorrect</div>';
                        } else {
                            echo 'Email : ' . $email . '<br>';
                        }
                    }

                    ?>
                    <hr>
                    <!--
                    attribut du form :
                    ------------------
                    action=""   : l'url cible où l'on va et où seront envoyées les données du form
                    method=""   : la methode utilisée (GET ou POST) si non précisé : get par défaut
                    enctype=""  : obligatoire en cas de pièce jointe (input type="file"), valeur : enctype="multipart/form-data"

                    attribut sur les champs du form :
                    ---------------------------------
                    name=""     : représente l'indice que l'on retrouvera dans get ou post
                                
                -->
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Valider</button>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>