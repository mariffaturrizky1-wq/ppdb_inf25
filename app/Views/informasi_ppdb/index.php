<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* =========================================================
   INFORMASI PPDB - GOV PREMIUM UI (lebih elegan & menarik)
   Cocok untuk AdminLTE / Bootstrap
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

/* paksa hilangin putih bawaan template */
.content-wrapper{ background: transparent !important; }
.content{ padding-top: 16px !important; }

/* background halaman full */
.gov-page{
  min-height: calc(100vh - 120px);
  padding: 18px 14px 30px;
  background:
    radial-gradient(1200px 520px at 16% 0%, rgba(15,76,129,.18) 0%, rgba(15,76,129,0) 56%),
    radial-gradient(950px 420px at 88% 16%, rgba(242,183,5,.14) 0%, rgba(242,183,5,0) 56%),
    linear-gradient(180deg, var(--gov-bg1), var(--gov-bg2));
}

/* container lebih proporsional */
.gov-container{
  max-width: 1120px;
  margin: 0 auto;
}

/* HERO header */
.gov-hero{
  background: linear-gradient(135deg, var(--gov-navy), var(--gov-blue));
  border-radius: 22px;
  color:#fff;
  padding: 20px 20px;
  box-shadow: 0 18px 40px rgba(11,47,85,.22);
  position: relative;
  overflow: hidden;
  margin-bottom: 16px;
}
.gov-hero:before{
  content:"";
  position:absolute;
  width: 360px; height: 360px;
  right: -150px; top: -180px;
  background: radial-gradient(circle, rgba(242,183,5,.22), rgba(242,183,5,0) 62%);
  border-radius: 50%;
}
.gov-hero:after{
  content:"";
  position:absolute;
  width: 260px; height: 260px;
  left: -120px; bottom: -150px;
  background: radial-gradient(circle, rgba(255,255,255,.16), rgba(255,255,255,0) 62%);
  border-radius: 50%;
}
.gov-hero .title{
  margin:0;
  font-weight: 900;
  letter-spacing:.2px;
  font-size: 1.55rem;
  position: relative;
  z-index:1;
}
.gov-hero .subtitle{
  margin: 6px 0 0;
  opacity:.92;
  font-size: .98rem;
  position: relative;
  z-index:1;
}

/* chips */
.gov-chips{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  margin-top: 12px;
  position: relative;
  z-index: 1;
}
.gov-chip{
  background: rgba(255,255,255,.12);
  border: 1px solid rgba(255,255,255,.18);
  color:#fff;
  padding: 8px 12px;
  border-radius: 999px;
  font-size: .86rem;
  display:flex;
  align-items:center;
  gap: 8px;
}

/* card style */
.gov-card{
  background: rgba(255,255,255,.88);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,.55);
  border-radius: 20px;
  box-shadow: var(--gov-shadow);
  margin-bottom: 16px;
}
.gov-card .card-body{
  padding: 22px;
}
@media (min-width:768px){
  .gov-card .card-body{ padding: 28px; }
}

/* section header */
.gov-section-head{
  display:flex;
  justify-content: space-between;
  align-items:center;
  gap: 12px;
  margin-bottom: 14px;
}
.gov-section-title{
  display:flex;
  align-items:center;
  gap: 10px;
  margin:0;
  font-weight: 900;
  color: var(--gov-navy);
  letter-spacing:.1px;
}
.gov-dot{
  width:10px;height:10px;border-radius:50%;
  background: var(--gov-gold);
  box-shadow: 0 0 0 8px rgba(242,183,5,.14);
}
.gov-section-sub{
  margin:0;
  color: var(--gov-muted);
  font-size: .92rem;
}

/* alert info */
.gov-info{
  background: linear-gradient(180deg, rgba(242,183,5,.18), rgba(242,183,5,.09));
  border: 1px solid rgba(242,183,5,.34);
  color:#6b5200;
  border-radius: 16px;
  padding: 12px 14px;
  display:flex;
  gap: 10px;
  align-items:flex-start;
  margin-bottom: 14px;
}

/* timeline steps */
.gov-steps{
  display:flex;
  flex-direction: column;
  gap: 12px;
  padding-left: 6px;
  position: relative;
}
.gov-steps:before{
  content:"";
  position:absolute;
  left: 18px;
  top: 4px;
  bottom: 4px;
  width: 2px;
  background: linear-gradient(180deg, rgba(15,76,129,.35), rgba(15,76,129,.08));
}
.gov-step{
  display:flex;
  gap: 12px;
  align-items:flex-start;
}
.gov-step .num{
  width: 36px; height: 36px;
  border-radius: 14px;
  background: linear-gradient(180deg, #EAF2FF, #F6FAFF);
  border: 1px solid rgba(15,76,129,.22);
  color: var(--gov-blue);
  font-weight: 900;
  display:grid;
  place-items:center;
  box-shadow: var(--gov-shadow2);
  flex: 0 0 auto;
  position: relative;
  z-index: 1;
}
.gov-step .box{
  background: rgba(255,255,255,.94);
  border: 1px solid rgba(15,76,129,.12);
  border-radius: 16px;
  padding: 12px 14px;
  width: 100%;
  box-shadow: var(--gov-shadow2);
}
.gov-step .box b{
  display:block;
  color: var(--gov-text);
  font-weight: 900;
  margin-bottom: 2px;
}
.gov-step .box small{
  color: var(--gov-muted);
}

/* table premium */
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
  padding: 14px 14px !important;
}
.gov-table tbody td{
  padding: 13px 14px !important;
  vertical-align: middle;
  border-color: rgba(15,76,129,.10) !important;
  color: var(--gov-text);
}
.gov-table tbody tr:nth-child(even){
  background: rgba(234,242,255,.55);
}
.gov-pill{
  display:inline-flex;
  align-items:center;
  gap: 8px;
  padding: 6px 10px;
  border-radius: 999px;
  background: rgba(15,76,129,.08);
  border: 1px solid rgba(15,76,129,.14);
  color: var(--gov-navy);
  font-weight: 800;
  font-size: .86rem;
}

/* pengumuman list */
.gov-list .list-group-item{
  border: 1px solid rgba(15,76,129,.12);
  border-radius: 16px;
  margin-bottom: 10px;
  box-shadow: var(--gov-shadow2);
  padding: 14px 14px;
}
.gov-list .list-group-item:last-child{ margin-bottom: 0; }
.gov-list .list-group-item strong{
  font-weight: 900;
  color: var(--gov-navy);
}
.gov-list .list-group-item .small{
  color: var(--gov-muted) !important;
}
.gov-list .list-group-item:hover{
  transform: translateY(-1px);
  transition: .15s ease;
}

/* minor */
.gov-muted{ color: var(--gov-muted); }
</style>

<div class="gov-page">
  <div class="gov-container">

    <!-- HERO -->
    <div class="gov-hero">
      <h3 class="title"><i class="fa-solid fa-circle-info me-2"></i> Informasi PPDB</h3>
      <p class="subtitle">Informasi resmi Penerimaan Peserta Didik Baru (PPDB) — ringkas, jelas, dan transparan.</p>

      <div class="gov-chips">
        <div class="gov-chip"><i class="fa-solid fa-shield-halved"></i> Resmi</div>
        <div class="gov-chip"><i class="fa-solid fa-calendar-check"></i> Jadwal Terstruktur</div>
        <div class="gov-chip"><i class="fa-solid fa-route"></i> Alur Jelas</div>
      </div>
    </div>

    <!-- ALUR -->
    <div class="card gov-card">
      <div class="card-body">

        <div class="gov-section-head">
          <h5 class="gov-section-title"><span class="gov-dot"></span><i class="fa-solid fa-route"></i> Alur Pendaftaran PPDB</h5>
          <p class="gov-section-sub">Ikuti langkah berikut agar pendaftaran lancar</p>
        </div>

        <div class="gov-info">
          <i class="fa-solid fa-circle-exclamation mt-1"></i>
          <div>
            <div style="font-weight:900;">Catatan</div>
            <div style="font-size:.92rem;">Pastikan data sesuai dokumen resmi. Berkas harus jelas agar lolos verifikasi.</div>
          </div>
        </div>

        <?php if (!empty($alur)): ?>
          <div class="gov-steps">
            <?php foreach ($alur as $a): ?>
              <div class="gov-step">
                <div class="num"><?= esc($a['langkah']) ?></div>
                <div class="box">
                  <b><?= esc($a['judul']) ?></b>
                  <small><?= esc($a['deskripsi']) ?></small>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="gov-muted mb-0">Alur pendaftaran belum tersedia.</p>
        <?php endif; ?>

      </div>
    </div>

    <!-- JADWAL -->
    <div class="card gov-card">
      <div class="card-body">

        <div class="gov-section-head">
          <h5 class="gov-section-title"><span class="gov-dot"></span><i class="fa-solid fa-calendar-days"></i> Jadwal PPDB</h5>
          <p class="gov-section-sub">Jadwal dapat berubah sesuai kebijakan dinas</p>
        </div>

        <?php if (!empty($jadwal)): ?>
          <div class="table-responsive gov-table">
            <table class="table table-bordered align-middle">
              <thead>
                <tr>
                  <th style="width:34%;">Kegiatan</th>
                  <th style="width:30%;">Tanggal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($jadwal as $j): ?>
                  <tr>
                    <td>
                      <span class="gov-pill"><i class="fa-solid fa-flag"></i><?= esc($j['kegiatan']) ?></span>
                    </td>
                    <td>
                      <?= esc($j['tanggal_mulai']) ?>
                      <?php if (!empty($j['tanggal_selesai']) && $j['tanggal_mulai'] != $j['tanggal_selesai']): ?>
                        s/d <?= esc($j['tanggal_selesai']) ?>
                      <?php endif; ?>
                    </td>
                    <td><?= esc($j['keterangan'] ?? '-') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <p class="gov-muted mb-0">Jadwal PPDB belum tersedia.</p>
        <?php endif; ?>

      </div>
    </div>

    <!-- PENGUMUMAN -->
    <div class="card gov-card">
      <div class="card-body">

        <div class="gov-section-head">
          <h5 class="gov-section-title"><span class="gov-dot"></span><i class="fa-solid fa-bullhorn"></i> Pengumuman Terbaru</h5>
          <p class="gov-section-sub">Update resmi terbaru seputar PPDB</p>
        </div>

        <?php if (!empty($pengumuman)): ?>
          <div class="list-group gov-list">
            <?php foreach ($pengumuman as $p): ?>
              <div class="list-group-item">
                <strong><i class="fa-solid fa-circle-check me-2" style="color:var(--gov-gold)"></i><?= esc($p['judul'] ?? 'Tanpa Judul') ?></strong>
                <div class="small mt-2">
                  <?= esc($p['isi'] ?? '') ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="gov-muted mb-0">Belum ada pengumuman.</p>
        <?php endif; ?>

      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
