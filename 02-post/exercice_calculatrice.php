<?php 
//----------------------
//----------------------
// EXERCICE CALCULATRICE
//----------------------
//----------------------

// Faire une calculatrice avec PHP
// Pour celà, il faut créer un formulaire en methode post avec 3 champs et un bouton de validation
// deux input permettant une saisie + un champ select permettant de choisir un opérateur
// opérateurs de la calculatrice : addition, soustraction, multiplication, division, modulo, puissance
// Lors de la validation du form, il faut récupérer les deux saisies ainsi que l'opérateur puis :
    // Vous devrez afficher l'opération demandée ainsi que son résultat par exemple, affichage :
        // 24 * 3 = 72

// Attention aux erreurs potentielles
    // est ce que les informations existent lors de la récupération
    // l'opérateur est il valide
    // les valeurs sont elles bien numériques : voir la fonction prédéfinie PHP is_numeric()
    // division par zéro impossible (il faut gérer ce cas)
    // gestion de la virgule voir la fonction str_replace()

// Faire une mise en forme correcte avec l'html css
$result = '';
$error = '';

if( isset($_POST['valeur1']) && isset($_POST['operateur']) && isset($_POST['valeur2']) ) {

    $valeur1 = trim($_POST['valeur1']);
    $valeur2 = trim($_POST['valeur2']);
    $operateur = trim($_POST['operateur']);

    $valeur1 = str_replace(',', '.', $valeur1);
    $valeur2 = str_replace(',', '.', $valeur2);

    if(!is_numeric($valeur1) || !is_numeric($valeur2)) {
        $error = 'Les valeurs doivent être numériques';
    } else {
        if($operateur == '+') {
            $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . ($valeur1 + $valeur2);
        } elseif($operateur == '-') {
            $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . ($valeur1 - $valeur2);
        } elseif($operateur == '*') {
            $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . ($valeur1 * $valeur2);
        } elseif($operateur == '/') {
            if($valeur2 == 0) {
                $error = 'Division par zéro impossible';
            } else {
                // $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . round($valeur1 / $valeur2, 2);
                $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . ($valeur1 / $valeur2);
            }
        } elseif($operateur == '%') {
            if($valeur2 == 0) {
                $error = 'Division par zéro impossible';
            } else {
                $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . ($valeur1 % $valeur2);
            }
        } elseif($operateur == '**') {
            $result = $valeur1 . ' ' . $operateur . ' ' . $valeur2 . ' = ' . ($valeur1 ** $valeur2);
        } else {
            $error = 'Opérateur invalide';
        }

        $result = str_replace('.', ',', $result);
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
                <h1 class="text-primary">Calculatrice</h1>

                <?php if (empty($info_user)) : ?>

                <form action="" method="POST" enctype="multipart/form-data" class="p-3 border my-5">

                    <?php if (!empty($result)) : ?>
                        <div class="alert alert-success"><?= $result ?></div>
                    <?php endif ?>

                    <?php if (!empty($error)) : ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif ?>

                    <div class="form-group">
                        <label for="valeur1">valeur 1</label>
                        <input type="text" name="valeur1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="operateur">Opérateur</label>
                        <select name="operateur" class="form-select">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                            <option value="%">%</option>
                            <option value="**">**</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valeur2">Valeur 2</label>
                        <input type="text" name="valeur2" class="form-control">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Calculer</button>
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
