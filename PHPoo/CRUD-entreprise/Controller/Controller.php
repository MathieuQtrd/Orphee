<?php 

namespace Controller;

// use Model\EntityRepository;

class Controller 
{
    private $dbEntityRepository;
    public $message = [];

    public function __construct()
    {
        $this->dbEntityRepository = new \Model\EntityRepository;
        // $this->dbEntityRepository = new EntityRepository;
    }

    public function handleRequest()
    {
        if(!empty($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'show';
        }

        if($action == 'show') {
            $this->show();
        }

    }

    // methode render() pour gérer les templates à appeler et les paramètres à leur fournir
    public function render($layout, $template, $params = []) 
    {
        // $layout représente le template globale (le cadre de nos page) contenant les partie communes à nos pages
        // $template représente le morceau de template à inclure dans le layout qui sera propre à chaque action (sera reçu au niveau de la variable $content dans le layout.php)
        // $params : les données selon les pages concernées

        extract($params); // crée une variable pour chaque indice d'un tableau array qui contiendra la valeur correspondante

        ob_start(); // démarre une mise en tampon (une mise en mémoire), les affichages ne seront pas éffectués tout de suite, ils seront déclenchés lors de l'appel de ob_end_flush() plus bas dans le code

        require_once 'View/' . $template;

        $content = ob_get_clean(); // permet de stocker l'affichage précédent dans cette variable $content qui est celle appelée dans layout.php

        ob_start();

        require_once 'View/' . $layout;

        return ob_end_flush(); // libère tout l'affichage précédemment stocké
    }


    public function show()
    {
        $this->render('layout.php', 'show.php', [
            'title' => 'Affichage des employés',
            'data'  => $this->dbEntityRepository->selectAll(),
        ]);
    }
}