<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 border">
        <div class="row">
            <div class="col">
                <h1 class="text-danger">Page 2</h1>
                <hr>
                <a href="page1.php">Revenir sur la page 1</a>
                <hr>

                <?php
                    // GET est un protocole HTTP (ce n'est pas lié à PHP)
                    // GET représente l'url
                    // Si au niveau d'une url il y a un ? 
                        // l'adresse de la page est avant le ?
                        // ensuite on retrouve des informations complémentaires. 
                        // Format : index1=value1&index2=value2&index3=value3&...

                    // L'outil correspondant avec PHP : $_GET
                    // $_GET est une superglobale 
                    // Les superglobales sont des tableaux array
                    // $_GET étant lié à un protocole HTTP : existe toujours. En revanche, l'existance des paramètres à l'intérieur devra toujours être testée.


                    echo '<pre>'; print_r($_GET); echo '</pre>';

                    // Affichez proprement (pas avec un print_r ou un var_dump) avec des echo les informations présentent dans l'url
                    if( isset($_GET['category']) && isset($_GET['couleur']) && isset($_GET['quantite']) ) {
                        echo '<b>Catégorie : </b>' . $_GET['category'] . '<hr>';
                        echo '<b>Couleur : </b>' . $_GET['couleur'] . '<hr>';
                        echo '<b>Quantité : </b>' . $_GET['quantite'] . '<hr>';
                    } else {
                        echo 'Pour le bon fonctionnement de cette page, veuillez passer par un des liens de la page 1<hr>';
                    }
                ?>

                <hr>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>