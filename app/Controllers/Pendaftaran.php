<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pendaftaran extends Controller
{
    public function index()
    {
        $db = db_connect();

        $data['sekolah']    = $db->table('tbl_datasekolah')->get()->getResultArray();
        $data['jalur']      = $db->table('tbl_jalur')->where('aktif', 1)->get()->getResultArray();
        $data['kecamatan']  = $db->table('tbl_kecamatan')->get()->getResultArray();

        return view('pendaftaran/index', $data);
    }

    // endpoint dropdown desa
    public function desa($kecamatanId)
    {
        $db = db_connect();
        $desa = $db->table('tbl_desa')
            ->where('kecamatan_id', $kecamatanId)
            ->get()->getResultArray();

        return $this->response->setJSON($desa);
    }

    public function simpan()
    {
        $db = db_connect();

        // 1) validasi simple (sesuaikan kebutuhan)
        $rules = [
            'nama_lengkap' => 'required|min_length[3]',
            'nisn'         => 'required|numeric|exact_length[10]',
            'asal_sekolah'  => 'required',
            'jalur_id'      => 'required|integer',
            'nilai'         => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]',
            'alamat'        => 'required',
            'kecamatan_id'  => 'required|integer',
            'desa_id'       => 'required|integer',
            'id_sekolah'    => 'required|integer',
            'pernyataan'    => 'required',

            'dok_kk'        => 'uploaded[dok_kk]|max_size[dok_kk,2048]|ext_in[dok_kk,pdf,jpg,jpeg,png]',
            'dok_akta'      => 'uploaded[dok_akta]|max_size[dok_akta,2048]|ext_in[dok_akta,pdf,jpg,jpeg,png]',
            'dok_ijazah'    => 'uploaded[dok_ijazah]|max_size[dok_ijazah,2048]|ext_in[dok_ijazah,pdf,jpg,jpeg,png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // 2) Generate nomor pendaftaran (contoh)
        $tahun = date('Y');
        $rand  = str_pad((string)random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $noPendaftaran = "PPDB-BREBES-{$tahun}-{$rand}";

        // 3) Upload file
        $uploadDir = WRITEPATH . 'uploads/ppdb';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $fileKK     = $this->request->getFile('dok_kk');
        $fileAkta   = $this->request->getFile('dok_akta');
        $fileIjazah = $this->request->getFile('dok_ijazah');

        $kkName     = $fileKK->getRandomName();
        $aktaName   = $fileAkta->getRandomName();
        $ijazahName = $fileIjazah->getRandomName();

        // path yang disimpan ke DB (lebih enak pakai relatif)
        $kkPath     = "uploads/ppdb/{$kkName}";
        $aktaPath   = "uploads/ppdb/{$aktaName}";
        $ijazahPath = "uploads/ppdb/{$ijazahName}";

        // 4) SIMPAN KE SEMUA TABEL DALAM 1 TRANSAKSI
        $db->transBegin();

        try {
            // simpan pendaftaran (tabel utama)
            $pendaftaranData = [
                'nama_lengkap'    => $this->request->getPost('nama_lengkap'),
                'nisn'            => $this->request->getPost('nisn'),
                'asal_sekolah'    => $this->request->getPost('asal_sekolah'),
                'id_sekolah'      => (int)$this->request->getPost('id_sekolah'),
                'id_sekolah2'     => $this->request->getPost('id_sekolah2') ?: null, // kalau kamu sudah tambah kolom ini
                'nilai'           => $this->request->getPost('nilai'),
                'jalur_id'        => (int)$this->request->getPost('jalur_id'),
                'alamat'          => $this->request->getPost('alamat'),
                'kecamatan_id'    => (int)$this->request->getPost('kecamatan_id'),
                'desa_id'         => (int)$this->request->getPost('desa_id'),
                'no_pendaftaran'  => $noPendaftaran,
                'status'          => 'submit',
                'created_at'      => date('Y-m-d H:i:s'),
            ];

            $db->table('pendaftaran')->insert($pendaftaranData);
            $pendaftaranId = $db->insertID();

            // pindahkan file setelah insert sukses
            $fileKK->move($uploadDir, $kkName);
            $fileAkta->move($uploadDir, $aktaName);
            $fileIjazah->move($uploadDir, $ijazahName);

            // simpan dokumen (tbl_dokumen)
            $dokTable = $db->table('tbl_dokumen');
            $dokTable->insertBatch([
                [
                    'pendaftaran_id' => $pendaftaranId,
                    'jenis'          => 'KK',
                    'file_path'      => $kkPath,
                    'status'         => 'pending',
                ],
                [
                    'pendaftaran_id' => $pendaftaranId,
                    'jenis'          => 'AKTA',
                    'file_path'      => $aktaPath,
                    'status'         => 'pending',
                ],
                [
                    'pendaftaran_id' => $pendaftaranId,
                    'jenis'          => 'IJAZAH',
                    'file_path'      => $ijazahPath,
                    'status'         => 'pending',
                ],
            ]);

            // log (tbl_log)
            $db->table('tbl_log')->insert([
                'pendaftaran_id' => $pendaftaranId,
                'user_id'        => session()->get('user_id') ?? null,
                'aksi'           => 'SUBMIT',
                'waktu'          => date('Y-m-d H:i:s'),
            ]);

            if ($db->transStatus() === false) {
                throw new \Exception('Transaksi gagal.');
            }

           $db->transCommit();

            session()->set([
                'nisn'           => $this->request->getPost('nisn'),
                'no_pendaftaran' => $noPendaftaran,
                'pendaftaran_id' => $pendaftaranId,
            ]);

            return redirect()->to(base_url('validasi'))
            ->with('success', "Pendaftaran berhasil! Nomor: {$noPendaftaran}. Silakan cek status di menu Validasi.");


        } catch (\Throwable $e) {
            $db->transRollback();
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan pendaftaran: ' . $e->getMessage());
        }
    }
}
