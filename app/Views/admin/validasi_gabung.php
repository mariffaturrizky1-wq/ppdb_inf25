  <!doctype html>
  <html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
      :root{
        --bg0:#070b14;
        --bg1:#0b1220;
        --glass:rgba(255,255,255,.06);
        --stroke:rgba(255,255,255,.10);
        --text:#e5e7eb;
        --muted:rgba(229,231,235,.68);
        --shadow: 0 10px 30px rgba(0,0,0,.40);
        --brand1:#7c3aed;
        --brand2:#06b6d4;
        --brand3:#22c55e;
        --danger:#ef4444;
        --warn:#f59e0b;
        --info:#38bdf8;
      }

      body{
        background:
          radial-gradient(1200px 800px at 20% 10%, rgba(124,58,237,.30), transparent 60%),
          radial-gradient(900px 600px at 90% 30%, rgba(6,182,212,.22), transparent 60%),
          radial-gradient(900px 600px at 30% 90%, rgba(34,197,94,.16), transparent 60%),
          linear-gradient(180deg, var(--bg0), var(--bg1));
        color: var(--text);
        min-height: 100vh;
      }

      /* smooth */
      *{ scroll-behavior:smooth; }
      .muted{ color: var(--muted); }

      /* top header */
      .topbar{
        position: sticky;
        top: 0;
        z-index: 30;
        padding: 14px 0;
        background: rgba(7,11,20,.65);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255,255,255,.06);
      }
      .brand-title{
        font-weight: 800;
        letter-spacing: .2px;
        line-height: 1.1;
        background: linear-gradient(90deg, var(--brand1), var(--brand2), var(--brand3));
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
      }
      .pill{
        background: rgba(255,255,255,.08);
        border: 1px solid rgba(255,255,255,.12);
        color: var(--text);
        border-radius: 999px;
        padding: 8px 12px;
        display: inline-flex;
        gap: 8px;
        align-items: center;
      }

      /* glass panels */
      .glass{
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,255,255,.10);
        border-radius: 18px;
        backdrop-filter: blur(12px);
        box-shadow: var(--shadow);
      }

      /* layout columns */
      .sidebar{
        position: sticky;
        top: 86px; /* below topbar */
        height: calc(100vh - 110px);
        overflow: hidden;
      }

      /* search */
      .search-wrap{
        position: relative;
      }
      .search{
        padding-left: 40px;
        background: rgba(0,0,0,.26);
        border: 1px solid rgba(255,255,255,.12);
        color: var(--text);
        border-radius: 14px;
        height: 44px;
      }
      .search:focus{
        border-color: rgba(56,189,248,.55);
        box-shadow: 0 0 0 4px rgba(56,189,248,.10);
      }
      .search-ico{
        position:absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(229,231,235,.65);
        pointer-events: none;
      }

      /* list items */
      .list-scroll{
        max-height: calc(100vh - 210px);
        overflow: auto;
        padding-right: 6px;
      }
      .list-scroll::-webkit-scrollbar{ width: 8px; }
      .list-scroll::-webkit-scrollbar-thumb{
        background: rgba(255,255,255,.10);
        border-radius: 20px;
      }

      .item{
        display:block;
        text-decoration:none;
        color: var(--text);
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,.10);
        background: rgba(0,0,0,.20);
        transition: transform .18s ease, background .18s ease, border-color .18s ease, box-shadow .18s ease;
        padding: 14px 14px;
      }
      .item:hover{
        transform: translateY(-2px);
        background: rgba(0,0,0,.28);
        box-shadow: 0 12px 26px rgba(0,0,0,.25);
      }
      .item.active{
        border-color: rgba(56,189,248,.55);
        box-shadow: 0 0 0 4px rgba(56,189,248,.10);
        background: rgba(56,189,248,.08);
      }

      .status-chip{
        border-radius: 999px;
        padding: 6px 10px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        border: 1px solid rgba(255,255,255,.12);
        background: rgba(255,255,255,.06);
        display: inline-flex;
        align-items: center;
        gap: 6px;
      }
      .chip-submit{ border-color: rgba(245,158,11,.35); background: rgba(245,158,11,.10); }
      .chip-diterima{ border-color: rgba(34,197,94,.35); background: rgba(34,197,94,.10); }
      .chip-ditolak{ border-color: rgba(239,68,68,.35); background: rgba(239,68,68,.10); }
      .chip-pending{ border-color: rgba(245,158,11,.35); background: rgba(245,158,11,.10); }
      .chip-approved{ border-color: rgba(34,197,94,.35); background: rgba(34,197,94,.10); }
      .chip-rejected{ border-color: rgba(239,68,68,.35); background: rgba(239,68,68,.10); }

      /* detail header */
      .detail-head{
        border-radius: 18px;
        border: 1px solid rgba(255,255,255,.10);
        background:
          radial-gradient(800px 240px at 15% 20%, rgba(124,58,237,.18), transparent 55%),
          radial-gradient(800px 240px at 85% 30%, rgba(6,182,212,.14), transparent 55%),
          rgba(0,0,0,.18);
        padding: 16px;
      }

      /* cards */
      .info-card{
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,.10);
        background: rgba(0,0,0,.18);
        padding: 14px;
        height: 100%;
      }

      /* documents as cards */
      .doc-card{
        border-radius: 16px;
        border: 1px solid rgba(255,255,255,.10);
        background: rgba(0,0,0,.18);
        padding: 14px;
        transition: .18s ease;
      }
      .doc-card:hover{
        background: rgba(0,0,0,.24);
        transform: translateY(-1px);
      }

      /* buttons */
      .btn-soft{
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.16);
        color: #fff;
        border-radius: 14px;
      }
      .btn-soft:hover{ background: rgba(255,255,255,.16); color:#fff; }
      .btn-primary, .btn-success, .btn-danger{
        border-radius: 14px;
      }
      .btn-outline-light{
        border-radius: 14px;
        border-color: rgba(255,255,255,.20);
        color: rgba(255,255,255,.88);
      }
      .btn-outline-light:hover{
        background: rgba(255,255,255,.10);
        border-color: rgba(255,255,255,.25);
        color:#fff;
      }

      /* separators */
      .hr{
        height:1px;
        background: rgba(255,255,255,.10);
        margin: 18px 0;
      }

      /* responsive polish */
      @media (max-width: 992px){
        .sidebar{ position: static; height: auto; }
        .list-scroll{ max-height: 44vh; }
        .topbar{ position: static; }
      }

    </style>
  </head>

  <body>

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="container">
        <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
          <div>
            <div class="h4 mb-0 brand-title">Panel Validasi Admin</div>
            <div class="muted small">Pilih pendaftar → cek detail & dokumen → beri keputusan.</div>
          </div>
          <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="pill">
              <i class="bi bi-person-badge"></i>
              <span class="small">Login: <?= esc(session()->get('nama_user')) ?></span>
            </span>
            <a href="<?= base_url('admin') ?>" class="btn btn-soft btn-sm">
              <i class="bi bi-grid-1x2 me-1"></i> Dashboard
            </a>
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-sm">
              <i class="bi bi-box-arrow-right me-1"></i> Logout
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="container py-4">

      <?php if (session()->getFlashdata('pesan')): ?>
        <div class="alert alert-warning glass border-0 text-white">
          <i class="bi bi-exclamation-triangle me-1"></i>
          <?= session()->getFlashdata('pesan') ?>
        </div>
      <?php endif; ?>

      <div class="row g-3">
        <!-- SIDEBAR LIST -->
        <div class="col-lg-5">
          <div class="glass p-3 sidebar">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <div class="fw-semibold">
                <i class="bi bi-people me-1"></i> Daftar Pendaftar
              </div>
              <span class="pill">
                <i class="bi bi-hash"></i>
                <span class="small">Total: <?= count($rows) ?></span>
              </span>
            </div>

            <div class="search-wrap mb-3">
              <i class="bi bi-search search-ico"></i>
              <input id="q" class="form-control search" placeholder="Cari nama / NISN / nomor pendaftaran...">
            </div>

            <div id="list" class="d-grid gap-2 list-scroll">
              <?php foreach($rows as $r): ?>
                <?php
                  $st = $r['status'] ?? 'submit';
                  $active = ($activeId == $r['id_pendaftaran']) ? 'active' : '';

                  $chipClass = match($st){
                    'submit' => 'chip-submit',
                    'diterima' => 'chip-diterima',
                    'ditolak' => 'chip-ditolak',
                    default => '',
                  };
                  $chipIcon = match($st){
                    'submit' => 'bi-hourglass-split',
                    'diterima' => 'bi-check2-circle',
                    'ditolak' => 'bi-x-circle',
                    default => 'bi-dot',
                  };
                ?>

                <a class="item <?= $active ?>"
                  data-text="<?= strtolower(($r['no_pendaftaran'] ?? '').' '.($r['nama_lengkap'] ?? '').' '.($r['nisn'] ?? '')) ?>"
                  href="<?= base_url('admin/validasi?id='.$r['id_pendaftaran']) ?>">

                  <div class="d-flex justify-content-between align-items-start gap-2">
                    <div class="flex-grow-1">
                      <div class="fw-semibold mb-1"><?= esc($r['nama_lengkap']) ?></div>
                      <div class="muted small"><i class="bi bi-person-vcard me-1"></i>NISN: <?= esc($r['nisn']) ?></div>
                      <div class="muted small"><i class="bi bi-receipt me-1"></i><?= esc($r['no_pendaftaran']) ?></div>
                    </div>
                    <span class="status-chip <?= $chipClass ?>">
                      <i class="bi <?= $chipIcon ?>"></i> <?= esc($st) ?>
                    </span>
                  </div>

                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- DETAIL -->
        <div class="col-lg-7">
          <div class="glass p-3 p-md-4">

            <?php if (!$detail): ?>
              <div class="text-center py-5">
                <div class="display-6 fw-bold mb-2">Pilih Pendaftar</div>
                <div class="muted">Klik salah satu data di kiri untuk melihat detail dan dokumen.</div>
              </div>
            <?php else: ?>
              <?php
                $stMain = $detail['status'] ?? 'submit';
                $mainChip = match($stMain){
                  'submit' => 'chip-submit',
                  'diterima' => 'chip-diterima',
                  'ditolak' => 'chip-ditolak',
                  default => '',
                };
                $mainIcon = match($stMain){
                  'submit' => 'bi-hourglass-split',
                  'diterima' => 'bi-check2-circle',
                  'ditolak' => 'bi-x-circle',
                  default => 'bi-dot',
                };
              ?>

              <!-- header -->
              <div class="detail-head mb-3">
                <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
                  <div>
                    <div class="h5 fw-bold mb-1"><?= esc($detail['nama_lengkap']) ?></div>
                    <div class="muted small">
                      <i class="bi bi-receipt me-1"></i>No: <?= esc($detail['no_pendaftaran']) ?>
                      <span class="mx-1">•</span>
                      <i class="bi bi-person-vcard me-1"></i>NISN: <?= esc($detail['nisn']) ?>
                    </div>
                  </div>
                  <span class="status-chip <?= $mainChip ?>">
                    <i class="bi <?= $mainIcon ?>"></i> Status: <?= esc($stMain) ?>
                  </span>
                </div>

                <?php if (!empty($detail['keterangan'])): ?>
                  <div class="mt-3 muted small">
                    <i class="bi bi-info-circle me-1"></i>
                    Keterangan terakhir: <?= esc($detail['keterangan']) ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- info -->
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="info-card">
                    <div class="muted small mb-1"><i class="bi bi-building me-1"></i>Asal Sekolah</div>
                    <div class="fw-semibold"><?= esc($detail['asal_sekolah'] ?? '-') ?></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-card">
                    <div class="muted small mb-1"><i class="bi bi-geo-alt me-1"></i>Alamat</div>
                    <div class="fw-semibold"><?= esc($detail['alamat'] ?? '-') ?></div>
                  </div>
                </div>
              </div>

              <div class="hr"></div>

              <!-- documents -->
              <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="fw-semibold"><i class="bi bi-folder2-open me-1"></i> Dokumen</div>
                <span class="pill"><i class="bi bi-files"></i><span class="small"><?= count($dok) ?> item</span></span>
              </div>

              <div class="d-grid gap-2">
                <?php foreach($dok as $d): ?>
                  <?php
                    $stDoc = $d['status'] ?? 'pending';
                    $docChip = match($stDoc){
                      'approved' => 'chip-approved',
                      'rejected' => 'chip-rejected',
                      default => 'chip-pending',
                    };
                    $docIcon = match($stDoc){
                      'approved' => 'bi-check2-circle',
                      'rejected' => 'bi-x-circle',
                      default => 'bi-hourglass-split',
                    };
                  ?>

                  <div class="doc-card">
                    <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
                      <div>
                        <div class="fw-semibold mb-1"><?= esc($d['jenis']) ?></div>
                        <div class="muted small">
                          <i class="bi bi-paperclip me-1"></i><?= esc($d['file_path']) ?>
                        </div>
                      </div>
                      <span class="status-chip <?= $docChip ?>">
                        <i class="bi <?= $docIcon ?>"></i> <?= esc($stDoc) ?>
                      </span>
                    </div>

                    <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                    <a class="btn btn-sm btn-primary"
   target="_blank"
   href="<?= base_url('dokumen/view/'.$d['id']) ?>">
  <i class="bi bi-eye me-1"></i> Lihat File
</a>


                      <form method="post" action="<?= base_url('admin/dokumen/set-status') ?>" class="d-flex flex-wrap gap-2 ms-auto">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_pendaftaran" value="<?= esc($detail['id_pendaftaran']) ?>">
                        <input type="hidden" name="id_dokumen" value="<?= esc($d['id']) ?>">

                        <select class="form-select form-select-sm" name="status" required style="min-width: 150px; border-radius: 14px; background: rgba(0,0,0,.26); border:1px solid rgba(255,255,255,.12); color: var(--text);">
                          <option value="pending"  <?= $stDoc==='pending' ? 'selected' : '' ?>>pending</option>
                          <option value="approved" <?= $stDoc==='approved' ? 'selected' : '' ?>>approved</option>
                          <option value="rejected" <?= $stDoc==='rejected' ? 'selected' : '' ?>>rejected</option>
                        </select>

                        <button class="btn btn-success btn-sm">
                          <i class="bi bi-save2 me-1"></i> Simpan
                        </button>
                      </form>
                    </div>
                  </div>

                <?php endforeach; ?>
              </div>

              <div class="hr"></div>

              <!-- decision -->
              <div class="fw-semibold mb-2"><i class="bi bi-shield-check me-1"></i> Keputusan Admin</div>
              <form method="post" action="<?= base_url('admin/validasi/set-status') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="id_pendaftaran" value="<?= esc($detail['id_pendaftaran']) ?>">

                <div class="row g-2 align-items-center">
                  <div class="col-md-4">
                    <select class="form-select" name="status" required
                            style="border-radius: 14px; background: rgba(0,0,0,.26); border:1px solid rgba(255,255,255,.12); color: var(--text);">
                      <option value="diterima" <?= ($detail['status'] ?? '') === 'diterima' ? 'selected' : '' ?>>diterima</option>
                      <option value="ditolak"  <?= ($detail['status'] ?? '') === 'ditolak' ? 'selected' : '' ?>>ditolak</option>
                    </select>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control"
                          name="keterangan"
                          value="<?= esc($detail['keterangan'] ?? '') ?>"
                          placeholder="Keterangan (opsional), mis. dokumen kurang jelas"
                          style="border-radius: 14px; background: rgba(0,0,0,.26); border:1px solid rgba(255,255,255,.12); color: var(--text);">
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mt-3">
                  <button class="btn btn-success">
                    <i class="bi bi-check2-square me-1"></i> Simpan Keputusan
                  </button>
                  <a href="<?= base_url('admin/validasi') ?>" class="btn btn-outline-light">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Pilihan
                  </a>
                </div>
              </form>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>

    <script>
      // Search filter + small UX: highlight first visible item on Enter
      const q = document.getElementById('q');
      const items = [...document.querySelectorAll('[data-text]')];

      function filterList(){
        const v = (q.value || '').toLowerCase().trim();
        let firstVisible = null;

        items.forEach(el => {
          const ok = el.getAttribute('data-text').includes(v);
          el.style.display = ok ? '' : 'none';
          if (ok && !firstVisible) firstVisible = el;
        });

        return firstVisible;
      }

      q?.addEventListener('input', filterList);

      q?.addEventListener('keydown', (e) => {
        if(e.key === 'Enter'){
          e.preventDefault();
          const first = filterList();
          if(first) window.location.href = first.getAttribute('href');
        }
      });
    </script>
  </body>
  </html>
