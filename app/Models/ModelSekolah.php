<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    protected $table      = 'tbl_datasekolah';
    protected $primaryKey = 'id_sekolah';

    protected $allowedFields = [
        'id_sekolah',
        'nama_sekolah',
        'alamat',
        'kuota'
    ];
    public function getAllData()
    {
        return $this->db->table('tbl_datasekolah')
            ->orderBy('id_sekolah', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getAllSekolah()
    {
        return $this->db->table('tbl_datasekolah')
            ->orderBy('id_sekolah', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function searchSekolah($keyword)
    {
        return $this->db->table('tbl_datasekolah')
            ->like('nama_sekolah', $keyword)
            ->orLike('alamat', $keyword)
            ->orderBy('id_sekolah', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_datasekolah')->insert($data);
    }

}

