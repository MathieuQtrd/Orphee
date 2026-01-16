<?php
require 'inc/init.inc.php';
require 'inc/functions.inc.php';

if(user_is_connect()) {
    header('location:index.php');
}

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email'])) {

    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    $error = false;

    if(empty($login)) {
        $msg[] = 'Le pseudo est obligatoire';
        $error = true;
    }
    $checkLogin = $pdo->prepare("SELECT * FROM user WHERE login = ?");
    $checkLogin->execute([$login]);

    if($checkLogin->rowCount() > 0) {
        $msg[] = 'Le pseudo est indisponible';
        $error = true;
    }

    if(empty($password)) {
        $msg[] = 'Le mot de passe est obligatoire';
        $error = true;
    }

    if(empty($email)) {
        $msg[] = 'L\'email est obligatoire';
        $error = true;
    }

    if( ! filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
        $msg[] = 'Le format de l\'email est incorrect';
        $error = true;
    }

    $checkEmail = $pdo->prepare("SELECT * FROM user WHERE email = ?");
    $checkEmail->execute([$email]);

    if($checkEmail->rowCount() > 0) {
        $msg[] = 'L\'email est indisponible';
        $error = true;
    }

    if(! $error) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?)");
        $insert->execute([$login, $password, $email]);

        // Pour les injections :
        // $insert = $pdo->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?)");
        // $insert->execute([$login, $password, $email]);
    }

}




// début des affichages :
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
?>

<main class="container">
    <h1 class="py-3 border-bottom text-center">Inscription</h1>
    <div class="row">
        <div class="col-sm-6 mx-auto border mt-5">
            <form action="" method="post" class="p-3">
                <?= displayMsg(); ?>
                <div class="mb-3">
                    <label for="login" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="login" name="login" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="text" class="form-control" id="password" name="password" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100">S'incrire</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php
require 'inc/footer.inc.php';
