<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        // opsional
    }

    public function login()
    {
        echo view('v_login-admin'); // pastikan nama file sesuai
    }
}
