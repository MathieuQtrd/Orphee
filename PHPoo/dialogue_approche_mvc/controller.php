<?php  

if (isset($_POST['pseudo']) && isset($_POST['message'])) {
    $pseudo = trim($_POST['pseudo']);
    $message = trim($_POST['message']);

    $error = false;

    $verif_pseudo = preg_match('/^[a-zA-Z0-9._-]+$/', $pseudo);
    if (!$verif_pseudo) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le pseudo est obligatoire, caractères autorisés pour le pseudo : a-z 0-9 ainsi que _ . -.</div>';
        // cas d'erreur
        $error = true;
    }

    if (empty($message)) {
        $msg .= '<div class="alert alert-danger mb-3">Attentions<br>Le message est obligatoire.</div>';
        // cas d'erreur
        $error = true;
    }

    if ($error == false) {

        // on enleve le caractère | puisqu'il nous servira comme séparateur
        $message = htmlspecialchars($message, ENT_QUOTES);

        insertMessage($pseudo, $message);        

        header('location: dialogue.php');
    }
}

$liste_messages = [];
$liste_messages = selectMessage();