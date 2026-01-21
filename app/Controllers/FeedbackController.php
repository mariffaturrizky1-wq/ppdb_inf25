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
        return view('feedback/index', [
            'title' => 'Formulir Feedback'
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
            $foto->move(WRITEPATH . 'uploads/feedback', $fotoName);
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

    // =========================
    // ADMIN
    // =========================

    public function adminIndex()
    {
        $rows = $this->feedbackModel->orderBy('id', 'DESC')->findAll();

        return view('feedback/admin_index', [
            'title' => 'Data Feedback',
            'rows'  => $rows,
        ]);
    }

    public function adminShow($id)
    {
        $row = $this->feedbackModel->find($id);
        if (!$row) return redirect()->to('/admin/feedback')->with('error', 'Data tidak ditemukan.');

        $row['keluhan'] = $row['keluhan'] ? json_decode($row['keluhan'], true) : [];

        return view('feedback/admin_show', [
            'title' => 'Detail Feedback',
            'row'   => $row,
        ]);
    }

    public function adminDelete($id)
    {
        $row = $this->feedbackModel->find($id);
        if ($row) {
            // hapus file foto jika ada
            if (!empty($row['foto'])) {
                $path = WRITEPATH . 'uploads/feedback/' . $row['foto'];
                if (is_file($path)) @unlink($path);
            }
            $this->feedbackModel->delete($id);
        }

        return redirect()->to('/admin/feedback')->with('success', 'Feedback berhasil dihapus.');
    }
}
