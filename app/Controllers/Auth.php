<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $ModelAuth;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        helper('form');
    }

    public function index()
    {
        return redirect()->to(base_url('auth/login'));
    }

    // ================= LOGIN =================
    public function login()
    {
        $data = [
            'title' => 'Login',
            'subtitle' => 'Form Login'
        ];
        return view('v_login-user', $data);
    }

    public function cek_login_user()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|valid_email'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required'
            ]
        ])) {

            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = $this->ModelAuth->login_user($email, $password);

            if ($user) {
                // SET SESSION
                session()->set([
                    'login'     => true,          // kamu pakai ini
                    'id_user'   => $user['id_user'],
                    'nama_user' => $user['nama_user'],
                    'email'     => $user['email'],
                    'foto'      => $user['foto'] ?? null,
                    'level'     => $user['level'] ?? 'user'
                ]);

                // REDIRECT: admin ke admin, user ke profile
                if (session()->get('level') === 'admin') {
                    return redirect()->to(base_url('admin'));
                }

                return redirect()->to(base_url('profile'));
            } else {
                session()->setFlashdata('pesan', 'Email atau Password salah!');
                return redirect()->to(base_url('auth/login'));
            }
        }

        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('auth/login'));
    }

    // ================= DAFTAR =================
    public function daftar()
    {
        $data = [
            'title' => 'Daftar',
            'subtitle' => 'Form Pendaftaran'
        ];
        return view('v_daftar-user', $data);
    }

    public function simpan_daftar()
    {
        if ($this->validate([
            'nama_user' => 'required',
            'email' => 'required|valid_email|is_unique[tbl_user.email]',
            'password' => 'required|min_length[6]'
        ])) {

            $this->ModelAuth->insert([
                'nama_user' => $this->request->getPost('nama_user'),
                'email'     => $this->request->getPost('email'),
                'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'level'     => 'user'
            ]);

            session()->setFlashdata('pesan', 'Pendaftaran berhasil, silakan login');
            return redirect()->to(base_url('auth/login'));
        }

        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->back();
    }

    // ================= LOGOUT =================
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', 'Logout berhasil');
        return redirect()->to(base_url('auth/login'));
    }
}
