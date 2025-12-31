<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengumuman;
use App\Models\ModelSekolah; // <-- kalau model sekolah kamu namanya beda, ganti ini

class Admin extends BaseController
{
    public function index()
    {
        // Proteksi login
        if (!session()->get('login')) {
            return redirect()->to(base_url('auth/login'));
        }

        $pengumumanModel = new ModelPengumuman();
        $sekolahModel    = new ModelSekolah();

        // Statistik ringkas
        $totalSekolah = (int) $sekolahModel->countAllResults();

        $sumKuotaRow = $sekolahModel->selectSum('kuota')->first();
        $totalKuota  = (int) ($sumKuotaRow['kuota'] ?? 0);

        $totalPengumuman = (int) $pengumumanModel->countAllResults();
        $aktifPengumuman = (int) $pengumumanModel->where('is_active', 1)->countAllResults();

        // 5 pengumuman terbaru
        $pengumumanTerbaru = $pengumumanModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        $data = [
            'title' => 'Dashboard',
            'subtitle' => 'Beranda Admin',

            // data untuk view
            'totalSekolah' => $totalSekolah,
            'totalKuota' => $totalKuota,
            'totalPengumuman' => $totalPengumuman,
            'aktifPengumuman' => $aktifPengumuman,
            'pengumumanTerbaru' => $pengumumanTerbaru
        ];

        return view('admin/v_dashboard', $data);
    }
}
