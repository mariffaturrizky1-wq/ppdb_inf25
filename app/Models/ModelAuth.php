<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Result;
use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login_user($email, $password)
    {
        return $this->db->table('tbl_user')->where(
            [
                'email' => $email,
                'password'  => $password
            ]
        )->get()->getRowArray();
    }
}
