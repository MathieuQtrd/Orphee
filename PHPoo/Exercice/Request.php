<?php 

/*
Exercice :
    - Créer une class Request afin de gérer les superglobales $_POST, $_GET et $_FILES
    - Cette class devra avoir les methodes suivantes :
        - isPost() pour confirmer si la communication était bien en post : $_SERVER['REQUEST_METHOD']
        - isGet() pour confirmer si la communication était bien en get : $_SERVER['REQUEST_METHOD']
        - getPostData() pour récupérer tout post sinon null
        - getGetData() pour récupérer tout get sinon null
        - getPost() pour récupérer un seul élément de post qui devra fourni en argument sinon null
        - getGet() pour récupérer un seul élément de get qui devra fourni en argument sinon null
        - getFile() pour récupérer le tableau array représentant le fichier selon un argument sinon null
        - validateFileExtension() pour valider qu'un fichier chargé ait une extension valide avec les extensions suivantes acceptées par défaut : png | jpg | jpeg | gif | webp, faire en sorte que l'on puisse fournir d'autre extensions pour le test
        
    - Créer un formulaire sur la page formulaire.php avec les champs suivants :
        - pseudo
        - password
        - email
        - avatar

    - faire des tests afin que lors de la validation du form on récupère les informations via les methodes mises en place et on génère du texte pour valider ou afficher des erreurs
        - pseudo ne doit pas être vide
        - password ne doit pas être vide
        - email : le format
        - avatar : un image valide

*/
class Request
{
    public function isPost() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }   
        return false;
    }

    public function isGet() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public function getPostData() {
        return $_POST;
    }

    public function getGetData() {
        return $_GET;
    }

    public function getPost($field) {
        return (isset($_POST[$field])) ? $_POST[$field] : NULL;
    }

    public function getGet($field) {
        return (isset($_GET[$field])) ? $_GET[$field] : NULL;
    }

    public function getFile($field) {
        if(!empty($_FILES[$field]['name'])) {
            return $_FILES[$field];
        }
        return NULL;
    }

    public function validateFileExtension($field, $extensions = ['png', 'jpg', 'jpeg', 'gif', 'webp']) {
        $file = $this->getFile($field);
        if($file) {
            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if(in_array($extension, $extensions)) {
                return true;
            } else {
                return false;
            }
        }
    }

}