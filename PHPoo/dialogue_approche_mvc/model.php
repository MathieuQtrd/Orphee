<?php 

$host = 'mysql:host=localhost;dbname=dialogue'; 
$login = 'root'; 
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
];
$pdo = new PDO($host, $login, $password, $options);


function insertMessage($pseudo, $message)
{
    global $pdo;
    $insert = $pdo->prepare("INSERT INTO commentaire (id, auteur, message, date) VALUES (NULL, :auteur, :message, NOW())");
    $insert->bindParam(':auteur', $pseudo, PDO::PARAM_STR);
    $insert->bindParam(':message', $message, PDO::PARAM_STR);
    $insert->execute();
    return $insert->rowCount();
}

function selectMessage()
{
    global $pdo;
    $recup_messages = $pdo->query("SELECT * FROM commentaire ORDER BY date DESC");
    return $recup_messages->fetchAll();
}