<?php 

// une connexion bdd via le pattern singleton
// Cela nous garanti de n'avoir qu'une seule instance de la connexion bdd dans notre projet

class Database 
{
    private static $instance;
    private $connexion;

    private function __construct()
    {
        // connexion bdd
        $host = 'localhost';
        $dbname = 'entreprise';
        $login = 'root';
        $password = '';

        // on déclenche la connexion
        $this->connexion = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $login, $password);
    }

    private function __clone() {}

    public static function getInstance()
    {
        if(self::$instance == null) {
            self::$instance = new Database;
        }
        return self::$instance;
    }

    public function getDb()
    {
        return $this->connexion;
    }

}

$db = Database::getInstance();

echo '<pre>'; var_dump($db); echo '</pre><hr>';

$db2 = Database::getInstance();

echo '<pre>'; var_dump($db2); echo '</pre><hr>';

$connexion = $db->getDb();

$result = $connexion->query('SELECT * FROM employes');

foreach($result AS $line) {
    echo '- ' . $line['prenom'] . '<br>';
}