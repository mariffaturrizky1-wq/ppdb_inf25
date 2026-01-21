<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Validasi extends Controller
{
    public function index()
    {
        $db = db_connect();

        // ✅ wajib login (sesuai Auth kamu)
        $idUser = session()->get('id_user');
        if (!$idUser) {
            return redirect()->to(base_url('auth/login'))
                ->with('error', 'Silakan login dulu.');
        }

        // ✅ Ambil pendaftaran terakhir milik user ini
        $pendaftaran = $db->table('pendaftaran')
            ->where('id_user', (int) $idUser)
            ->orderBy('id_pendaftaran', 'DESC')
            ->get()
            ->getRowArray();

        if (!$pendaftaran) {
            return redirect()->to(base_url('pendaftaran'))
                ->with('error', 'Kamu belum melakukan pendaftaran. Silakan daftar terlebih dahulu.');
        }

        // ✅ Normalisasi alasan admin (biar view punya key yang seragam)
        $reasonKeys = ['alasan_penolakan','alasan','catatan_admin','keterangan','catatan_validasi'];
        $alasan = '';
        foreach ($reasonKeys as $rk) {
            if (!empty($pendaftaran[$rk])) { $alasan = $pendaftaran[$rk]; break; }
        }
        $pendaftaran['alasan_admin'] = $alasan;

        // ✅ Set ulang session cache (opsional tapi membantu halaman lain)
        session()->set([
            'pendaftaran_id' => $pendaftaran['id_pendaftaran'],
            'nisn'           => $pendaftaran['nisn'],
            'no_pendaftaran' => $pendaftaran['no_pendaftaran'],
        ]);

        // Ambil dokumen pendaftaran ini
        $dokumen = $db->table('tbl_dokumen')
            ->where('pendaftaran_id', (int) $pendaftaran['id_pendaftaran'])
            ->get()
            ->getResultArray();

        // Ambil log pendaftaran ini
        $log = $db->table('tbl_log')
            ->where('pendaftaran_id', (int) $pendaftaran['id_pendaftaran'])
            ->orderBy('waktu', 'DESC')
            ->get()
            ->getResultArray();

        $data = [
            'title'       => 'Sistem PPDB Online',
            'subtitle'    => 'Validasi',
            'pendaftaran' => $pendaftaran,
            'dokumen'     => $dokumen,
            'log'         => $log,
        ];

        return view('validasi/index', $data);
    }

   public function viewDokumen($id)
{
    $db = db_connect();

    $dok = $db->table('tbl_dokumen')
        ->where('id', (int)$id)
        ->get()
        ->getRowArray();

    if (!$dok) {
        return $this->response->setStatusCode(404)->setBody('Dokumen tidak ditemukan');
    }

    // keamanan
    if (strpos($dok['file_path'], 'uploads/ppdb/') !== 0) {
        return $this->response->setStatusCode(403)->setBody('Akses ditolak');
    }

    // ✅ INI PENTING: pakai FCPATH karena file ada di public/uploads/ppdb
    $fullPath = FCPATH . $dok['file_path'];   // contoh: /.../public/uploads/ppdb/abc.jpg

    if (!is_file($fullPath)) {
        // debug cepat (hapus setelah beres)
        // return $this->response->setStatusCode(404)->setBody($fullPath);
        return $this->response->setStatusCode(404)->setBody('File tidak ada di server');
    }

    $mime = mime_content_type($fullPath) ?: 'application/octet-stream';

    return $this->response
        ->setHeader('Content-Type', $mime)
        ->setHeader('Content-Disposition', 'inline; filename="' . basename($fullPath) . '"')
        ->setBody(file_get_contents($fullPath));
}

}
