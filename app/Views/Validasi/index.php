<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="col-12">

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Status Pendaftaran</h3>
    </div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-6">
          <p><b>Nomor Pendaftaran:</b> <?= esc($pendaftaran['no_pendaftaran']) ?></p>
          <p><b>Nama:</b> <?= esc($pendaftaran['nama_lengkap']) ?></p>
          <p><b>NISN:</b> <?= esc($pendaftaran['nisn']) ?></p>
        </div>
        <div class="col-md-6">
          <p><b>Status:</b> <?= esc($pendaftaran['status']) ?></p>
          <p><b>Tanggal Submit:</b> <?= esc($pendaftaran['created_at']) ?></p>
        </div>
      </div>

      <hr>

      <h5>Status Dokumen</h5>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Jenis</th>
              <th>Status</th>
              <th>File</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($dokumen)): ?>
              <?php foreach ($dokumen as $d): ?>
                <tr>
                  <td><?= esc($d['jenis']) ?></td>
                  <td><?= esc($d['status']) ?></td>
                  <td>
                    <?php if (!empty($d['file_path'])): ?>
                      <a href="<?= base_url($d['file_path']) ?>" target="_blank">Lihat</a>
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="3">Dokumen belum tersedia.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <hr>

      <h5>Riwayat Proses</h5>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($log)): ?>
              <?php foreach ($log as $l): ?>
                <tr>
                  <td><?= esc($l['waktu']) ?></td>
                  <td><?= esc($l['aksi']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="2">Belum ada log.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</div>

<?= $this->endSection() ?>