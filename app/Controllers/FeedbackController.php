<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FeedbackModel;

class FeedbackController extends BaseController
{
    protected FeedbackModel $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $db = db_connect();

        // ambil semua kecamatan
        $kecamatan = $db->query("
            SELECT id_kecamatan, nama_kecamatan
            FROM tbl_kecamatan
            ORDER BY nama_kecamatan ASC
        ")->getResultArray();

        // ambil semua desa
        $desa = $db->query("
            SELECT id_kecamatan, nama
            FROM tbl_desa
            ORDER BY nama ASC
        ")->getResultArray();

        return view('feedback/index', [
            'title'     => 'Formulir Feedback',
            'kecamatan' => $kecamatan,
            'desa'      => $desa,
        ]);
    }


    public function store()
    {
        $foto = $this->request->getFile('foto');

        $rules = [
            'nama'          => 'required|min_length[2]|max_length[150]',
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]',
            'keterangan'    => 'permit_empty|max_length[2000]',
        ];

        // validasi foto (opsional)
        if ($foto && $foto->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['foto'] = 'uploaded[foto]|max_size[foto,2048]|is_image[foto]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // ambil checkbox keluhan
        $keluhanArr = $this->request->getPost('keluhan');
        if (!is_array($keluhanArr)) $keluhanArr = [];

        // upload foto ke writable/uploads/feedback
        $fotoName = null;
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/feedback', $fotoName);
        }

        $data = [
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'keluhan'       => json_encode($keluhanArr, JSON_UNESCAPED_UNICODE),
            'provinsi'      => $this->request->getPost('provinsi'),
            'kabupaten'     => $this->request->getPost('kabupaten'),
            'kecamatan'     => $this->request->getPost('kecamatan'),
            'desa'          => $this->request->getPost('desa'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'foto'          => $fotoName,
            'created_at'    => date('Y-m-d H:i:s'),
        ];

        $this->feedbackModel->insert($data);

        return redirect()->to('/feedback')->with('success', 'Feedback berhasil dikirim. Terima kasih!');
    }

}
