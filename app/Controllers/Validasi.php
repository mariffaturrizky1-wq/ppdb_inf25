<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Validasi extends Controller
{
    public function index()
    {
        $db = db_connect();

        // Ambil identitas user dari session (sesuaikan dengan session login kamu)
        $userId = session()->get('user_id');
        $nisn   = session()->get('nisn'); // kalau kamu simpan nisn di session

        /**
         * Pilihan A (disarankan): ambil berdasarkan user_id
         * tapi tabel pendaftaran kamu belum ada kolom user_id.
         * Jadi sekarang kita pakai NISN.
         */

        if (!$nisn) {
            // fallback: kalau session belum menyimpan nisn, arahkan suruh isi dulu / login ulang
            return redirect()->to(base_url('pendaftaran'))
                ->with('error', 'NISN tidak ditemukan di sesi. Silakan login ulang / lengkapi pendaftaran.');
        }

        // Ambil pendaftaran terakhir berdasarkan NISN
        $pendaftaran = $db->table('pendaftaran')
            ->where('nisn', $nisn)
            ->orderBy('id_pendaftaran','DESC') // pastikan tabel pendaftaran punya kolom id (PK). kalau namanya beda, ganti.
            ->get()
            ->getRowArray();

        $reasonKeys = ['alasan_penolakan','alasan','catatan_admin','keterangan','catatan_validasi'];
            $alasan = '';
            foreach ($reasonKeys as $rk) {
                if (!empty($pendaftaran[$rk])) { $alasan = $pendaftaran[$rk]; break; }
            }
            $pendaftaran['alasan_admin'] = $alasan; // key seragam untuk view

        if (!$pendaftaran) {
            return redirect()->to(base_url('pendaftaran'))
                ->with('error', 'Kamu belum melakukan pendaftaran. Silakan daftar terlebih dahulu.');
        }

        // Ambil dokumen untuk pendaftaran ini
        $dokumen = $db->table('tbl_dokumen')
            ->where('pendaftaran_id', $pendaftaran['id_pendaftaran'])
            ->get()
            ->getResultArray();

        // Ambil log untuk pendaftaran ini
        $log = $db->table('tbl_log')
            ->where('pendaftaran_id', $pendaftaran['id_pendaftaran'])
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

        // PAKAI LAYOUT YANG SAMA DENGAN SISTEM (sidebar)
        return view('validasi/index', $data);
    }

    public function viewDokumen($id)
    {
        $db = db_connect();

        $dok = $db->table('tbl_dokumen')
            ->where('id', (int)$id)
            ->get()->getRowArray();

        if (!$dok) {
            return $this->response->setStatusCode(404)->setBody('Dokumen tidak ditemukan');
        }

        // keamanan: hanya file ppdb
        if (strpos($dok['file_path'], 'uploads/ppdb/') !== 0) {
            return $this->response->setStatusCode(403)->setBody('Akses ditolak');
        }

        $fullPath = WRITEPATH . $dok['file_path'];

        if (!is_file($fullPath)) {
            return $this->response->setStatusCode(404)->setBody('File tidak ada');
        }

        $mime = mime_content_type($fullPath) ?: 'application/octet-stream';

        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="'.basename($fullPath).'"')
            ->setBody(file_get_contents($fullPath));
    }

}
