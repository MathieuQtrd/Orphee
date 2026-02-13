<?php 

namespace Core;

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