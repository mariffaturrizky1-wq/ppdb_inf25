<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUserProfile extends Model
{
    protected $table      = 'tbl_user_profile';
    protected $primaryKey = 'id_profile';

    protected $allowedFields = [
        'id_user','nama_lengkap','tempat_lahir','tanggal_lahir','jenis_kelamin',
        'agama','alamat','asal_sekolah','no_hp','foto'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
