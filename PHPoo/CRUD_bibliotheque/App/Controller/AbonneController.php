<?php 


namespace App\Controller;

use \Core\Controller;
use \App\Model\Abonne;

class AbonneController extends Controller
{
    public function index()
    {
        $abonne = new Abonne;

        return $this->render('layout.php', 'abonne/affichage.php', [
            'data' => $abonne->SelectAll(),
        ]);
    }

}