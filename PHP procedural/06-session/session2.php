<?php  

session_start(); 


if(!empty($_SESSION['user'])) {
    echo 'Bonjour ' . $_SESSION['user']['login'] . ' Vous êtes connecté<br>';
} else {
    header('location:connexion.php');
}


echo '<pre>'; var_dump($_SESSION); echo '</pre>';

if(!empty($_SESSION['user']) && $_SESSION['user']['status'] == 'admin') {
    echo 'Bonjour ' . $_SESSION['user']['login'] . ' Vous êtes administrateur<br>';
} else {
    echo 'Bonjour ' . $_SESSION['user']['login'] . ' Vous êtes client<br>';
}