<?php
require 'inc/init.inc.php';
require 'inc/functions.inc.php';

if (! user_is_connect()) {
    header('location:login.php');
}

if(isset($_POST['name']) && isset($_POST['description'])) {

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    $error = false;
    $imageName = '';

    if(empty($name) || empty($description)) {
        $msg[] = 'Le titre et la description sont obligatoires';
        $error = true;
    }

    if(!empty($description)) {
        $description = str_replace(PHP_EOL, '<br>', $description);
    }

    if(!empty($_FILES['image']['name'])) {
        $extensions_valides = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        // echo '<pre>'; print_r($extension); echo '</pre>';

        if(in_array($extension, $extensions_valides)) {

            if(!$error) {
                $imageName = uniqid() . '.' . $extension;    
                move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $imageName);
            }
        } else {
            $msg[] = 'Extension de l\'image invalide, extensions acceptées : jpg, jpeg, png, gif, webp';
            $error = true;
        }
    } else {
        $imageName = 'mockup-default.png';
    }

    if(!$error) {
        $insert = $pdo->prepare("INSERT INTO task VALUES (NULL, ?, ?, ?, 'pending', NOW())");
        $insert->execute([$name, $description, $imageName]);
        header('location:index.php');
    }

}







// début des affichages :
require 'inc/header.inc.php';
require 'inc/nav.inc.php';
?>

<main class="container">
    <h1 class="py-3 border-bottom text-center">Nouvelle tâche</h1>
    <div class="row">
        <div class="col-12 border mt-5">
            <form action="" method="post" class="p-3"  enctype="multipart/form-data">
                <?= displayMsg(); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="14"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                    <button class="btn btn-success w-100">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php
require 'inc/footer.inc.php';
