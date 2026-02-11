<?php 

// Class classique : Un objet complet
    // Trait : un ensemble d'outils passés à l'objet
// Class abstraite : Une class incomplète (une base)
    // Interface : Ce qu'on doit faire (des outils à compléter)

// Garantir une structure cohérente, promouvoir du code flexible, faciliter les test, le travail en équipe et le développement évolutif.
// Une interface est une liste de méthode sans contenu qui permet de garantir que toutes les classes qui l'implemente contiennent ces methodes. 
// Ces class doivent obligatoirement redéfinir les methodes de l'interface.

// Contraintes saines
// Une interface n'est pas instanciable. C'est plutôt un point commun entre les classes qui vont l'implémenter
// Toutes les methodes d'une interface doivent être public
// Une interface ne peut pas contenir de propriété
// Une class peut implementer plusieurs interfaces
// Une class peut hériter d'une autre class et aussi implémenter des interfaces

// class Exemple extends AutreClass implements interface1, interface2, ...

interface Mouvement
{
    public function deplacement();
}


class Bateau implements Mouvement
{
    public function deplacement()
    {
        return 'Je le déplace sur l\'eau';
    }
}

class Avion implements Mouvement
{
    public function deplacement()
    {
        return 'Je le déplace dans les airs';
    }
}

$bateau1 = new Bateau;
$avion1 = new Avion;

echo $bateau1->deplacement() . '<hr>';
echo $avion1->deplacement() . '<hr>';

interface iA 
{
    public function testA();
}
interface iB 
{
    public function testB();
}

class A implements iA, iB
{
    public function testA() {
        return 'A';
    }

    public function testB() {
        return 'B';
    }
}

$objetA = new A;

echo $objetA->testA() . '<hr>';
echo $objetA->testB() . '<hr>';

//-----------
// Une interface peut recevoir une autre interface en héritage
interface iC 
{
    public function testC();
}
interface iD 
{
    public function testD();
}
interface iE extends iC, iD
{
    public function testE();
}

class B implements iE 
{
    public function testC() {
        return 'C';
    }

    public function testD() {
        return 'D';
    }

    public function testE() {
        return 'E';
    }
}

$objet3 = new B;
echo $objet3->testC() . ' | ';
echo $objet3->testD() . ' | ';
echo $objet3->testE() . '<br>';