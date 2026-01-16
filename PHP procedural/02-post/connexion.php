<?php
$msg = [];
// on vérifie si le fichier existe
$info_user = [];
if (isset($_POST['login']) && isset($_POST['password'])) {

    // echo '<pre>'; var_dump($_POST); echo '</pre>';

    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (file_exists('user.txt')) {
        $contenu_fichier = file('user.txt');

        // echo '<pre>'; print_r($contenu_fichier); echo '</pre>';

        foreach($contenu_fichier AS $ligne) {
            $msg = [];
            // https://www.php.net/manual/fr/function.explode.php
            $user = explode(' ||| ', $ligne);
            // echo '<pre>'; print_r($user); echo '</pre><hr>';

            if($login == $user[0]) {
                // Pour vérifier un mot de passer hasher avec password_hash => password_verify
                if(password_verify($password, $user[1])) {
                    $info_user = $user;
                    break; // nous permet de sortir de la boucle.
                }
            }
            $msg[] = 'Erreur sur le pseudo et ou le mot de passe.'; 
        }



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
                <h1 class="text-primary">Connexion</h1>

                <?php if (empty($info_user)) : ?>

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
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Inscription</button>
                </form>

                <?php else : ?>

                    <h2>Bonjour <?= $info_user['2'] . ' ' . $info_user['3'] ?></h2>
                    <?php echo '<pre>'; print_r($info_user); echo '</pre><hr>'; ?>

                <?php endif; ?>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>