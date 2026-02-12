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

            if(!empty($_GET['id'])) {
                $id = $_GET['id'];
            } else {
                $id = null;
            }

        } else {
            $action = 'show';
        }

        if($action == 'show') {
            $this->show();
        } elseif($action == 'details') {
            $this->details($id);
        } elseif($action == 'delete') {
            $this->delete($id);
        } elseif($action == 'add') {
            $this->add();
        } elseif($action == 'update') {
            $this->update($id);
        } else {
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

    public function add()
    {
        $errors = [];
        $messages = '';
        if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['sexe']) && isset($_POST['service']) && isset($_POST['salaire']) ) {
            $prenom = trim($_POST['prenom']);
            $nom = trim($_POST['nom']);
            $sexe = trim($_POST['sexe']);
            $service = trim($_POST['service']);
            $salaire = trim($_POST['salaire']);

            if(empty($prenom)) {
                $errors[] = 'Le prénom est obligatoire';
            }
            if(empty($nom)) {
                $errors[] = 'Le nom est obligatoire';
            }
            if(!is_numeric($salaire)) {
                $errors[] = 'Le salaire est obligatoire et doit être numérique';
            }

            if(empty($errors)) {
                $this->dbEntityRepository->insertOne($prenom, $nom, $service, $sexe, $salaire) ;
                $messages .= $prenom . ' ' . $nom  . ' a bien été enregistré dans l\'entreprise';
            } else {
                foreach($errors as $error) {
                    $messages .= $error . '<br>';
                }
            }

        }

        $data = $this->dbEntityRepository->selectServices();

        $services = [];

        foreach($data as $service) {
            $services[] = $service->service;
        }


        $this->render('layout.php', 'add.php', [
            'title' => 'Ajouter un employé',
            'services'  => $services,
            'messages'  => $messages,
        ]);
    }

    public function update($id)
    {
        $errors = [];
        $messages = '';        

        if(isset($_POST['id_employes']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['sexe']) && isset($_POST['service']) && isset($_POST['salaire']) ) {
            $id_employes = trim($_POST['id_employes']);
            $prenom = trim($_POST['prenom']);
            $nom = trim($_POST['nom']);
            $sexe = trim($_POST['sexe']);
            $service = trim($_POST['service']);
            $salaire = trim($_POST['salaire']);

            if(empty($prenom)) {
                $errors[] = 'Le prénom est obligatoire';
            }
            if(empty($nom)) {
                $errors[] = 'Le nom est obligatoire';
            }
            if(!is_numeric($salaire)) {
                $errors[] = 'Le salaire est obligatoire et doit être numérique';
            }

            if(empty($errors)) {
                $this->dbEntityRepository->updateOne($id_employes, $prenom, $nom, $service, $sexe, $salaire) ;
                // $messages .= 'Mise à jour des informations de ' . $prenom . ' ' . $nom ;
                header('location:index.php');
            } else {
                foreach($errors as $error) {
                    $messages .= $error . '<br>';
                }
            }

        }

        $dataEmploye = $this->dbEntityRepository->selectOne($id);

        if(!$dataEmploye) {
            header('location:index.php');
        }

        $data = $this->dbEntityRepository->selectServices();

        $services = [];

        foreach($data as $service) {
            $services[] = $service->service;
        }


        $this->render('layout.php', 'update.php', [
            'title' => 'Modifier un employé',
            'services'  => $services,
            'messages'  => $messages,
            'data'      => $dataEmploye,
        ]);
    }

    public function details($id) 
    {
        $data = $this->dbEntityRepository->selectOne($id);

        if(!$data) {
            header('location:index.php');
        }

        $this->render('layout.php', 'details.php', [
            'title' => 'Affichage de l\'employé : ',
            'data'  => $data,
        ]);

    }

    public function delete($id) 
    {
        $data = $this->dbEntityRepository->deleteOne($id);

        header('location:index.php');
    }


}