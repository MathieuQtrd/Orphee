<?php 

// EXERCICE :
// Faire une class MyException
// Permettant de gérer les erreurs PHP sous forme d'exception
// Faire un ou des tests

class MyException 
{
    public function __construct()
    {
        echo 'Gestion d\'erreur instanciée<br>';
        set_error_handler(['MyException', 'exception_error_handler']);
        // set_error_handler(['class', 'methode'])
    }

    // La methode est static car on passe par la class et non par un objet
    public static function exception_error_handler($errno, $errstr, $errfile, $errline) 
    {
        throw new ErrorException(
            $errstr,    // Message de l'erreur (lisible)
            0,          // code de l'exception (optionnel, rarement utilisé)
            $errno,     // Sévérité : niveau de l'erreur PHP (E_NOTICE, E_WARNING ...)
            $errfile,   // Fichier contenant l'erreur qui s'est produite
            $errline    // ligne où l'erreur s'est produite
        );
    } 
} 

$gestionErreur = new MyException;

$pseud = 'Admin';

try {

    echo $pseudo;

} catch (ErrorException $e)  {

    echo 'Message : ' . $e->getMessage() . '<br>';
    echo 'Sévérité : ' . $e->getSeverity() . '<br>';
    echo 'Code : ' . $e->getCode() . '<br>';
    echo 'Fichier : ' . $e->getFile() . '<br>';
    echo 'Ligne : ' . $e->getLine() . '<br>';
}