<?php 

namespace Model;

use PDOException;

class EntityRepository
{
    private $db; // la bdd
    public $table; // si on souhaite changer la table pour nos requete

    public function getDb()
    {
        if(!$this->db) {
            $infos = simplexml_load_file('App/config.xml');

            try {
                $this->db = new \PDO('mysql:host=' . $infos->host . ';dbname=' . $infos->db, $infos->user, $infos->password, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // Pour la gestion des erreurs
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // pour forcer l'utf-8
                ]);
            } catch(\PDOException $e) {

            }
        }
        return $this->db;
    }

    // Pour récupérer la liste de tous les employés
    public function selectAll()
    {
        $data = $this->getDb()->query("SELECT * FROM employes");
        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

    // Pour récupérer un seul employé
    public function selectOne($id) 
    {
        $data = $this->getDb()->prepare("SELECT * FROM employes WHERE id_employes = :id");
        $data->bindParam(':id', $id);
        $data->execute();

        return $data->fetch(\PDO::FETCH_OBJ);
    }

}