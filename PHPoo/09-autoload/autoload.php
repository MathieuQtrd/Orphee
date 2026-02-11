<?php 

function inclusionAutomatique($class)
{
    if(file_exists($class . '.php')) {
        require $class . '.php';
    }

    echo 'Appel du fichier ' . $class . '.php<br>';
    echo 'On vient de passer dans la fonction inclusionAutomatique<br>';
}

spl_autoload_register('inclusionAutomatique');
// spl_autoload_register() permet de définir la fonction qui devra être appelée lors de l'instanciation d'un nouvel objet (dès que le langage tombe sur un new ...)
// Le nom de la class qui suit le mot clé new sera passée naturellement en argument de cette fonction.