<?php 

// L'idée principale avec les traits est de fournir un moyen de réutiliser du code entre class
// Un trait permet de pallier à la limitation des héritages : une class ne peut recevoir en héritage qu'une seule class à la fois.
// Il n'y a pas de limite sur le nombre de trait que la class peut recevoir 
// Le but est de faciliter la réutilisation du code  et non de fournir un systeme d'héritage complet
// Les methodes et propriétés du trait sont "copiées" dans la class qui utilise le trait. Un élément private dans le trait sera un element private dans la class de l'appel

// Il est possible de surcharger une methode du trait
// En cas de surcharge d'une methode présente dans la class parente, le trait et la class enfant
//  Priorité pour la surcharge : class enfant > trait > class parent

trait Identifiable
{
    public function afficherID()
    {
        return 'Mon ID est : 35';
    }
}

trait Authentifiable 
{
    public function seConnecter()
    {
        return 'Je me connecte';
    }
}

class Utilisateur
{
    use Identifiable, Authentifiable;
    // via le mot clé use, le contenu de ces traits est disponible dans ma class Utilisateur

}

// Attention, on ne peut pas instancier un trait
$user1 = new Utilisateur;

echo $user1->seConnecter() . '<br>';
echo $user1->afficherID() . '<br>';


//-----------------------------

class MaClass1
{
    public function direBonjour()
    {
        return 'Bonjour';
    }
}

trait Trait1
{
    public function direBonjour()
    {
        return 'Bonjour à tous';
    }
}

trait Trait2 
{
    public function direBonjour()
    {
        return 'Hello';
    }
}

class MaClass2 extends MaClass1
{
    use Trait1;

    public function direBonjour()
    {
        return 'Hello World';
    }

}
$objet = new MaClass2;

echo $objet->direBonjour() . '<br>';

// Une class peut surcharger une methode de la class parente reçue en héritage
// Si la class reçoit en plus un trait ayant la même methode que la class reçue en héritage : celle du trait est prioritaire
// Ordre de priorité : class enfant > trait > class parente

// Si deux traits ont une même methode, cela crée un conflit
// Il est possible de gérer le conflit

class MaClass3 extends MaClass1 
{
    use Trait1, Trait2 {
        Trait1::direBonjour insteadOf Trait2;
        Trait2::direBonjour AS direBonjour2;
        // lorsque plusieurs traits ont une methode du même nom, il est possible de préciser laquelle sera utilisée en utilisant insteadOf
        // Il est également possible de récupérer celle de l'autre trait en lui donnant un nom différent via AS
    }
}

$objet2 = new MaClass3;

echo $objet2->direBonjour() . '<br>';
echo $objet2->direBonjour2() . '<br>';