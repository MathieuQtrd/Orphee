<?php 

namespace App\Model;

use \Core\Model;

class Abonne extends Model
{
    public function SelectAll()
    {
        $data = $this->db->query("SELECT * FROM abonne");
        return $data->fetchAll(\PDO::FETCH_OBJ);
    }
}