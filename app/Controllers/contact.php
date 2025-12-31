<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title'    => 'Kontak PPDB SMA Kabupaten Brebes',
            'subtitle' => 'Informasi & Layanan Panitia PPDB SMA se-Kabupaten Brebes'
        ];

        return view('contact/index', $data);
    }
}
