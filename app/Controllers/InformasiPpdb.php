<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlurPpdbModel;
use App\Models\JadwalPpdbModel;

class InformasiPpdb extends BaseController
{
    protected $alurModel;
    protected $jadwalModel;
    protected $db;

    public function __construct()
    {
        $this->alurModel   = new AlurPpdbModel();
        $this->jadwalModel = new JadwalPpdbModel();
        $this->db          = \Config\Database::connect();
    }

    public function index()
    {
        // Ambil pengumuman TERBARU tanpa asumsi nama kolom tanggal/slug
        // hanya ambil 10 data terakhir berdasarkan id (pasti ada)
        $pengumuman = $this->db->table('pengumuman')
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get()
            ->getResultArray();

        $data = [
            'judul'      => 'Informasi PPDB',
            'alur'       => $this->alurModel->where('aktif', 1)->orderBy('langkah', 'ASC')->findAll(),
            'jadwal'     => $this->jadwalModel->where('aktif', 1)->orderBy('urutan', 'ASC')->findAll(),
            'pengumuman' => $pengumuman,
        ];

        return view('informasi_ppdb/index', $data);
    }
}
