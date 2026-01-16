<?php 
$success = '';

$host = 'mysql:host=localhost;dbname=crypto';
$login = 'root'; 
$password = ''; 
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    // PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'  
];
$pdo = new PDO($host, $login, $password, $options);
// Création d'une clé en base64 pour l'utiliser lors du chiffrement de l'email avant l'enregistrement
// openssl rand -base64 32 > keyfile.key
    // base64 : encode la clé en base64 pour faciliter le stockage ou son transfert
    // 32 : pour une clé de 32 octets idéale pour un algo AES-256
    // keyfile.key notre fichier contenant la clé

$errors = [];


if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email)) {
        $errors[] = 'le mail est obligatoire';
    }

    if( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'le format du mail est incorrect';
    }

    if(empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $keyfile = 'keyfile.key';

        // on lit et décode la clé :
        $key = base64_decode(trim(file_get_contents($keyfile)));
        // var_dump($key);

        // génération d'un IV (vecteur d'initialisation)
        $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));

        /*
        openssl_cipher_iv_length('aes-256-cbc')
            - 16 octet
        random_bytes()
            - génère des octets aléatoires 
        */

        // chiffrement du mail
        $encryptedEmail = openssl_encrypt($email, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        // cette ligne chiffre l'email avec aes-256-cbc en utilisant la clé et l'iv
        // aes-256-cbc : algo utilisé
        // $key : notre clé générée au préalable
        // OPENSSL_RAW_DATA : retourne le resultat chiffré en binaire brut (pas en base64)
        // var_dump($email);
        // var_dump($encryptedEmail);


        // Encodage en base64 pour le stockage ou transmission
        $encryptedEmail = base64_encode($iv . $encryptedEmail);
        // var_dump($encryptedEmail);


        $insert = $pdo->prepare('INSERT INTO user VALUES (NULL, ?, ?, ?)');
        $insert->execute([$login, $password, $encryptedEmail]);

        $id = $pdo->lastInsertId();

        header('location:02-validation.php?id=' . $id);


    }



} 





?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h1>Inscription</h1>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <?= $success ?>
                    </div>
                <?php endif; ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>