<?php 

// https://github.com/PHPMailer/PHPMailer

# composer require phpmailer/phpmailer

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();

// var_dump($mail);

$mail->setFrom('expediteur@mail.fr', 'Nom Prénom');
$mail->addAddress('destinataire@mail.fr');

$mail->Subject = 'Un sujet';
$mail->Body = 'Lorem ipsum ...';

if($mail->send()) {
    echo 'Mail envoyé<hr>';
} else {
    echo 'Erreur lors de l\'envoi du mail<hr>';
}