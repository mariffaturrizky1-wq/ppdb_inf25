<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUserProfile;

class Profile extends BaseController
{
    public function index()
    {
        // pastikan login (sesuai Auth: session key = 'login')
        if (!session()->get('login')) {
            return redirect()->to(base_url('auth/login'));
        }

        $id_user = session()->get('id_user');
        $profileModel = new ModelUserProfile();

        // ambil profil
        $profile = $profileModel->where('id_user', $id_user)->first();

        // kalau belum ada profil -> buat otomatis
        if (!$profile) {
            $profileModel->insert([
                'id_user'      => $id_user,
                'nama_lengkap' => session()->get('nama_user') ?? 'Siswa'
            ]);

            $profile = $profileModel->where('id_user', $id_user)->first();
        }

        return view('profile/index', [
            'title'   => 'Profile Siswa',
            'profile' => $profile
        ]);
    }

    public function update()
    {
        if (!session()->get('login')) {
            return redirect()->to(base_url('auth/login'));
        }

        $id_user = session()->get('id_user');
        $profileModel = new ModelUserProfile();

        $rules = [
            'nama_lengkap'  => 'required|min_length[3]',
            'tanggal_lahir' => 'permit_empty|valid_date',
            'no_hp'         => 'permit_empty|min_length[10]|max_length[20]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama'),
            'alamat'        => $this->request->getPost('alamat'),
            'asal_sekolah'  => $this->request->getPost('asal_sekolah'),
            'no_hp'         => $this->request->getPost('no_hp'),
        ];

        $profileModel->where('id_user', $id_user)->set($data)->update();

        return redirect()->to(base_url('profile'))->with('success', 'Profil berhasil disimpan.');
    }
}
