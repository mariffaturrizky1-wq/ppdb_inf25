<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
            $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Home',
        ];
        return view('template/v_home' , $data);

    }
}
