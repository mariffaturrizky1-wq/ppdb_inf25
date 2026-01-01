<?php

namespace App\Controllers;

use App\Models\ModelPendaftaran;
use App\Models\ModelSekolah;

class Pendaftaran extends BaseController
{
    protected $pendaftaranModel;
    protected $sekolahModel;

    public function __construct()
    {
        $this->pendaftaranModel = new ModelPendaftaran();
        $this->sekolahModel     = new ModelSekolah();
    }

    public function index()
    {
        return view('pendaftaran/index', [
            'title'   => 'Pendaftaran PPDB',
            'sekolah' => $this->sekolahModel->findAll()
        ]);
    }

    public function simpan()
    {
        $this->pendaftaranModel->insert([
            'nama_lengkap'    => $this->request->getPost('nama_lengkap'),
            'nisn'            => $this->request->getPost('nisn'),
            'asal_sekolah'    => $this->request->getPost('asal_sekolah'),
            'id_sekolah'      => $this->request->getPost('id_sekolah'),
            'nilai_rata_rata' => $this->request->getPost('nilai'),
            'tanggal_daftar'  => date('Y-m-d')
        ]);

        return redirect()->to('/pendaftaran')
            ->with('success', 'Pendaftaran berhasil disimpan');
    }
}
