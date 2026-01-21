<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* =========================================================
   SEKOLAH - GOV SIGNATURE UI (lebih resmi & elegan)
   - Background motif dot-grid + gradient
   - Hero resmi + badge layanan
   - Toolbar rapi (search & tombol)
   - Table formal (header navy, zebra soft)
   - Aksi icon button modern
   ========================================================= */
:root{
  --navy:#0B2F55;
  --navy2:#082845;
  --blue:#0F4C81;
  --blue2:#1362a6;
  --gold:#F2B705;
  --bg1:#F5F8FF;
  --bg2:#EEF3FB;
  --text:#122033;
  --muted:#6B7A90;
  --border:rgba(15,76,129,.16);
  --shadow:0 22px 54px rgba(9,27,52,.14);
  --shadow2:0 12px 28px rgba(9,27,52,.10);
  --shadow3:0 8px 18px rgba(9,27,52,.10);
}

/* AdminLTE override */
.content-wrapper{ background: transparent !important; }
.content{ padding-top: 16px !important; }

/* PAGE background */
.gov-page{
  min-height: calc(100vh - 120px);
  padding: 18px 14px 30px;
  background:
    radial-gradient(1100px 520px at 12% 0%, rgba(19,98,166,.15) 0%, rgba(19,98,166,0) 58%),
    radial-gradient(900px 420px at 86% 18%, rgba(242,183,5,.12) 0%, rgba(242,183,5,0) 58%),
    linear-gradient(180deg, var(--bg1), var(--bg2));
  position: relative;
  overflow: hidden;
}
.gov-page:before{
  content:"";
  position:absolute;
  inset:0;
  background-image: radial-gradient(circle at 1px 1px, rgba(15,76,129,.06) 1px, transparent 0);
  background-size: 18px 18px;
  opacity:.55;
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
  background: linear-gradient(135deg, var(--navy2), var(--blue));
  border-radius: 22px;
  color:#fff;
  padding: 18px 18px;
  box-shadow: 0 20px 52px rgba(11,47,85,.26);
  position: relative;
  overflow: hidden;
  margin-bottom: 14px;
}
.gov-hero:before{
  content:"";
  position:absolute;
  width: 520px; height: 520px;
  right: -260px; top: -330px;
  background: radial-gradient(circle, rgba(242,183,5,.26), rgba(242,183,5,0) 62%);
  border-radius: 50%;
}
.gov-hero:after{
  content:"";
  position:absolute;
  width: 360px; height: 360px;
  left: -210px; bottom: -240px;
  background: radial-gradient(circle, rgba(255,255,255,.16), rgba(255,255,255,0) 62%);
  border-radius: 50%;
}
.gov-hero .title{
  margin:0;
  font-weight: 950;
  letter-spacing:.2px;
  font-size: 1.45rem;
  position: relative;
  z-index:1;
}
.gov-hero .subtitle{
  margin: 6px 0 0;
  opacity:.92;
  font-size: .95rem;
  position: relative;
  z-index:1;
}
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
  background: rgba(255,255,255,.12);
  border: 1px solid rgba(255,255,255,.18);
  font-size: .85rem;
  font-weight: 900;
}

/* CARD */
.gov-card{
  background: rgba(255,255,255,.90);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,.55);
  border-radius: 20px;
  box-shadow: var(--shadow);
  margin-bottom: 16px;
  position: relative;
  overflow:hidden;
}
.gov-card:before{
  content:"";
  position:absolute;
  inset:-2px;
  background: radial-gradient(700px 220px at 18% 0%, rgba(19,98,166,.10), transparent 60%),
              radial-gradient(700px 220px at 88% 18%, rgba(242,183,5,.08), transparent 60%);
  pointer-events:none;
}
.gov-card .card-body{
  padding: 18px;
  position: relative;
  z-index:1;
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
.gov-toolbar .left{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  align-items:center;
}
.gov-toolbar .right{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  align-items:center;
}

/* SEARCH */
.gov-search{
  display:flex;
  align-items:center;
  gap:10px;
  flex-wrap:wrap;
}
.gov-search .input-group{ max-width: 380px; }
.gov-search .form-control{
  border-radius: 999px 0 0 999px !important;
  border: 1px solid rgba(15,76,129,.18) !important;
  box-shadow: none !important;
  padding: 10px 14px !important;
}
.gov-search .btn{
  border-radius: 0 999px 999px 0 !important;
}
.gov-reset{
  border-radius: 999px !important;
  padding: 8px 14px !important;
  border: 1px solid rgba(15,76,129,.18) !important;
  background: rgba(15,76,129,.06) !important;
  color: var(--navy) !important;
  font-weight: 900 !important;
}
.gov-reset:hover{ background: rgba(15,76,129,.10) !important; }

/* ADD */
.gov-add{
  border-radius: 999px !important;
  padding: 10px 14px !important;
  font-weight: 950 !important;
  border: none !important;
  background: linear-gradient(135deg, var(--gold), #ffd05a) !important;
  color:#1a1a1a !important;
  box-shadow: 0 12px 20px rgba(242,183,5,.25) !important;
}
.gov-add:hover{ transform: translateY(-1px); transition:.15s ease; }

/* TABLE */
.gov-table{
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(15,76,129,.12);
  box-shadow: var(--shadow2);
}
.gov-table table{ margin:0; }
.gov-table thead th{
  background: linear-gradient(135deg, var(--navy), var(--blue));
  color:#fff;
  border: none !important;
  font-weight: 950;
  font-size: 13px;
  padding: 12px 12px !important;
  letter-spacing:.15px;
}
.gov-table tbody td{
  padding: 12px 12px !important;
  vertical-align: middle;
  border-color: rgba(15,76,129,.10) !important;
  color: var(--text);
  font-size: 13px;
}
.gov-table tbody tr:nth-child(even){ background: rgba(234,242,255,.55); }
.gov-table tbody tr:hover{ background: rgba(242,183,5,.10) !important; transition:.12s ease; }

/* Kuota pill */
.quota{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  min-width: 56px;
  padding: 6px 10px;
  border-radius: 999px;
  font-weight: 950;
  font-size: 12px;
  border: 1px solid rgba(0,0,0,.06);
}
.quota.success{ background: rgba(40,167,69,.14); color:#19723a; border-color: rgba(40,167,69,.25); }
.quota.warning{ background: rgba(255,193,7,.18); color:#6b5200; border-color: rgba(255,193,7,.28); }
.quota.danger{ background: rgba(220,53,69,.14); color:#8a1c28; border-color: rgba(220,53,69,.25); }

/* Actions */
.actions{
  display:flex;
  gap: 8px;
  justify-content:center;
}
.icon-btn{
  width: 36px;
  height: 36px;
  border-radius: 12px;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  border: 1px solid rgba(15,76,129,.12);
  box-shadow: var(--shadow3);
}
.icon-btn:hover{ transform: translateY(-1px); transition:.15s ease; }
.icon-btn.edit{ background: rgba(242,183,5,.18); color:#6b5200; }
.icon-btn.delete{ background: rgba(220,53,69,.14); color:#8a1c28; }

/* Modal polish */
.modal-content{
  border-radius: 18px;
  box-shadow: var(--shadow);
  border: 1px solid rgba(15,76,129,.12);
}
.modal-header{
  background: linear-gradient(135deg, var(--navy2), var(--blue));
  color:#fff;
  border-top-left-radius: 18px;
  border-top-right-radius: 18px;
}
.modal-title{ font-weight: 950; }
.modal-footer .btn{ border-radius: 999px; font-weight: 900; }

/* Alerts */
.alert{
  border-radius: 16px;
  border: 1px solid rgba(15,76,129,.10);
  box-shadow: var(--shadow2);
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
