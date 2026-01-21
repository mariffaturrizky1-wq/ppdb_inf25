<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminValidasi extends BaseController
{
    public function index()
    {
        $db = db_connect();

        // daftar pendaftar
        $rows = $db->table('pendaftaran')
            ->orderBy('id_pendaftaran', 'DESC')
            ->get()->getResultArray();

        // ambil detail berdasarkan query string ?id=
        $id = (int) ($this->request->getGet('id') ?? 0);

        $detail = null;
        $dok = [];

        if ($id > 0) {
            $detail = $db->table('pendaftaran')
                ->where('id_pendaftaran', $id)
                ->get()->getRowArray();

            if ($detail) {
                $dok = $db->table('tbl_dokumen')
                    ->where('pendaftaran_id', $id)
                    ->get()->getResultArray();
            }
        }

        return view('admin/validasi_gabung', [
            'title'  => 'Validasi Pendaftaran',
            'rows'   => $rows,
            'detail' => $detail,
            'dok'    => $dok,
            'activeId' => $id
        ]);
    }

    public function setStatus()
    {
        $db = db_connect();

        $id     = (int) $this->request->getPost('id_pendaftaran');
        $status = $this->request->getPost('status'); // diterima/ditolak
        $ket    = $this->request->getPost('keterangan');

        if ($id <= 0) {
            return redirect()->to(base_url('admin/validasi'))->with('pesan', 'ID tidak valid');
        }

        if (!in_array($status, ['diterima', 'ditolak'], true)) {
            return redirect()->to(base_url('admin/validasi?id='.$id))->with('pesan', 'Status tidak valid');
        }

        $ok = $db->table('pendaftaran')
            ->where('id_pendaftaran', $id)
            ->update([
                'status' => $status,
                'keterangan' => $ket ?: null,
            ]);

        if (!$ok) {
            $err = $db->error();
            return redirect()->to(base_url('admin/validasi?id='.$id))->with('pesan', 'Gagal update: '.($err['message'] ?? 'error'));
        }

        // optional log
        $db->table('tbl_log')->insert([
            'pendaftaran_id' => $id,
            'user_id' => session()->get('id_user') ?? null,
            'aksi' => strtoupper($status),
            'waktu' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to(base_url('admin/validasi?id='.$id))->with('pesan', 'Status berhasil diperbarui');
    }

    public function viewDokumen($idDok)
{
    $db = db_connect();

    $dok = $db->table('tbl_dokumen')
        ->where('id', (int)$idDok)
        ->get()->getRowArray();

    if (!$dok) {
        return $this->response->setStatusCode(404)->setBody('Dokumen tidak ditemukan');
    }

    // file_path contoh: uploads/ppdb/namafile.jpg
    $fullPath = WRITEPATH . $dok['file_path'];

    if (!is_file($fullPath)) {
        return $this->response->setStatusCode(404)->setBody('File tidak ada di server');
    }

    $mime = mime_content_type($fullPath) ?: 'application/octet-stream';

    return $this->response
        ->setHeader('Content-Type', $mime)
        ->setHeader('Content-Disposition', 'inline; filename="'.basename($fullPath).'"')
        ->setBody(file_get_contents($fullPath));
}

public function setDokumenStatus()
{
    $db = db_connect();

    $idDok = (int) $this->request->getPost('id_dokumen');
    $idPendaftaran = (int) $this->request->getPost('id_pendaftaran');
    $status = $this->request->getPost('status'); // pending/approved/rejected

    if ($idDok <= 0 || $idPendaftaran <= 0) {
        return redirect()->back()->with('pesan', 'Data tidak valid.');
    }

    if (!in_array($status, ['pending','approved','rejected'], true)) {
        return redirect()->back()->with('pesan', 'Status dokumen tidak valid.');
    }

    $ok = $db->table('tbl_dokumen')
        ->where('id', $idDok)
        ->where('pendaftaran_id', $idPendaftaran)
        ->update(['status' => $status]);

    if (!$ok) {
        $err = $db->error();
        return redirect()->to(base_url('admin/validasi?id='.$idPendaftaran))
            ->with('pesan', 'Gagal update dokumen: '.($err['message'] ?? 'error'));
    }

    // OPTIONAL: algoritma otomatis status pendaftaran berdasarkan dokumen
    $docs = $db->table('tbl_dokumen')
        ->select('status')
        ->where('pendaftaran_id', $idPendaftaran)
        ->get()->getResultArray();

    $hasRejected = false;
    $allApproved = true;

    foreach ($docs as $d) {
        $s = $d['status'] ?? 'pending';
        if ($s === 'rejected') $hasRejected = true;
        if ($s !== 'approved') $allApproved = false;
    }

    if ($hasRejected) {
        $db->table('pendaftaran')->where('id_pendaftaran', $idPendaftaran)->update(['status' => 'ditolak']);
    } elseif ($allApproved) {
        $db->table('pendaftaran')->where('id_pendaftaran', $idPendaftaran)->update(['status' => 'diterima']);
    } else {
        // masih ada pending -> biarkan submit/verifikasi (pilih salah satu)
        $db->table('pendaftaran')->where('id_pendaftaran', $idPendaftaran)->update(['status' => 'submit']);
    }

    return redirect()->to(base_url('admin/validasi?id='.$idPendaftaran))
        ->with('pesan', 'Status dokumen diperbarui.');
}


}
