<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table            = 'feedbacks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nama',
        'jenis_kelamin',
        'keluhan',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'keterangan',
        'foto',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nama'          => 'required|min_length[2]|max_length[150]',
        'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
        'keterangan'    => 'permit_empty|max_length[2000]',
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama wajib diisi.',
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin wajib dipilih.',
        ],
    ];
}
