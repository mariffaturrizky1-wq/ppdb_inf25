<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perbaikan extends BaseController
{
    public function index()
    {
        // wajib login user
        if (!session()->get('login')) {
            session()->setFlashdata('pesan', 'Anda belum login!');
            return redirect()->to(base_url('auth/login'));
        }

        $db = db_connect();

        // ambil pendaftaran user berdasarkan session
        $pendaftaran = $db->table('pendaftaran')
            ->where('nisn', session()->get('nisn'))
            ->orderBy('id_pendaftaran', 'DESC')
            ->get()
            ->getRowArray();

        if (!$pendaftaran) {
            session()->setFlashdata('pesan', 'Data pendaftaran tidak ditemukan.');
            return redirect()->to(base_url('pendaftaran'));
        }

        $dokumen = $db->table('tbl_dokumen')
            ->where('pendaftaran_id', $pendaftaran['id_pendaftaran'])
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $data = [
            'title' => 'Perbaikan Dokumen',
            'subtitle' => 'Upload Ulang Dokumen',
            'pendaftaran' => $pendaftaran,
            'dokumen' => $dokumen,
        ];

        return view('perbaikan/index', $data);
    }

    public function upload()
    {
        if (!session()->get('login')) {
            session()->setFlashdata('pesan', 'Anda belum login!');
            return redirect()->to(base_url('auth/login'));
        }

        $db = db_connect();

        $pendaftaran = $db->table('pendaftaran')
            ->where('nisn', session()->get('nisn'))
            ->orderBy('id_pendaftaran', 'DESC')
            ->get()
            ->getRowArray();

        if (!$pendaftaran) {
            session()->setFlashdata('pesan', 'Data pendaftaran tidak ditemukan.');
            return redirect()->to(base_url('pendaftaran'));
        }

        $idDok = (int) $this->request->getPost('id_dokumen');
        if (!$idDok) {
            session()->setFlashdata('pesan', 'Dokumen tidak valid.');
            return redirect()->back();
        }

        // ambil dokumen yang dipilih
        $dok = $db->table('tbl_dokumen')
            ->where('id', $idDok)
            ->where('pendaftaran_id', $pendaftaran['id_pendaftaran'])
            ->get()
            ->getRowArray();

        if (!$dok) {
            session()->setFlashdata('pesan', 'Dokumen tidak ditemukan.');
            return redirect()->back();
        }

        $file = $this->request->getFile('file_dokumen');
        if (!$file || !$file->isValid()) {
            session()->setFlashdata('pesan', 'File upload tidak valid.');
            return redirect()->back();
        }

        $allowed = ['pdf','jpg','jpeg','png'];
        $ext = strtolower($file->getClientExtension());
        if (!in_array($ext, $allowed, true)) {
            session()->setFlashdata('pesan', 'Format file harus PDF/JPG/JPEG/PNG.');
            return redirect()->back();
        }

        // folder upload
        $uploadDir = WRITEPATH . 'uploads/ppdb';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $newName = $file->getRandomName();
        if (!$file->move($uploadDir, $newName)) {
            session()->setFlashdata('pesan', 'Gagal memindahkan file.');
            return redirect()->back();
        }

        // path yang disimpan ke DB (public access biasanya pakai symlink/writable->public)
        // kamu sebelumnya pakai "uploads/ppdb/{name}" jadi kita konsisten
        $newPath = "uploads/ppdb/{$newName}";

        $db->transBegin();
        try {
            // update dokumen jadi pending lagi
            $db->table('tbl_dokumen')
                ->where('id', $idDok)
                ->update([
                    'file_path' => $newPath,
                    'status'    => 'pending',
                ]);

            // update status pendaftaran jadi submit (menunggu dicek admin lagi)
            $db->table('pendaftaran')
                ->where('id_pendaftaran', $pendaftaran['id_pendaftaran'])
                ->update([
                    'status' => 'submit',
                ]);

            // log
            $db->table('tbl_log')->insert([
                'pendaftaran_id' => $pendaftaran['id_pendaftaran'],
                'user_id'        => session()->get('id_user') ?? null,
                'aksi'           => 'UPLOAD ULANG DOKUMEN: ' . ($dok['jenis'] ?? '-'),
                'waktu'          => date('Y-m-d H:i:s'),
            ]);

            if ($db->transStatus() === false) {
                throw new \Exception('Transaksi gagal.');
            }

            $db->transCommit();
            session()->setFlashdata('pesan', 'Berhasil upload ulang. Status kembali menunggu verifikasi admin.');
            return redirect()->to(base_url('validasi'));

        } catch (\Throwable $e) {
            $db->transRollback();
            session()->setFlashdata('pesan', 'Gagal upload ulang: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
