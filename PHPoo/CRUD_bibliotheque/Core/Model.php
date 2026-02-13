<?php  

namespace Core;

class Model 
{
    protected $db; // la bdd

    public function __construct()
    {
        if(!$this->db) {
            $infos = simplexml_load_file(__DIR__ . '/config.xml');

            try {
                $this->db = new \PDO('mysql:host=' . $infos->host . ';dbname=' . $infos->db, $infos->user, $infos->password, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // Pour la gestion des erreurs
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // pour forcer l'utf-8
                ]);
            } catch(\PDOException $e) {
                exit('Erreur de connexion : ' . $e->getMessage());
            }
        }
    }

    public function getLastInsertId()
    {
        return $this->db->lastInsertId();
    }

}