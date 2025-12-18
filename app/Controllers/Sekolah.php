<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Sekolah extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Sekolah',
        ];
        return view('admin/v_sekolah' , $data);
    }
}
