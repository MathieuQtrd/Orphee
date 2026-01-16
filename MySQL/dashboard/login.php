<?php
require 'inc/init.inc.php';
require 'inc/functions.inc.php';

if(user_is_connect()) {
    header('location:index.php');
}

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('location:login.php');
}

if(isset($_POST['login']) && isset($_POST['password'])) {

    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    $checkUser = $pdo->prepare("SELECT * FROM user WHERE login = ?");
    $checkUser->execute([$login]);

    // Pour les injections
    // $checkUser = $pdo->query("SELECT * FROM user WHERE login = '$login' AND password = '$password'");


    if($checkUser->rowCount() > 0) {
        $infosUser = $checkUser->fetch(PDO::FETCH_OBJ);
        if(password_verify($password, $infosUser->password)) {
            $_SESSION['user'] = [];
            $_SESSION['user']['id'] = $infosUser->id;
            $_SESSION['user']['login'] = $infosUser->login;
            $_SESSION['user']['email'] = $infosUser->email;
            header('location:index.php');
        } else {
            $msg[] = 'Erreur lors de la connexion';
        }
    } else {
        $msg[] = 'Erreur lors de la connexion';
    }

}




// début des affichages :
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
?>

<main class="container">
    <h1 class="py-3 border-bottom text-center">Connexion</h1>
    <div class="row">
        <div class="col-sm-6 mx-auto border mt-5">
            <form action="" method="post" class="p-3">
                <?= displayMsg(); ?>
                <div class="mb-3">
                    <label for="login" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="login" name="login">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php
require 'inc/footer.inc.php';
