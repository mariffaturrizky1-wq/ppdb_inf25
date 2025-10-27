<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'subtitle' => 'Form Login',
        ];

        return view('v_login-admin', $data);
    }
}
