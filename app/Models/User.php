<?php

namespace App\Models;

use System\Model;

class User extends Model
{
    public function all()
    {
        $sql = "SELECT id, name, email, password FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
