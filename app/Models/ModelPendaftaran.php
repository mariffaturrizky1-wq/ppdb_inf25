<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendaftaran extends Model
{
    protected $table      = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    protected $allowedFields = [
        'nama_lengkap',
        'nisn',
        'asal_sekolah',
        'id_sekolah',
        'nilai_rata_rata',
        'tanggal_daftar'
    ];
}
