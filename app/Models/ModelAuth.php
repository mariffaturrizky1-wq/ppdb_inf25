<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id'; // atau id_user


    protected $allowedFields = [
        'nama_user',
        'email',
        'password',
        'foto',
        'level'
    ];

    // ================= LOGIN =================
    public function login_user($email, $password)
    {
        $user = $this->where('email', $email)->first();

        if (!$user) {
            return false;
        }

        // CEK PASSWORD HASH
        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
