<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalPpdbModel extends Model
{
    protected $table      = 'jadwal_ppdb';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'urutan',
        'aktif'
    ];

    protected $useTimestamps = false;
}
