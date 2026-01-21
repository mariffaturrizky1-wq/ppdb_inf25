<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('login')) {
            session()->setFlashdata('pesan', 'Anda belum login!');
            return redirect()->to(base_url('auth/login'));
        }

        if (session()->get('level') !== 'admin') {
            session()->setFlashdata('pesan', 'Akses ditolak! Hanya admin.');
            return redirect()->to(base_url('profile'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // kosong
    }
}
