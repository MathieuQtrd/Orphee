<?php 

/*
Exercice : 
----------
Créer la class suivante :
class User

propriétés (toutes en private) :
    - pseudo
    - age
    - email

//  mettre en place les getters et les setters pour chacune des propriétés
    // Controles à appliquer dans les setters :
        - le pseudo doit avoir entre 4 et 14 caractères inclus
        - l'age doit être numérique
        - verifier le format du mail

// Générer les erreurs potentielles avec trigger_error
// n'hésitez à utiliser un constructeur
// Faire des tests
*/

class User 
{
    private $pseudo;
    private $age;
    private $email;

    public function __construct($pseudo, $age, $email)
    {
        echo 'Instanciation<hr>';
        $this->setPseudo($pseudo);
        $this->setAge($age);
        $this->setEmail($email);
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($nouveauPseudo)
    {
        if(is_string($nouveauPseudo) && iconv_strlen($nouveauPseudo) > 3 && iconv_strlen($nouveauPseudo) < 15) {
            $this->pseudo = $nouveauPseudo;
        } else {
            trigger_error('Attention, le pseudo doit contenir une chaine de caractères et doit avoir entre 4 et 14 caracctères inclus', E_USER_WARNING);
        }
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($nouveauAge)
    {
        if(is_int($nouveauAge)) {
            $this->age = $nouveauAge;
        } else {
            trigger_error('Attention, l\'age doit être numérique', E_USER_WARNING);
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($nouveauEmail)
    {
        if(!filter_var($nouveauEmail, FILTER_VALIDATE_EMAIL)) {            
            trigger_error('Attention, le mail doit avoir un format valide', E_USER_WARNING);
        } else {
            $this->email = $nouveauEmail;
        }
    }
}

$user1 = new User('Mathieu', 45, 'mathieu@mail.com');

echo '<pre>'; var_dump($user1); echo '</pre>';

echo $user1->getPseudo() . '<br>';
echo $user1->getAge() . '<br>';
echo $user1->getEmail() . '<br>';

$user1->setPseudo('Marie');
$user1->setAge(40);
$user1->setEmail('marie@mail.fr');

echo '<pre>'; var_dump($user1); echo '</pre>';

$user1->setPseudo('abc');
$user1->setAge('abc');
$user1->setEmail('abc');