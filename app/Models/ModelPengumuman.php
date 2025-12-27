<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul','slug','ringkasan','isi','kategori','is_active'
    ];

    public function aktif()
    {
        return $this->where('is_active', 1)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
