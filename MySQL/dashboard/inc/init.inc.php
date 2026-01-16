<?php 

define('ROOT_PATH', __DIR__);
define('ROOT_URL', 'http://localhost/PHP_orphee_18/MySQL/dashboard/');

session_start();

// connexion bdd
$host = 'mysql:host=localhost;dbname=dashboard';
$login = 'root'; 
$password = ''; 
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    // PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'  
];

// Instanciation de l'objet PDO
$pdo = new PDO($host, $login, $password, $options);

$msg = [];