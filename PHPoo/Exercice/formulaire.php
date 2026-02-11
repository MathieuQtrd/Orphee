<?php 
require_once 'Request.php';
$erreurs = [];

if(!empty($_POST)) {
    $request = new Request;

    if(!$request->getPost('pseudo')) {
        $erreurs[] = '<div class="alert alert-danger">Le pseudo est obligatoire</div>';
    }
    if(empty($request->getPost('password'))) {
        $erreurs[] = '<div class="alert alert-danger">Le mot de passe est obligatoire</div>';
    }
    if(!filter_var($request->getPost('email'), FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = '<div class="alert alert-danger">Le format du mail est incorrect</div>';
    }
    if($request->getFile('avatar') && !$request->validateFileExtension('avatar')) {
        $erreurs[] = '<div class="alert alert-danger">Extensions autorisées pour l\'image : png, jpg, webp et gif</div>';
    }

    if(empty($erreurs)) {
        // traitement de l'inscription ...
    }

}

echo '<pre>'; print_r($_POST); echo '</pre>';
echo '<pre>'; print_r($_FILES); echo '</pre>';
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form method="post" enctype="multipart/form-data" class="mt-5 border p-3">
                    <?php foreach($erreurs AS $valeur) : ?>
                        <?= $valeur; ?>
                    <?php endforeach; ?>
                    <div class="mb-3">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo">
                    </div>
                    <div class="mb-3">
                        <label for="password">Mot de passe</label>
                        <input type="text" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control" name="avatar" id="avatar">
                    </div>
                    <input type="submit" class="btn btn-outline-dark w-100" value="Inscription">
                </form>
            </div>
        </div>
    </div>
</body>

</html>