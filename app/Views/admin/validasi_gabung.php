<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body{
    background: radial-gradient(1200px 800px at 20% 10%, rgba(79,70,229,.35), transparent 60%),
                radial-gradient(900px 600px at 90% 30%, rgba(6,182,212,.25), transparent 60%),
                radial-gradient(900px 600px at 30% 90%, rgba(34,197,94,.18), transparent 60%),
                #0b1220;
    color:#e5e7eb;
    }
    .glass{
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.12);
      backdrop-filter: blur(10px);
      border-radius: 18px;
    }
    .brand{
      background: linear-gradient(90deg,#4f46e5,#06b6d4,#22c55e);
      -webkit-background-clip:text;
      -webkit-text-fill-color:transparent;
    }
    .item-row{
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(0,0,0,.18);
      transition: .18s ease;
    }
    .item-row:hover{ transform: translateY(-1px); background: rgba(0,0,0,.28); }
    .item-row.active{ border-color: rgba(34,197,94,.55); box-shadow: 0 0 0 3px rgba(34,197,94,.15); }
    .muted{ color: rgba(229,231,235,.7); }
    .badge-soft{
      background: rgba(255,255,255,.10);
      border: 1px solid rgba(255,255,255,.14);
    }
    .btn-soft{
      background: rgba(255,255,255,.10);
      border: 1px solid rgba(255,255,255,.16);
      color: #fff;
    }
    .btn-soft:hover{ background: rgba(255,255,255,.16); }
    .table-dark{ --bs-table-bg: transparent; }
    .search{
      background: rgba(0,0,0,.25);
      border: 1px solid rgba(255,255,255,.14);
      color: #fff;
    }
    .search:focus{ border-color: rgba(6,182,212,.6); box-shadow:none; }
  </style>
</head>

<body>
  <div class="container py-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
      <div>
        <div class="h4 fw-bold mb-0"><span class="brand">Panel Validasi Admin</span></div>
        <div class="muted small">Klik salah satu pendaftar untuk melihat detail, dokumen, lalu beri keputusan.</div>
      </div>
      <div class="d-flex gap-2 align-items-center">
        <span class="badge badge-soft px-3 py-2">Login: <?= esc(session()->get('nama_user')) ?></span>
        <a href="<?= base_url('admin') ?>" class="btn btn-soft btn-sm">Dashboard</a>
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-sm">Logout</a>
      </div>
    </div>

    <?php if (session()->getFlashdata('pesan')): ?>
      <div class="alert alert-warning"><?= session()->getFlashdata('pesan') ?></div>
    <?php endif; ?>

    <div class="row g-3">
      <!-- LIST -->
      <div class="col-lg-5">
        <div class="glass p-3">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="fw-semibold">Daftar Pendaftar</div>
            <span class="badge bg-info">Total: <?= count($rows) ?></span>
          </div>

          <input id="q" class="form-control search mb-3" placeholder="Cari nama / NISN / nomor pendaftaran...">

          <div id="list" class="d-grid gap-2" style="max-height: 70vh; overflow:auto;">
            <?php foreach($rows as $r): ?>
              <?php
                $st = $r['status'] ?? 'submit';
                $badge = match($st) {
                  'submit'   => 'warning',
                  'diterima' => 'success',
                  'ditolak'  => 'danger',
                  default    => 'secondary',
                };
                $active = ($activeId == $r['id_pendaftaran']) ? 'active' : '';
              ?>
              <a class="text-decoration-none text-white item-row p-3 <?= $active ?>"
                 data-text="<?= strtolower(($r['no_pendaftaran'] ?? '').' '.($r['nama_lengkap'] ?? '').' '.($r['nisn'] ?? '')) ?>"
                 href="<?= base_url('admin/validasi?id='.$r['id_pendaftaran']) ?>">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <div class="fw-semibold"><?= esc($r['nama_lengkap']) ?></div>
                    <div class="muted small">NISN: <?= esc($r['nisn']) ?></div>
                    <div class="muted small"><?= esc($r['no_pendaftaran']) ?></div>
                  </div>
                  <span class="badge bg-<?= $badge ?> text-uppercase"><?= esc($st) ?></span>
                </div>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- DETAIL -->
      <div class="col-lg-7">
        <div class="glass p-4">
          <?php if (!$detail): ?>
            <div class="text-center py-5">
              <div class="display-6 fw-bold mb-2">Pilih Pendaftar</div>
              <div class="muted">Klik salah satu data di sebelah kiri untuk melihat detail dan dokumen.</div>
            </div>
          <?php else: ?>
            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <div class="h5 fw-bold mb-1"><?= esc($detail['nama_lengkap']) ?></div>
                <div class="muted small">No: <?= esc($detail['no_pendaftaran']) ?> • NISN: <?= esc($detail['nisn']) ?></div>
              </div>
              <span class="badge badge-soft px-3 py-2 text-uppercase">Status: <?= esc($detail['status']) ?></span>
            </div>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="p-3 item-row">
                  <div class="muted small">Asal Sekolah</div>
                  <div class="fw-semibold"><?= esc($detail['asal_sekolah'] ?? '-') ?></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 item-row">
                  <div class="muted small">Alamat</div>
                  <div class="fw-semibold"><?= esc($detail['alamat'] ?? '-') ?></div>
                </div>
              </div>
            </div>

            <hr class="border-secondary my-4">

            <div class="d-flex justify-content-between align-items-center mb-2">
              <div class="fw-semibold">Dokumen</div>
              <span class="badge badge-soft"><?= count($dok) ?> item</span>
            </div>

            <div class="table-responsive">
              <table class="table table-dark table-hover align-middle">
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($dok as $d): ?>
                    <?php
                    $stDoc = $d['status'] ?? 'pending';
                    $badgeDoc = match($stDoc) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default    => 'warning',
                    };
                    ?>
                    <tr>
                    <td class="fw-semibold"><?= esc($d['jenis']) ?></td>
                    <td>
                        <span class="badge bg-<?= $badgeDoc ?> text-uppercase"><?= esc($stDoc) ?></span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-primary"
                        target="_blank"
                        href="<?= base_url('admin/dokumen/'.$d['id'].'/view') ?>">
                        Lihat File
                        </a>
                        <div class="muted small mt-1"><?= esc($d['file_path']) ?></div>
                    </td>
                    <td style="min-width:260px;">
                        <form method="post" action="<?= base_url('admin/dokumen/set-status') ?>" class="d-flex gap-2">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_pendaftaran" value="<?= esc($detail['id_pendaftaran']) ?>">
                        <input type="hidden" name="id_dokumen" value="<?= esc($d['id']) ?>">

                        <select class="form-select form-select-sm" name="status" required>
                            <option value="pending"  <?= $stDoc==='pending' ? 'selected' : '' ?>>pending</option>
                            <option value="approved" <?= $stDoc==='approved' ? 'selected' : '' ?>>approved</option>
                            <option value="rejected" <?= $stDoc==='rejected' ? 'selected' : '' ?>>rejected</option>
                        </select>

                        <button class="btn btn-sm btn-success">Simpan</button>
                        </form>
                    </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

              </table>
            </div>

            <hr class="border-secondary my-4">

            <div class="fw-semibold mb-2">Keputusan Admin</div>
            <form method="post" action="<?= base_url('admin/validasi/set-status') ?>">
              <?= csrf_field() ?>
              <input type="hidden" name="id_pendaftaran" value="<?= esc($detail['id_pendaftaran']) ?>">

              <div class="row g-2">
                <div class="col-md-4">
                  <select class="form-select" name="status" required>
                    <option value="diterima" <?= ($detail['status'] ?? '') === 'diterima' ? 'selected' : '' ?>>diterima</option>
                    <option value="ditolak" <?= ($detail['status'] ?? '') === 'ditolak' ? 'selected' : '' ?>>ditolak</option>
                  </select>
                </div>
                <div class="col-md-8">
                  <input class="form-control" name="keterangan"
                         value="<?= esc($detail['keterangan'] ?? '') ?>"
                         placeholder="Keterangan (opsional), mis. dokumen kurang jelas">
                </div>
              </div>

              <div class="d-flex gap-2 mt-3">
                <button class="btn btn-success">Simpan Keputusan</button>
                <a href="<?= base_url('admin/validasi') ?>" class="btn btn-soft">Reset Pilihan</a>
              </div>
            </form>

          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>

  <script>
    const q = document.getElementById('q');
    const items = [...document.querySelectorAll('[data-text]')];
    q?.addEventListener('input', () => {
      const v = (q.value || '').toLowerCase().trim();
      items.forEach(el => {
        el.style.display = el.getAttribute('data-text').includes(v) ? '' : 'none';
      });
    });
  </script>
</body>
</html>
