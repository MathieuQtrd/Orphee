<?php 

$host = 'mysql:host=localhost;dbname=crypto';
$login = 'root'; 
$password = ''; 
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, 
    // PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'  
];
$pdo = new PDO($host, $login, $password, $options);

if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $select = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $select->execute([$_GET['id']]);

    if($select->rowCount() > 0) {
        $data = $select->fetch(PDO::FETCH_ASSOC);
        var_dump($data);

        // on récupère la clé 
        $keyfile = 'keyfile.key';
        $key = base64_decode(trim(file_get_contents($keyfile)));

        // on récupère la chaine représnetant le mail que l'on décode en binaire
        $decodedEmail = base64_decode($data['email']);

        // on a concaténé l'iv à la chaine on découpe pour extraire l'iv de la chaine
        $iv = substr($decodedEmail, 0, openssl_cipher_iv_length('aes-256-cbc'));

        $cipherEmail = substr($decodedEmail, openssl_cipher_iv_length('aes-256-cbc'));


        // on déchiffre le mail
        $email = openssl_decrypt($cipherEmail, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

        echo 'Bonjour ' . $data['login'] . ', votre mail est : ' . $email . '<hr>'; 
    }


}   