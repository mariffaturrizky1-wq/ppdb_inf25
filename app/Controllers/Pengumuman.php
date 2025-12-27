<?php

namespace App\Controllers;

use App\Models\ModelPengumuman;

class Pengumuman extends BaseController
{
    protected $pengumuman;

    public function __construct()
    {
        $this->pengumuman = new ModelPengumuman();
    }

    public function index()
    {
        return view('pengumuman/index', [
            'title' => 'Pengumuman PPDB',
            'subtitle' => 'PPDB Online SMA',
            'pengumuman' => $this->pengumuman->aktif()
        ]);
    }

    public function detail($slug)
    {
        $data = $this->pengumuman->where('slug', $slug)->first();

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('pengumuman/detail', [
            'title' => $data['judul'],
            'subtitle' => 'Detail Pengumuman',
            'p' => $data
        ]);
    }
}
