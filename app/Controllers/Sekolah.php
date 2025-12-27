<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSekolah;

class Sekolah extends BaseController
{
    protected $ModelSekolah;

    public function __construct()
    {
        $this->ModelSekolah = new ModelSekolah();
        helper('form');
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

    if ($keyword) {
        $sekolah = $this->ModelSekolah->searchSekolah($keyword);
    } else {
        $sekolah = $this->ModelSekolah->getAllSekolah();
    }
        $data = [
        'title'    => 'PPDB Online',
        'subtitle' => 'Sekolah',
        'sekolah'  => $sekolah,
        'keyword' =>  $keyword,
    ];

    return view('admin/v_sekolah', $data);

    }
    public function create()
    {
    return view('sekolah/create');

    }


    public function insertData()
    {
    if (! $this->validate([
        'nama_sekolah' => 'required',
        'alamat'       => 'required',
        'kuota'        => 'required|numeric'
    ])) {
        return redirect()->back()->withInput();
    }

    $data = [
        'nama_sekolah' => $this->request->getPost('nama_sekolah'),
        'alamat'       => $this->request->getPost('alamat'),
        'kuota'        => $this->request->getPost('kuota')
    ];

    $this->ModelSekolah->insertData($data);

    session()->setFlashdata('pesan', 'Data sekolah berhasil disimpan');

    // ✅ INI YANG BENAR
    return redirect()->to('sekolah');
    }

public function update()
{
    $id = $this->request->getPost('id_sekolah');

        if (!$id || $id == 0) {
            return redirect()->back()->with('error', 'ID sekolah tidak valid');
        }

        $data = [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat'       => $this->request->getPost('alamat'),
            'kuota'        => $this->request->getPost('kuota'),
        ];

        $this->ModelSekolah
            ->where('id_sekolah', (int)$id)
            ->set($data)
            ->update();


        return redirect()->to(base_url('sekolah'))
                        ->with('success', 'Data berhasil diupdate');
}


public function delete()
{
    $id = $this->request->getPost('id_sekolah');

    $this->ModelSekolah
        ->where('id_sekolah', $id)
        ->delete();

    return redirect()->to('sekolah')
        ->with('success', 'Data berhasil dihapus');
}

}
