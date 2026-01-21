    <?= $this->extend('template/template-backend-admin') ?>
    <?= $this->section('content') ?>

    <style>
    /* =========================================================
      SEKOLAH - DARK NEON (Elegant + Modern)
      - Dark glass background + neon accents
      - Hero neon glow
      - Toolbar clean
      - Table dark zebra + hover glow
      - Icon buttons neon
      ========================================================= */

    :root{
      --bg0:#070A12;
      --bg1:#0B1020;
      --card: rgba(16, 22, 40, .68);
      --card2: rgba(18, 26, 48, .72);

      --text:#EAF0FF;
      --muted:#9AA8C7;

      --line: rgba(255,255,255,.08);
      --line2: rgba(0,255,213,.14);

      --cyan:#00FFD5;
      --violet:#8B5CFF;
      --pink:#FF4FD8;
      --amber:#FFCF5A;

      --shadow: 0 22px 60px rgba(0,0,0,.55);
      --shadow2: 0 14px 36px rgba(0,0,0,.40);

      --glowC: 0 0 22px rgba(0,255,213,.22);
      --glowV: 0 0 22px rgba(139,92,255,.22);

      --r-xl: 22px;
      --r-lg: 18px;
      --r-md: 14px;
    }

    /* AdminLTE override */
    .content-wrapper{ background: transparent !important; }
    .content{ padding-top: 16px !important; }

    /* Fix spacing for icons bootstrap-like classes (optional) */
    .me-1{ margin-right: .35rem; }
    .me-2{ margin-right: .55rem; }

    /* PAGE background */
    .gov-page{
      min-height: calc(100vh - 120px);
      padding: 18px 14px 30px;
      background:
        radial-gradient(1200px 620px at 12% 0%, rgba(0,255,213,.12) 0%, rgba(0,255,213,0) 60%),
        radial-gradient(900px 520px at 88% 10%, rgba(139,92,255,.14) 0%, rgba(139,92,255,0) 58%),
        radial-gradient(700px 420px at 70% 90%, rgba(255,79,216,.10) 0%, rgba(255,79,216,0) 60%),
        linear-gradient(180deg, var(--bg0), var(--bg1));
      position: relative;
      overflow: hidden;
    }

    /* Subtle grid */
    .gov-page:before{
      content:"";
      position:absolute; inset:0;
      background-image:
        radial-gradient(circle at 1px 1px, rgba(255,255,255,.07) 1px, transparent 0);
      background-size: 20px 20px;
      opacity:.28;
      pointer-events:none;
    }

    /* Soft light streak */
    .gov-page:after{
      content:"";
      position:absolute;
      width: 900px; height: 900px;
      left: -420px; top: -520px;
      background: radial-gradient(circle, rgba(0,255,213,.10), transparent 62%);
      filter: blur(2px);
      pointer-events:none;
    }

    .gov-container{
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    /* HERO */
    .gov-hero{
      border-radius: var(--r-xl);
      color: var(--text);
      padding: 18px 18px;
      background:
        linear-gradient(135deg, rgba(0,255,213,.12), rgba(139,92,255,.10)),
        rgba(12, 16, 32, .72);
      border: 1px solid rgba(255,255,255,.10);
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
      margin-bottom: 14px;
    }

    .gov-hero:before{
      content:"";
      position:absolute;
      width: 520px; height: 520px;
      right: -250px; top: -330px;
      background: radial-gradient(circle, rgba(0,255,213,.24), rgba(0,255,213,0) 62%);
      border-radius: 50%;
      filter: blur(1px);
    }
    .gov-hero:after{
      content:"";
      position:absolute;
      width: 420px; height: 420px;
      left: -220px; bottom: -260px;
      background: radial-gradient(circle, rgba(139,92,255,.22), rgba(139,92,255,0) 62%);
      border-radius: 50%;
    }

    .gov-hero .title{
      margin:0;
      font-weight: 950;
      letter-spacing:.2px;
      font-size: 1.55rem;
      position: relative;
      z-index:1;
      text-shadow: 0 0 18px rgba(0,255,213,.10);
    }
    .gov-hero .subtitle{
      margin: 6px 0 0;
      color: rgba(234,240,255,.86);
      font-size: .95rem;
      position: relative;
      z-index:1;
    }

    /* BADGES */
    .gov-badges{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      margin-top: 12px;
      position: relative;
      z-index:1;
    }
    .gov-badge-pill{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.12);
      font-size: .85rem;
      font-weight: 900;
      color: rgba(234,240,255,.92);
      box-shadow: inset 0 0 0 1px rgba(0,255,213,.06);
    }
    .gov-badge-pill i{ color: var(--cyan); filter: drop-shadow(0 0 10px rgba(0,255,213,.22)); }

    /* CARD */
    .gov-card{
      background: var(--card);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,.10);
      border-radius: var(--r-xl);
      box-shadow: var(--shadow);
      margin-bottom: 16px;
      position: relative;
      overflow:hidden;
    }
    .gov-card:before{
      content:"";
      position:absolute;
      inset:-2px;
      background:
        radial-gradient(700px 240px at 15% 0%, rgba(0,255,213,.10), transparent 60%),
        radial-gradient(700px 240px at 90% 12%, rgba(139,92,255,.12), transparent 60%);
      pointer-events:none;
    }
    .gov-card .card-body{
      padding: 18px;
      position: relative;
      z-index:1;
      color: var(--text);
    }
    @media (min-width:768px){
      .gov-card .card-body{ padding: 22px; }
    }

    /* TOOLBAR */
    .gov-toolbar{
      display:flex;
      gap: 12px;
      flex-wrap: wrap;
      align-items:center;
      justify-content: space-between;
      margin-bottom: 14px;
    }

    /* SEARCH */
    .gov-search{
      display:flex;
      align-items:center;
      gap:10px;
      flex-wrap:wrap;
    }
    .gov-search .input-group{ max-width: 420px; }

    .gov-search .form-control{
      border-radius: 999px 0 0 999px !important;
      border: 1px solid rgba(255,255,255,.12) !important;
      background: rgba(10, 14, 26, .62) !important;
      color: var(--text) !important;
      box-shadow: none !important;
      padding: 10px 14px !important;
    }
    .gov-search .form-control::placeholder{ color: rgba(154,168,199,.75) !important; }
    .gov-search .form-control:focus{
      border-color: rgba(0,255,213,.35) !important;
      box-shadow: 0 0 0 .2rem rgba(0,255,213,.10) !important;
    }

    .gov-search .btn{
      border-radius: 0 999px 999px 0 !important;
      border: 1px solid rgba(255,255,255,.12) !important;
      background: linear-gradient(135deg, rgba(0,255,213,.20), rgba(139,92,255,.18)) !important;
      color: var(--text) !important;
    }
    .gov-search .btn:hover{
      filter: brightness(1.08);
      box-shadow: var(--glowC), var(--glowV);
      transform: translateY(-1px);
      transition: .15s ease;
    }

    /* RESET */
    .gov-reset{
      border-radius: 999px !important;
      padding: 8px 14px !important;
      border: 1px solid rgba(255,255,255,.12) !important;
      background: rgba(255,255,255,.06) !important;
      color: rgba(234,240,255,.92) !important;
      font-weight: 900 !important;
    }
    .gov-reset:hover{
      background: rgba(255,255,255,.09) !important;
      box-shadow: 0 0 0 1px rgba(0,255,213,.10);
    }

    /* ADD */
    .gov-add{
      border-radius: 999px !important;
      padding: 10px 14px !important;
      font-weight: 950 !important;
      border: 1px solid rgba(255,255,255,.12) !important;
      background:
        linear-gradient(135deg, rgba(0,255,213,.28), rgba(139,92,255,.24)) !important;
      color: var(--text) !important;
      box-shadow: var(--shadow2);
    }
    .gov-add:hover{
      transform: translateY(-1px);
      transition:.15s ease;
      box-shadow: var(--shadow2), var(--glowC), var(--glowV);
    }

    /* TABLE WRAP */
    .gov-table{
      border-radius: var(--r-lg);
      overflow: hidden;
      border: 1px solid rgba(255,255,255,.10);
      box-shadow: var(--shadow2);
      background: rgba(6, 8, 18, .35);
    }
    .gov-table table{ margin:0; }

    .gov-table thead th{
      background:
        linear-gradient(135deg, rgba(0,255,213,.16), rgba(139,92,255,.14)),
        rgba(8, 12, 26, .85);
      color: var(--text);
      border: none !important;
      font-weight: 950;
      font-size: 13px;
      padding: 12px 12px !important;
      letter-spacing:.18px;
      text-transform: none;
      box-shadow: inset 0 -1px 0 rgba(255,255,255,.08);
    }

    .gov-table tbody td{
      padding: 12px 12px !important;
      vertical-align: middle;
      border-color: rgba(255,255,255,.06) !important;
      color: rgba(234,240,255,.92);
      font-size: 13px;
    }
    .gov-table tbody tr:nth-child(even){ background: rgba(255,255,255,.03); }
    .gov-table tbody tr:hover{
      background: rgba(0,255,213,.06) !important;
      box-shadow: inset 0 0 0 9999px rgba(0,255,213,.03);
      transition:.12s ease;
    }

    /* Kuota pill */
    .quota{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      min-width: 62px;
      padding: 6px 12px;
      border-radius: 999px;
      font-weight: 950;
      font-size: 12px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.05);
    }
    .quota.success{
      color: rgba(0,255,213,.95);
      border-color: rgba(0,255,213,.30);
      box-shadow: 0 0 0 1px rgba(0,255,213,.12), 0 0 18px rgba(0,255,213,.10);
    }
    .quota.warning{
      color: rgba(255,207,90,.95);
      border-color: rgba(255,207,90,.32);
      box-shadow: 0 0 0 1px rgba(255,207,90,.10), 0 0 18px rgba(255,207,90,.08);
    }
    .quota.danger{
      color: rgba(255,79,216,.95);
      border-color: rgba(255,79,216,.30);
      box-shadow: 0 0 0 1px rgba(255,79,216,.10), 0 0 18px rgba(255,79,216,.08);
    }

    /* Actions */
    .actions{
      display:flex;
      gap: 8px;
      justify-content:center;
    }
    .icon-btn{
      width: 38px;
      height: 38px;
      border-radius: 14px;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.05);
      box-shadow: var(--shadow2);
      color: rgba(234,240,255,.92);
    }
    .icon-btn:hover{
      transform: translateY(-1px);
      transition:.15s ease;
    }
    .icon-btn.edit{
      box-shadow: var(--shadow2), 0 0 20px rgba(255,207,90,.10);
      border-color: rgba(255,207,90,.25);
    }
    .icon-btn.edit:hover{
      background: rgba(255,207,90,.10);
    }
    .icon-btn.delete{
      box-shadow: var(--shadow2), 0 0 20px rgba(255,79,216,.10);
      border-color: rgba(255,79,216,.22);
    }
    .icon-btn.delete:hover{
      background: rgba(255,79,216,.10);
    }

    /* Modal polish */
    .modal-content{
      border-radius: var(--r-lg);
      box-shadow: var(--shadow);
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(12, 16, 32, .92);
      color: var(--text);
    }
    .modal-header{
      background:
        linear-gradient(135deg, rgba(0,255,213,.18), rgba(139,92,255,.16)),
        rgba(10, 14, 26, .90);
      color: var(--text);
      border-top-left-radius: var(--r-lg);
      border-top-right-radius: var(--r-lg);
      border-bottom: 1px solid rgba(255,255,255,.10);
    }
    .modal-title{ font-weight: 950; }
    .modal-footer{
      border-top: 1px solid rgba(255,255,255,.10);
    }
    .modal-footer .btn{
      border-radius: 999px;
      font-weight: 900;
    }

    /* Inputs in modal */
    .modal .form-control, .modal textarea{
      background: rgba(10, 14, 26, .72) !important;
      color: var(--text) !important;
      border: 1px solid rgba(255,255,255,.12) !important;
    }
    .modal .form-control:focus, .modal textarea:focus{
      border-color: rgba(0,255,213,.35) !important;
      box-shadow: 0 0 0 .2rem rgba(0,255,213,.10) !important;
    }

    /* Alerts */
    .alert{
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.10);
      box-shadow: var(--shadow2);
    }
    .alert-success{
      background: rgba(0,255,213,.10) !important;
      color: rgba(234,240,255,.95) !important;
      border-color: rgba(0,255,213,.22) !important;
    }
    .alert-danger{
      background: rgba(255,79,216,.10) !important;
      color: rgba(234,240,255,.95) !important;
      border-color: rgba(255,79,216,.22) !important;
    }

    /* Small close button visibility */
    .modal-header .close, .alert .close{
      color: rgba(234,240,255,.85) !important;
      opacity: .85;
    }
    .modal-header .close:hover, .alert .close:hover{ opacity: 1; }

    /* Table borders from bootstrap */
    .table-bordered td, .table-bordered th{
      border: 1px solid rgba(255,255,255,.06) !important;
    }

    /* ==== FORCE DARK BACKGROUND (AdminLTE / Bootstrap override) ==== */
    html, body{
      background: #070A12 !important;
    }

    .wrapper,
    .content-wrapper,
    .main-footer,
    .main-header,
    .navbar,
    .content-header{
      background: transparent !important;
    }

    /* area konten AdminLTE kadang punya bg putih */
    .content-wrapper{
      background: #070A12 !important;
    }

    /* kalau ada section/container bootstrap yang putih */
    .container-fluid,
    .card,
    .card-body{
      background: transparent !important;
    }
/* ==== NAVBAR BRAND TITLE – PURE WHITE ==== */

/* Judul utama */
.brand-text,
.brand-text.font-weight-light{
  color: #FFFFFF !important;
  font-weight: 700 !important;
  letter-spacing: .2px;
  text-shadow: none !important;
}

/* (Admin) / subtitle kalau ada */
.brand-text small,
.brand-text .small{
  color: rgba(255,255,255,.75) !important;
}

/* Pastikan navbar tetap dark */
.main-header.navbar{
  background: rgba(10,14,26,.95) !important;
  border-bottom: 1px solid rgba(255,255,255,.08);
}

    </style>

    <div class="gov-page">
      <div class="gov-container">

        <div class="gov-hero">
          <h3 class="title"><i class="fas fa-school me-2"></i> Data Sekolah</h3>
          <p class="subtitle">Daftar SMA/MA se-Kabupaten Brebes beserta alamat dan kuota penerimaan.</p>

          <div class="gov-badges">
            <div class="gov-badge-pill"><i class="fa-solid fa-circle-check"></i> Data Resmi</div>
            <div class="gov-badge-pill"><i class="fa-solid fa-shield-halved"></i> Transparan</div>
            <div class="gov-badge-pill"><i class="fa-solid fa-building-columns"></i> Layanan PPDB</div>
          </div>
        </div>

        <div class="card gov-card">
          <div class="card-body">

            <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
                <i class="fas fa-check-circle"></i>
                <div><?= session()->getFlashdata('success') ?></div>
                <button type="button" class="close ms-auto" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>

            <div class="gov-toolbar">
              <div class="left">
                <form method="get" action="<?= base_url('sekolah') ?>" class="gov-search">
                  <div class="input-group input-group-sm">
                    <input type="text"
                          name="keyword"
                          class="form-control form-control-sm"
                          placeholder="Cari sekolah (nama/alamat)..."
                          value="<?= esc($keyword ?? '') ?>">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>

                  <a href="<?= base_url('sekolah') ?>" class="btn btn-sm gov-reset">
                    <i class="fas fa-rotate-left me-1"></i> Reset
                  </a>
                </form>
              </div>

              <div class="right">
                <button type="button" class="btn btn-sm gov-add" data-toggle="modal" data-target="#add">
                  <i class="fas fa-plus-circle me-1"></i> Tambah Sekolah
                </button>
              </div>
            </div>

            <div class="table-responsive gov-table">
              <table id="example2" class="table table-bordered table-hover align-middle">
                <thead>
                  <tr>
                    <th style="width:60px;">#</th>
                    <th style="width:120px;">ID Sekolah</th>
                    <th style="width:280px;">Nama Sekolah</th>
                    <th>Alamat</th>
                    <th style="width:120px;">Kuota</th>
                    <th style="width:130px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($sekolah as $row): ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= esc($row['id_sekolah']); ?></td>
                      <td><strong><?= esc($row['nama_sekolah']); ?></strong></td>
                      <td title="<?= esc($row['alamat']) ?>">
                        <?= esc(strlen($row['alamat']) > 70 ? substr($row['alamat'], 0, 70) . '...' : $row['alamat']); ?>
                      </td>

                      <td class="text-center">
                        <?php
                          $kuota = (int)$row['kuota'];
                          $badge = 'success';
                          if ($kuota < 300) $badge = 'danger';
                          elseif ($kuota < 350) $badge = 'warning';
                        ?>
                        <span class="quota <?= $badge ?>"><?= esc($kuota) ?></span>
                      </td>

                      <td class="text-center">
                        <div class="actions">
                          <button
                            class="icon-btn edit btn-edit"
                            data-id="<?= esc($row['id_sekolah']) ?>"
                            data-nama="<?= esc($row['nama_sekolah']) ?>"
                            data-alamat="<?= esc($row['alamat']) ?>"
                            data-kuota="<?= esc($row['kuota']) ?>"
                            data-toggle="modal"
                            data-target="#modalEdit"
                            title="Edit">
                            <i class="fas fa-edit"></i>
                          </button>

                          <button
                            class="icon-btn delete btn-delete"
                            data-id="<?= esc($row['id_sekolah']) ?>"
                            data-toggle="modal"
                            data-target="#modalDelete"
                            title="Hapus">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="add">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h4 class="modal-title"><i class="fas fa-plus-circle me-2"></i> Tambah Sekolah</h4>
            <button type="button" class="close text-white" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

          <?= form_open('sekolah/insertData') ?>
          <?= csrf_field() ?>

          <div class="modal-body">
            <div class="form-group">
              <label class="fw-bold">Nama Sekolah</label>
              <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" required>
            </div>

            <div class="form-group">
              <label class="fw-bold">Alamat</label>
              <textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required></textarea>
            </div>

            <div class="form-group">
              <label class="fw-bold">Kuota</label>
              <input type="number" name="kuota" class="form-control" placeholder="Kuota" required>
            </div>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          </div>

          <?= form_close() ?>

        </div>
      </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit">
      <div class="modal-dialog">
        <div class="modal-content">

          <form action="<?= base_url('sekolah/update') ?>" method="post">
            <?= csrf_field() ?>

            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-pen-to-square me-2"></i> Edit Sekolah</h4>
              <button type="button" class="close text-white" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <input type="hidden" name="id_sekolah" id="edit_id">

            <div class="modal-body">
              <div class="form-group">
                <label class="fw-bold">Nama Sekolah</label>
                <input type="text" id="edit_nama" name="nama_sekolah" class="form-control" required>
              </div>

              <div class="form-group">
                <label class="fw-bold">Alamat</label>
                <textarea id="edit_alamat" name="alamat" class="form-control" rows="3" required></textarea>
              </div>

              <div class="form-group">
                <label class="fw-bold">Kuota</label>
                <input type="number" id="edit_kuota" name="kuota" class="form-control" required>
              </div>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">

          <form action="<?= base_url('sekolah/delete') ?>" method="post">
            <?= csrf_field() ?>

            <div class="modal-header">
              <h4 class="modal-title"><i class="fas fa-trash me-2"></i> Hapus Sekolah</h4>
              <button type="button" class="close text-white" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <input type="hidden" name="id_sekolah" id="delete_id">

            <div class="modal-body">
              <div class="alert alert-danger mb-0">
                <strong>Perhatian!</strong> Data yang dihapus tidak bisa dikembalikan.
              </div>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <?= $this->endSection() ?>

    <?= $this->section('script') ?>
    <script>
      $(document).on('click', '.btn-edit', function () {
        $('#edit_id').val($(this).data('id'));
        $('#edit_nama').val($(this).data('nama'));
        $('#edit_alamat').val($(this).data('alamat'));
        $('#edit_kuota').val($(this).data('kuota'));
      });

      $(document).on('click', '.btn-delete', function () {
        $('#delete_id').val($(this).data('id'));
      });
    </script>
    <?= $this->endSection() ?>
