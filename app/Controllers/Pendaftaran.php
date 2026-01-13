<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pendaftaran extends Controller
{
    public function index()
    {
        $db = db_connect();

        $data = [];
        $data['sekolah'] = $db->table('tbl_datasekolah')->get()->getResultArray();
        $data['jalur']   = $db->table('tbl_jalur')->where('aktif', 1)->get()->getResultArray();

        // Alias supaya view bisa pakai $k['id'] dan $k['nama']
        $data['kecamatan'] = $db->query("
            SELECT
                id_kecamatan AS id,
                nama_kecamatan AS nama
            FROM tbl_kecamatan
            ORDER BY nama_kecamatan ASC
        ")->getResultArray();

        return view('pendaftaran/index', $data);
    }

    // Endpoint dropdown desa: /pendaftaran/desa/{kecamatanId}
    public function desa($kecamatanId)
    {
        $db = db_connect();

        // tbl_desa kolomnya: id, id_kecamatan, nama
        // Alias supaya JS bisa pakai d.id dan d.nama
        $desa = $db->query("
            SELECT
                id,
                nama
            FROM tbl_desa
            WHERE id_kecamatan = ?
            ORDER BY nama ASC
        ", [(int) $kecamatanId])->getResultArray();

        return $this->response->setJSON($desa);
    }

    public function simpan()
    {
        $db = db_connect();

        $rules = [
            'nama_lengkap' => 'required|min_length[3]',
            'nisn'         => 'required|numeric|exact_length[10]',
            'asal_sekolah' => 'required',
            'jalur_id'     => 'required|integer',
            'nilai'        => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]',
            'alamat'       => 'required',
            'kecamatan_id' => 'required|integer',
            'desa_id'      => 'required|integer',
            'id_sekolah'   => 'required|integer',
            'pernyataan'   => 'required',

            'dok_kk'       => 'uploaded[dok_kk]|max_size[dok_kk,2048]|ext_in[dok_kk,pdf,jpg,jpeg,png]',
            'dok_akta'     => 'uploaded[dok_akta]|max_size[dok_akta,2048]|ext_in[dok_akta,pdf,jpg,jpeg,png]',
            'dok_ijazah'   => 'uploaded[dok_ijazah]|max_size[dok_ijazah,2048]|ext_in[dok_ijazah,pdf,jpg,jpeg,png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $tahun = date('Y');
        $rand  = str_pad((string) random_int(1, 999999), 6, '0', STR_PAD_LEFT);
        $noPendaftaran = "PPDB-BREBES-{$tahun}-{$rand}";

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

        $kkPath     = "uploads/ppdb/{$kkName}";
        $aktaPath   = "uploads/ppdb/{$aktaName}";
        $ijazahPath = "uploads/ppdb/{$ijazahName}";

        $db->transBegin();

        try {
            $pendaftaranData = [
                'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
                'nisn'           => $this->request->getPost('nisn'),
                'asal_sekolah'   => $this->request->getPost('asal_sekolah'),
                'id_sekolah'     => (int) $this->request->getPost('id_sekolah'),
                'id_sekolah2'    => $this->request->getPost('id_sekolah2') ?: null,
                'nilai'          => $this->request->getPost('nilai'),
                'jalur_id'       => (int) $this->request->getPost('jalur_id'),
                'alamat'         => $this->request->getPost('alamat'),
                'kecamatan_id'   => (int) $this->request->getPost('kecamatan_id'),
                'desa_id'        => (int) $this->request->getPost('desa_id'),
                'no_pendaftaran' => $noPendaftaran,
                'status'         => 'submit',
                'created_at'     => date('Y-m-d H:i:s'),
            ];

            $db->table('pendaftaran')->insert($pendaftaranData);
            $pendaftaranId = $db->insertID();

            // pindahkan file setelah insert sukses
            $fileKK->move($uploadDir, $kkName);
            $fileAkta->move($uploadDir, $aktaName);
            $fileIjazah->move($uploadDir, $ijazahName);

            $db->table('tbl_dokumen')->insertBatch([
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
