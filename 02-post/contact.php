<?php

if(isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['message'])) {
    $lastname = trim($_POST['lastname']);
    $firstname = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // pour envoyer un mail : fonction mail()
    // https://www.php.net/manual/fr/function.mail.php
    // Pour aller plus loin :
    // PHPMailer :  https://github.com/PHPMailer/PHPMailer
    // Mailer :     https://github.com/symfony/mailer

    // On retravaille l'expéditeur pour une meilleure acceptation :
    $email = 'From: ' . $email;

    $message = 'Par : ' . $lastname . ' ' . $firstname . PHP_EOL . $message;

    mail('info@monsite.fr', 'Demande de contact', $message, $email);
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
                <h1 class="text-primary">Contact</h1>

                <form action="" method="POST" enctype="multipart/form-data" class="p-3 border my-5">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="lastname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="firstname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>