<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul', 'slug', 'ringkasan', 'isi', 'kategori', 'is_active', 'created_at'
    ];

    // Kalau created_at diisi otomatis oleh DB, biarkan false.
    // Kalau kamu pakai CI timestamps, set true dan atur createdField/updatedField.
    protected $useTimestamps = false;

    public function aktif()
    {
        // RETURN BUILDER (bukan array), biar bisa lanjut ->like(), ->orderBy(), ->paginate()
        return $this->where('is_active', 1);
        // kalau mau default terbaru dari sini, pakai:
        // return $this->where('is_active', 1)->orderBy('created_at', 'DESC');
    }
}
