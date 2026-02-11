<?php 


class Developpeur  
{
    public function getCompetences()
    {
        return 'JS, PHP, React, HTML, CSS, Laravel, NodeJS';
    }
    public function getHoraires()
    {
        return '8h-17h';
    }
}

class Commercial 
{
    public function getCompetences()
    {
        return 'Devis, Création projet, relation client';
    }
    public function getHoraires()
    {
        return '9h-18h';
    }
}
// A partir de PHP 8.2, le fait de déclarer des propriétés non déclarées dans la class  est déprécié, L'attribut suivant permet de pallier à ce souci. (pas forcement une bonne pratique)
// Les attributs en PHP, introduits à partir de PHP 8, sont une fonctionnalité qui permet d'ajouter des meta données aux classes , methodes, propriétés ...
#[\AllowDynamicProperties]
class Entreprise
{
    public $nombre = 0;

    public function appelUnEmploye($metier)
    {
        $this->nombre++;
        $this->{'monEmploye' . $this->nombre} = new $metier;

        return $this->{'monEmploye' . $this->nombre};
    }
}

$entreprise = new Entreprise;

$entreprise->appelUnEmploye('Developpeur');
$entreprise->appelUnEmploye('Commercial');
$entreprise->appelUnEmploye('Developpeur');

echo '<pre>'; print_r($entreprise); echo '</pre>';

echo $entreprise->monEmploye1->getCompetences() . '<hr>';
echo $entreprise->monEmploye2->getCompetences() . '<hr>';
echo $entreprise->monEmploye3->getHoraires() . '<hr>';

//-------------

// Il est possible de créer des variables dynamiquement
// $tab = array('fruit' => 'pomme', 'nombre' => 3, 'prix' => 1.5);

// // pour créer les variables :
// foreach($tab AS $index => $value) {
//     ${$index} = $value;
// }

// echo 'Fruit : ' . $fruit . '<br>';
// echo 'Nombre : ' . $nombre . '<br>';
// echo 'Prix : ' . $prix . '<br>';