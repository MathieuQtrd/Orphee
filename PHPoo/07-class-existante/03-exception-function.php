<?php 

// ErrorException : cette exception est utilisée pour représenter les erreurs PHP traditionnelles comme des exception

// Permet avec set_error_handler() d'attrapper les erreurs et les convertir en exception

set_error_handler('exception_error_handler');

function exception_error_handler($errno, $errstr, $errfile, $errline) 
{
    throw new ErrorException(
        $errstr,    // Message de l'erreur (lisible)
        0,          // code de l'exception (optionnel, rarement utilisé)
        $errno,     // Sévérité : niveau de l'erreur PHP (E_NOTICE, E_WARNING ...)
        $errfile,   // Fichier contenant l'erreur qui s'est produite
        $errline    // ligne où l'erreur s'est produite
    );
}

/*
Sévérité :
----------
E_WARNING   => 2 (avertissement, le script continu)
E_NOTICE    => 8 (variable undefied ...)
...

Pour voir à quoi corresponde le chiffre obtenu :
https://www.php.net/manual/en/errorfunc.constants.php

*/

$tabSeverite = [
    E_ERROR         => 'Erreur fatale',
    E_WARNING       => 'Avertissement',
    E_NOTICE        => 'Notice',
    E_DEPRECATED    => 'Fonction dépréciée',
];

$pseud = 'Admin';

try {

    echo $pseudo;

} catch (ErrorException $e)  {

    // echo '<pre>'; print_r($e); echo '</pre>';
    // echo '<pre>'; print_r(get_class_methods($e)); echo '</pre>';

    echo 'Message : ' . $e->getMessage() . '<br>';
    echo 'Sévérité : ' . $e->getSeverity() . '<br>';
    echo 'Sévérité : ' . $tabSeverite[$e->getSeverity()] . '<br>';
    echo 'Code : ' . $e->getCode() . '<br>';
    echo 'Fichier : ' . $e->getFile() . '<br>';
    echo 'Ligne : ' . $e->getLine() . '<br>';
    // echo 'Xdebug message : ' . $e->xdebug_message . '<br>';

    // echo '<pre>';
    // print_r($e->getTrace());
    // echo '</pre>';

}