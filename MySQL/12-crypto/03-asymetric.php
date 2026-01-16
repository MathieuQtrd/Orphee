<?php  

// Créer une clé public et un clé privée 
// openssl genpkey -algorithm RSA -out private_key.pem -pkeyopt rsa_keygen_bits:2048
// openssl rsa -pubout -in private_key.pem -out public_key.pem

// on récupère les clé 
$publicKey = file_get_contents('public_key.pem');
$privateKey = file_get_contents('private_key.pem');

// Un contenu que l'on souhaite chiffrer

$text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'; // Attention de ne pas mettre un texte trop long.

// https://www.php.net/manual/en/function.openssl-public-encrypt.php
// https://www.php.net/manual/en/function.openssl-private-decrypt.php

// echo $text . '<hr>';

// chiffrement avec la clé publique
openssl_public_encrypt($text, $encryptedData, $publicKey);
// var_dump($encryptedData);
$encryptedData = base64_encode($encryptedData);
echo 'Donnée chiffrée : ' . $encryptedData . '<hr>';

// Déchiffrement avec le clé privée
$encryptedData = base64_decode($encryptedData);
openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);
echo 'Donnée déchiffrée : ' . $decryptedData . '<hr>';