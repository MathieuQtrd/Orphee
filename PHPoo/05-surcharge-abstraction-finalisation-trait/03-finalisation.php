<?php  

// Une class finale a pour but de ne pas pouvoir être reçue en héritage
// Une methode finale a pour but de ne pas pouvoir être surchargée

final class Application
{
    public function lancementApplication()
    {
        return 'Chargement de l\'application';
    }
}

$app = new Application;

echo '<pre>'; var_dump($app); echo '</pre>';
echo '<pre>'; var_dump(get_class_methods($app)); echo '</pre>';

echo $app->lancementApplication() . '<hr>';

// erreur : Class Ap cannot extend final class Application

// class Ap extends Application 
// {

// }

class App 
{
    public function f1()
    {
        return 'dimanche';
    }

    final function lancementSemaine()
    {
        return 'Début de la semaine : ' . $this->f1();
    }
}

class AppFrance extends app
{
    public function f1()
    {
        return 'lundi';
    }

    // final function lancementSemaine() // Cannot override final method
    // {
    //     return 'Début de la semaine : ' . $this->f1();
    // }
}

$objet1 = new App;
echo '<pre>'; var_dump(get_class_methods($objet1)); echo '</pre>';
echo $objet1->lancementSemaine() . '<hr>';

$objet2 = new AppFrance;
echo '<pre>'; var_dump(get_class_methods($objet2)); echo '</pre>';
echo $objet2->lancementSemaine() . '<hr>';