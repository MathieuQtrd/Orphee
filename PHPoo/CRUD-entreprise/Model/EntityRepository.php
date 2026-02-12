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

    // Pour enregistrer un nouvel employé
    public function insertOne($prenom, $nom, $service, $sexe, $salaire) 
    {
        $data = $this->getDb()->prepare("INSERT INTO employes (id_employes, prenom, nom, service, sexe, salaire, date_embauche) VALUES (NULL, :prenom, :nom, :service, :sexe, :salaire, now())");
        $data->bindParam(':prenom', $prenom);
        $data->bindParam(':nom', $nom);
        $data->bindParam(':service', $service);
        $data->bindParam(':sexe', $sexe);
        $data->bindParam(':salaire', $salaire);
        $data->execute();

        return $data->rowCount();
    }

    // Pour modifier un employé
    public function updateOne($id_employes, $prenom, $nom, $service, $sexe, $salaire) 
    {
        $data = $this->getDb()->prepare("UPDATE employes SET prenom = :prenom, nom = :nom, service = :service, sexe = :sexe, salaire = :salaire WHERE id_employes = :id_employes");
        $data->bindParam(':id_employes', $id_employes);
        $data->bindParam(':prenom', $prenom);
        $data->bindParam(':nom', $nom);
        $data->bindParam(':service', $service);
        $data->bindParam(':sexe', $sexe);
        $data->bindParam(':salaire', $salaire);
        $data->execute();

        return $data->rowCount();
    }

    // Pour supprimer un employé
    public function deleteOne($id) 
    {
        $data = $this->getDb()->prepare("DELETE FROM employes WHERE id_employes = :id");
        $data->bindParam(':id', $id);
        $data->execute();

        return $data->rowCount();
    }

    // Récupération des services
    public function selectServices()
    {
        $data = $this->getDb()->query("SELECT DISTINCT service FROM employes");
        return $data->fetchAll(\PDO::FETCH_OBJ);
    }

}