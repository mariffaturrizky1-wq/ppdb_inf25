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
        $q        = trim((string) $this->request->getGet('q'));
        $kategori = (string) $this->request->getGet('kategori');
        $sort     = (string) ($this->request->getGet('sort') ?? 'terbaru');

        // base: hanya yang aktif
        $builder = $this->pengumuman->aktif();

        // filter kategori
        if ($kategori && $kategori !== 'Semua') {
            $builder = $builder->where('kategori', $kategori);
        }

        // search
        if ($q !== '') {
            $builder = $builder->groupStart()
                ->like('judul', $q)
                ->orLike('ringkasan', $q)
                ->orLike('isi', $q)
                ->groupEnd();
        }

        // sorting
        if ($sort === 'terlama') {
            $builder = $builder->orderBy('created_at', 'ASC');
        } elseif ($sort === 'aktif') {
            $builder = $builder->orderBy('is_active', 'DESC')
                               ->orderBy('created_at', 'DESC');
        } else {
            $builder = $builder->orderBy('created_at', 'DESC'); // terbaru
        }

        $perPage = 9;

        return view('pengumuman/index', [
            'title'      => 'Pengumuman PPDB',
            'subtitle'   => 'PPDB Online SMA',
            'pengumuman' => $builder->paginate($perPage),
            'pager'      => $this->pengumuman->pager,
            'q'          => $q,
            'kategori'   => $kategori ?: 'Semua',
            'sort'       => $sort,
        ]);
    }

    public function detail($slug)
    {
        $data = $this->pengumuman->where('slug', $slug)->first();

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('pengumuman/detail', [
            'title'    => $data['judul'],
            'subtitle' => 'Detail Pengumuman',
            'p'        => $data
        ]);
    }
}
