<?php 

// Le construction __construct
    // permet de récupérer les arguments fournis lors de l'instanciation d'un objet

// $this 
    // Le mot clé $this fait référence à l'objet courant.

// Les getters 
    // methode publique permettant de récupérer une propriété protected ou private

// Les setters
    // methode publique permettant de modifer (et potentiellement d'appliquer des controles) d'une propriété protected ou private


class Etudiant
{
    // propiété 
    protected $prenom;

    // rajout de la methode magique __construct (les methodes magiques ont deux underscores en debut de nom)
    // Cette methode se déclenche automatiquement lors de l'instanciation avec un new
    // permet de récupérer naturellement les arguments fournis lors du new

    public function __construct($nouveauPrenom)
    {
        echo 'Instanciation, nous passons naturellement dans la methode __construct, ' . 'l\'argument fourni est : ' . $nouveauPrenom ;

        $this->setPrenom($nouveauPrenom);

    }

    // methodes
    // getter
    public function getPrenom()
    {
        return $this->prenom;
    }

    // setter
    public function setPrenom($nouveau) 
    {
        if(is_string($nouveau)) {
            $this->prenom = $nouveau;
        } else {
            // trigger_error() permet de déclencher une erreur
            // trigger_error('Attention, le prénom doit contenir une chaine de caractères', E_USER_NOTICE);
            // trigger_error('Attention, le prénom doit contenir une chaine de caractères', E_USER_ERROR);
            trigger_error('Attention, le prénom doit contenir une chaine de caractères', E_USER_WARNING);
        }
    }


}

$etudiant1 = new Etudiant('Mathieu');

// echo $etudiant1->prenom;
echo '<pre>'; var_dump($etudiant1); echo '</pre>';

echo '<pre>'; var_dump(get_class_methods($etudiant1)); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($etudiant1)); echo '</pre>';

echo 'Bonjour ' . $etudiant1->getPrenom() . ', bienvenue sur  notre site<br>';

$etudiant1->setPrenom('Math');

echo 'Bonjour ' . $etudiant1->getPrenom() . ', bienvenue sur  notre site<br>';

$etudiant1->setPrenom(123);
echo 'Bonjour ' . $etudiant1->getPrenom() . ', bienvenue sur  notre site<br>';