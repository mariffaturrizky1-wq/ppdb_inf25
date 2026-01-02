<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* =========================================================
   SEKOLAH - GOV PREMIUM TABLE UI
   ========================================================= */
:root{
  --gov-navy:#0B2F55;
  --gov-blue:#0F4C81;
  --gov-sky:#EAF2FF;
  --gov-gold:#F2B705;
  --gov-bg1:#F4F8FF;
  --gov-bg2:#EEF3FB;
  --gov-text:#122033;
  --gov-muted:#6B7A90;
  --gov-border:rgba(15,76,129,.16);
  --gov-shadow:0 18px 40px rgba(9,27,52,.10);
  --gov-shadow2:0 10px 24px rgba(9,27,52,.08);
}

.content-wrapper{ background: transparent !important; }
.content{ padding-top: 16px !important; }

.gov-page{
  min-height: calc(100vh - 120px);
  padding: 18px 14px 30px;
  background:
    radial-gradient(1200px 520px at 16% 0%, rgba(15,76,129,.16) 0%, rgba(15,76,129,0) 56%),
    radial-gradient(950px 420px at 88% 16%, rgba(242,183,5,.12) 0%, rgba(242,183,5,0) 56%),
    linear-gradient(180deg, var(--gov-bg1), var(--gov-bg2));
}

.gov-container{
  max-width: 1200px;
  margin: 0 auto;
}

/* Hero */
.gov-hero{
  background: linear-gradient(135deg, var(--gov-navy), var(--gov-blue));
  border-radius: 22px;
  color:#fff;
  padding: 18px 18px;
  box-shadow: 0 18px 40px rgba(11,47,85,.22);
  position: relative;
  overflow: hidden;
  margin-bottom: 14px;
}
.gov-hero:before{
  content:"";
  position:absolute;
  width: 360px; height: 360px;
  right: -160px; top: -200px;
  background: radial-gradient(circle, rgba(242,183,5,.22), rgba(242,183,5,0) 62%);
  border-radius: 50%;
}
.gov-hero .title{
  margin:0;
  font-weight: 900;
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

/* Card */
.gov-card{
  background: rgba(255,255,255,.90);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,.55);
  border-radius: 20px;
  box-shadow: var(--gov-shadow);
  margin-bottom: 16px;
}
.gov-card .card-body{
  padding: 18px;
}
@media (min-width:768px){
  .gov-card .card-body{ padding: 22px; }
}

/* Top bar inside card */
.gov-toolbar{
  display:flex;
  gap: 10px;
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

/* Search box */
.gov-search{
  display:flex;
  align-items:center;
  gap:10px;
  flex-wrap:wrap;
}
.gov-search .input-group{
  max-width: 360px;
}
.gov-search .form-control{
  border-radius: 999px 0 0 999px !important;
  border: 1px solid rgba(15,76,129,.18) !important;
  box-shadow: none !important;
}
.gov-search .btn{
  border-radius: 0 999px 999px 0 !important;
}
.gov-btn-reset{
  border-radius: 999px;
  padding: 7px 14px;
  border: 1px solid rgba(15,76,129,.18);
  background: rgba(15,76,129,.06);
  color: var(--gov-navy);
  font-weight: 800;
}
.gov-btn-reset:hover{
  background: rgba(15,76,129,.10);
}

/* Add button */
.gov-btn-add{
  border-radius: 999px;
  padding: 8px 14px;
  font-weight: 900;
  border: none;
  background: linear-gradient(135deg, var(--gov-gold), #ffd05a);
  color:#1a1a1a;
  box-shadow: 0 12px 20px rgba(242,183,5,.25);
}
.gov-btn-add:hover{ filter: brightness(.98); transform: translateY(-1px); transition: .15s ease; }

/* Table premium */
.gov-table{
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(15,76,129,.12);
  box-shadow: var(--gov-shadow2);
}
.gov-table table{ margin:0; }
.gov-table thead th{
  background: linear-gradient(135deg, var(--gov-navy), var(--gov-blue));
  color:#fff;
  border: none !important;
  font-weight: 900;
  font-size: 13px;
  padding: 12px 12px !important;
}
.gov-table tbody td{
  padding: 12px 12px !important;
  vertical-align: middle;
  border-color: rgba(15,76,129,.10) !important;
  color: var(--gov-text);
  font-size: 13px;
}
.gov-table tbody tr:nth-child(even){
  background: rgba(234,242,255,.55);
}
.gov-table tbody tr:hover{
  background: rgba(242,183,5,.10) !important;
  transition: .12s ease;
}

/* Badge kuota */
.gov-badge{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  min-width: 54px;
  padding: 6px 10px;
  border-radius: 999px;
  font-weight: 900;
  font-size: 12px;
  border: 1px solid rgba(0,0,0,.06);
}
.gov-badge.success{
  background: rgba(40,167,69,.14);
  color: #19723a;
  border-color: rgba(40,167,69,.25);
}
.gov-badge.warning{
  background: rgba(255,193,7,.18);
  color: #6b5200;
  border-color: rgba(255,193,7,.28);
}
.gov-badge.danger{
  background: rgba(220,53,69,.14);
  color: #8a1c28;
  border-color: rgba(220,53,69,.25);
}

/* Action buttons */
.gov-actions{
  display:flex;
  gap: 8px;
  justify-content:center;
}
.gov-icon-btn{
  width: 34px;
  height: 34px;
  border-radius: 12px;
  display:inline-flex;
  align-items:center;
  justify-content:center;
  border: 1px solid rgba(15,76,129,.12);
  box-shadow: 0 10px 18px rgba(9,27,52,.08);
}
.gov-icon-btn:hover{
  transform: translateY(-1px);
  transition: .15s ease;
}
.gov-icon-btn.edit{
  background: rgba(242,183,5,.18);
  color: #6b5200;
}
.gov-icon-btn.delete{
  background: rgba(220,53,69,.14);
  color: #8a1c28;
}

/* Modal polish */
.modal-content{
  border-radius: 18px;
  box-shadow: var(--gov-shadow);
  border: 1px solid rgba(15,76,129,.12);
}
.modal-header{
  background: linear-gradient(135deg, var(--gov-navy), var(--gov-blue));
  color:#fff;
  border-top-left-radius: 18px;
  border-top-right-radius: 18px;
}
.modal-title{
  font-weight: 900;
}
.modal-footer .btn{
  border-radius: 999px;
  font-weight: 800;
}

/* Alerts */
.alert{
  border-radius: 16px;
  border: 1px solid rgba(15,76,129,.10);
  box-shadow: var(--gov-shadow2);
}
</style>

<div class="gov-page">
  <div class="gov-container">

    <!-- HERO -->
    <div class="gov-hero">
      <h3 class="title"><i class="fas fa-school me-2"></i> Data Sekolah</h3>
      <p class="subtitle">Daftar SMA/MA se-Kabupaten Brebes beserta alamat dan kuota penerimaan.</p>
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

        <!-- TOOLBAR -->
        <div class="gov-toolbar">
          <div class="left">

            <!-- SEARCH -->
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

              <a href="<?= base_url('sekolah') ?>" class="gov-btn-reset btn btn-sm">
                <i class="fas fa-rotate-left me-1"></i> Reset
              </a>
            </form>

          </div>

          <div class="right">
            <button type="button"
                    class="btn gov-btn-add btn-sm"
                    data-toggle="modal"
                    data-target="#add">
              <i class="fas fa-plus-circle me-1"></i> Tambah Sekolah
            </button>
          </div>
        </div>

        <!-- TABLE -->
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
                    <span class="gov-badge <?= $badge ?>"><?= esc($kuota) ?></span>
                  </td>

                  <td class="text-center">
                    <div class="gov-actions">
                      <button
                        class="gov-icon-btn edit btn-edit"
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
                        class="gov-icon-btn delete btn-delete"
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
  // isi modal edit
  $(document).on('click', '.btn-edit', function () {
    $('#edit_id').val($(this).data('id'));
    $('#edit_nama').val($(this).data('nama'));
    $('#edit_alamat').val($(this).data('alamat'));
    $('#edit_kuota').val($(this).data('kuota'));
  });

  // isi modal delete
  $(document).on('click', '.btn-delete', function () {
    $('#delete_id').val($(this).data('id'));
  });
</script>
<?= $this->endSection() ?>
