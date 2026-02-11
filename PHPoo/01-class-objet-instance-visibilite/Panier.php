<?php  

// La programmation orientée objet (POO) en PHP repose sur un ensemble de concept clés comme des classes, des objets et des instances ...

// Une class est le modèle de construction
// Pour un obtenir un objet, il faudra le créer depuis une class
// Ensuite chaque objet a son existence propre (instance)
// Un objet se crée toujours avec le mot clé obligatoire new
// Les class ne sont pas sensibles à la casse
// Par convention : on utilise l'approche StudlyCaps (une majuscule pour la première lettre)

// Outil de base : une variable simple (une information typée)
// Outil amélioré : un tableau array (un ensemble d'information)
// Outil amélioré : un objet (un ensemble d'information mais aussi un ensemble de fonction)
// une information dans un objet : une propriété ou un attribut de l'objet
// une fonction dans un objet : une methode de l'objet

// Visibilité :
// public : accessible directement sur l'objet
// protected : accessible uniquement à l'intérieur de l'objet. Nous aurons des outils liés (voir dossier 2 getters et les setters)
// private : comme les éléments protected mais en cas d'héritage les élément private ne seront pas fournis lors de l'héritage.

// Déclaration d'un class (ici la class panier)

class Panier 
{
    // propriétés de l'objet
    public $nbProduit = 2;
    public $montantTotal;
    protected $tva;
    private $id;

    // methodes de l'objet
    protected function ajouterUnArticleAuPanier($id)
    {
        return 'L\article n° : ' .  $id . ' a bien été rajouté à votre panier<br>';
    }

    private function retirerUnArticleAuPanier($id)
    {
        return 'L\article n° : ' .  $id . ' a bien été retiré de votre panier<br>'; 
    }

    public function afficherDuPanier()
    {
        return 'Voici la liste des articles présent dans votre panier <br>';
    }
}

// echo $nbProduit . '<br>'; // Undefined variable $nbProduit, afin de manipuler les éléments de la class, il nous faudra toujours passer par un objet

// Instanciation
$panier1 = new Panier;
$panier2 = new Panier();

// Pour voir les propriétés :
echo '<pre>'; var_dump($panier1); echo '</pre>';
echo '<pre>'; print_r($panier2); echo '</pre>';

/*
C:\wamp64\www\PHP_orphee_18\PHPoo\01-class-objet-instance-visibilite\Panier.php:58:
object(Panier)[1]
  public 'nbProduit' => int 2
  public 'montantTotal' => null
  protected 'tva' => null
  private 'id' => null
Panier Object
(
    [nbProduit] => 2
    [montantTotal] => 
    [tva:protected] => 
    [id:Panier:private] => 
)
*/

// Pour voir les methodes publiques de l'objet
echo '<pre>'; var_dump(get_class_methods($panier1)); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($panier2)); echo '</pre>';


//----------
// Dans un objet on pioche avec la fleche
echo $panier1->nbProduit . '<br>';

echo $panier1->afficherDuPanier();

// echo $panier1->tva; // Cannot access protected property

//---
// Il est possible de voir les methodes protected et private d'un objet en utilisant une class prédéfinie de PHP ReflectionClass

$reflectionClass = new ReflectionClass('Panier');

$methods = $reflectionClass->getMethods();

echo '<pre>'; var_dump($methods); echo '</pre>';

foreach($methods AS $method) 
{
    echo $method->getName() . ' - Public : ' . $method->isPublic() . ' - Protected : ' . $method->isProtected() . ' - Private : ' . $method->isPrivate() . '<br>';
}    
