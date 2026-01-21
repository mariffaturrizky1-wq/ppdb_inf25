<?php

namespace App\Models;

use CodeIgniter\Model;

class AlurPpdbModel extends Model
{
    protected $table      = 'alur_ppdb';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'langkah',
        'judul',
        'deskripsi',
        'aktif'
    ];

    protected $useTimestamps = false;
}
