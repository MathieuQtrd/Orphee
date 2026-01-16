<?php
$msg = [];

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = false; // variable de controle pour savoir s'il y a eu des erreurs lors des contraintes sur les champs du formulaire

    if (empty($firstname)) {
        $msg[] = 'Le prénom est obligatoire';
        // cas d'erreur
        $error = true;
    }

    if (empty($lastname)) {
        $msg[] = 'Le nom est obligatoire';
        // cas d'erreur
        $error = true;
    }

    // https://www.php.net/manual/fr/function.preg-match.php
    $check_login = preg_match('/^[a-zA-Z0-9]+$/', $login);
    /*
        Regex 
        -----
        - les // représentent le début et la fin de la regex il est aussi possible d'utiliser des ##
        - les corchets [] contiennent les caractères autorisés : les minuscules, les majuscules et les chiffres
        - ^ permet de dire que la chaine ne peut commencer que par un des caractères autorisés
        - $ permet de dire que la chaine ne peut finir que par un des caractères autorisés
        - le fait de bloquer le début et la fin de la chaine fait que la chaine ne peut contenir que ces caractères autorisés. 
        - + permet d'avoir plusieurs fois le même caractère dans la chaine.
    */
    // if ($check_login == false) {
    if (! $check_login) {
        $msg[] =  'Erreur sur le pseudo : caractères autorisés : les lettres et les chiffres';
        // cas d'erreur
        $error = true;
    }  

    $size_login = iconv_strlen($login);
    if ($size_login < 4 || $size_login > 14) {
        $msg[] = 'Le pseudo doit avoir entre 4 et 14 caractères inclus';
        // cas d'erreur
        $error = true;
    }

    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg[] =  'Le format du mail est incorrect';
        // cas d'erreur
        $error = true;
    }

    if (empty($password)) {
        $msg[] = 'Le mot de passe est obligatoire';
        // cas d'erreur
        $error = true;
    }


    // if(empty($msg)) {

    // }

    if($error == false) {
        // si $error est toujours = à false, alors je peux valider les traitements suivants.

        $password = password_hash($password, PASSWORD_DEFAULT);

        // fopen
        // fopen permet de manipuler des fichiers.
        // le mode "a" (deuxième argument) permet de créer le fichier s'il n'existe pas sinon de l'ouvrir et permet l'écriture dans ce fichier
        $fichier = fopen('user.txt', 'a');

        // PHP_EOL : php end of line est une constante permettant de provoquer un retour à la ligne dans un fichier

        // fwrite() permet d'écrire dans un fichier
        fwrite($fichier, $login . ' ||| ' . $password . ' ||| ' . $lastname . ' ||| ' . $firstname . ' ||| ' . $email . PHP_EOL);

        // fclose() permet de fermer le fichier
        fclose($fichier);


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
                <h1 class="text-primary">Inscription</h1>

                <form action="" method="POST" enctype="multipart/form-data" class="p-3 border my-5">

                    <?php
                    if (!empty($msg)) {
                        echo '<div class="alert alert-danger">';
                        foreach ($msg as $ligne) {
                            echo $ligne . '<br>';
                        }
                        echo '</div>';
                    }
                    ?>

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="lastname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="firstname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Inscription</button>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>