<?php 

class Compteur 
{
    public static $nbInstance = 0;
    public $nbInstanceObjet = 0;

    public function __construct ()
    {
        self::$nbInstance++;
        $this->nbInstanceObjet++;
    }
}

$c1 = new Compteur;
$c2 = new Compteur;
$c3 = new Compteur;
$c4 = new Compteur;
$c5 = new Compteur;
$c6 = new Compteur;

echo '<pre>'; var_dump($c1); echo '</pre><hr>';
echo '<pre>'; var_dump($c2); echo '</pre><hr>';
echo '<pre>'; var_dump($c3); echo '</pre><hr>';
echo '<pre>'; var_dump($c4); echo '</pre><hr>';
echo '<pre>'; var_dump($c5); echo '</pre><hr>';
echo '<pre>'; var_dump($c6); echo '</pre><hr>';

echo Compteur::$nbInstance . '<hr>'; // 6 (6 objets issus de la même class)
echo $c1->nbInstanceObjet . '<hr>'; // 1 (chaque objet a son existence propre)
echo $c4->nbInstanceObjet . '<hr>'; // 1 (chaque objet a son existence propre)