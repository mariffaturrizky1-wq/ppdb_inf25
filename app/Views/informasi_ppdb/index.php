<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* =========================================================
   INFORMASI PPDB - GOV OFFICIAL PREMIUM (AdminLTE/Bootstrap)
   Fokus: rapi, elegan, modern, ala web pemerintah
   ========================================================= */
:root{
  --navy:#0B2F55;
  --blue:#0F4C81;
  --sky:#EAF2FF;
  --gold:#F2B705;
  --bg1:#F6FAFF;
  --bg2:#EEF3FB;
  --text:#122033;
  --muted:#6B7A90;
  --border:rgba(15,76,129,.16);
  --shadow:0 18px 45px rgba(9,27,52,.12);
  --shadow2:0 10px 26px rgba(9,27,52,.10);
  --radius:20px;
}

.content-wrapper{ background: transparent !important; }
.content{ padding-top: 16px !important; }

/* page background */
.ppdb-page{
  min-height: calc(100vh - 120px);
  padding: 18px 14px 32px;
  background:
    radial-gradient(1200px 520px at 16% 0%, rgba(15,76,129,.16) 0%, rgba(15,76,129,0) 56%),
    radial-gradient(950px 420px at 88% 12%, rgba(242,183,5,.12) 0%, rgba(242,183,5,0) 58%),
    linear-gradient(180deg, var(--bg1), var(--bg2));
}

.ppdb-container{
  max-width: 1120px;
  margin: 0 auto;
}

/* hero */
.ppdb-hero{
  background: linear-gradient(135deg, var(--navy), var(--blue));
  border-radius: calc(var(--radius) + 4px);
  color:#fff;
  padding: 22px 22px;
  box-shadow: 0 20px 48px rgba(11,47,85,.24);
  position: relative;
  overflow: hidden;
  margin-bottom: 16px;
}
.ppdb-hero:before{
  content:"";
  position:absolute;
  width: 420px; height: 420px;
  right: -200px; top: -240px;
  background: radial-gradient(circle, rgba(242,183,5,.24), rgba(242,183,5,0) 62%);
  border-radius: 50%;
}
.ppdb-hero:after{
  content:"";
  position:absolute;
  width: 300px; height: 300px;
  left: -150px; bottom: -190px;
  background: radial-gradient(circle, rgba(255,255,255,.18), rgba(255,255,255,0) 62%);
  border-radius: 50%;
}
.ppdb-hero .title{
  margin:0;
  font-weight: 900;
  letter-spacing:.2px;
  font-size: 1.65rem;
  position: relative;
  z-index:1;
}
.ppdb-hero .subtitle{
  margin: 6px 0 0;
  opacity:.92;
  font-size: .98rem;
  position: relative;
  z-index:1;
  max-width: 760px;
}
.ppdb-chips{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  margin-top: 12px;
  position: relative;
  z-index: 1;
}
.ppdb-chip{
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

/* cards */
.ppdb-card{
  background: rgba(255,255,255,.90);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,.58);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  overflow: hidden;
  margin-bottom: 16px;
}
.ppdb-card .body{ padding: 18px; }
@media(min-width:768px){ .ppdb-card .body{ padding: 22px; } }

/* card header inside */
.sec-head{
  display:flex;
  justify-content: space-between;
  align-items:center;
  gap: 12px;
  margin-bottom: 12px;
}
.sec-title{
  display:flex;
  align-items:center;
  gap: 10px;
  margin:0;
  font-weight: 900;
  color: var(--navy);
  letter-spacing:.1px;
}
.sec-dot{
  width:10px;height:10px;border-radius:50%;
  background: var(--gold);
  box-shadow: 0 0 0 8px rgba(242,183,5,.14);
}
.sec-sub{
  margin:0;
  color: var(--muted);
  font-size: .92rem;
}

/* info box */
.ppdb-info{
  background: linear-gradient(180deg, rgba(242,183,5,.18), rgba(242,183,5,.10));
  border: 1px solid rgba(242,183,5,.34);
  color:#6b5200;
  border-radius: 16px;
  padding: 12px 14px;
  display:flex;
  gap: 10px;
  align-items:flex-start;
  margin-bottom: 14px;
}

/* grid layout */
.ppdb-grid{
  display:grid;
  grid-template-columns: 1fr;
  gap: 16px;
}
@media(min-width: 992px){
  .ppdb-grid{ grid-template-columns: 1.1fr .9fr; }
}

/* steps timeline */
.steps{
  display:flex;
  flex-direction: column;
  gap: 12px;
  padding-left: 6px;
  position: relative;
}
.steps:before{
  content:"";
  position:absolute;
  left: 18px;
  top: 4px;
  bottom: 4px;
  width: 2px;
  background: linear-gradient(180deg, rgba(15,76,129,.35), rgba(15,76,129,.08));
}
.step{
  display:flex;
  gap: 12px;
  align-items:flex-start;
}
.step .num{
  width: 38px; height: 38px;
  border-radius: 14px;
  background: linear-gradient(180deg, #EAF2FF, #F7FBFF);
  border: 1px solid rgba(15,76,129,.22);
  color: var(--blue);
  font-weight: 900;
  display:grid;
  place-items:center;
  box-shadow: var(--shadow2);
  flex: 0 0 auto;
  position: relative;
  z-index: 1;
}
.step .box{
  background: rgba(255,255,255,.94);
  border: 1px solid rgba(15,76,129,.12);
  border-radius: 16px;
  padding: 12px 14px;
  width: 100%;
  box-shadow: var(--shadow2);
}
.step .box b{
  display:block;
  color: var(--text);
  font-weight: 900;
  margin-bottom: 2px;
}
.step .box small{ color: var(--muted); }

/* schedule table */
.table-wrap{
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid rgba(15,76,129,.12);
  box-shadow: var(--shadow2);
}
.table-wrap table{ margin:0; }
.table-wrap thead th{
  background: linear-gradient(135deg, var(--navy), var(--blue));
  color:#fff;
  border: none !important;
  font-weight: 900;
  padding: 12px 12px !important;
  font-size: 13px;
}
.table-wrap tbody td{
  padding: 12px 12px !important;
  vertical-align: middle;
  border-color: rgba(15,76,129,.10) !important;
  color: var(--text);
  font-size: 13px;
}
.table-wrap tbody tr:nth-child(even){
  background: rgba(234,242,255,.55);
}
.pill{
  display:inline-flex;
  align-items:center;
  gap: 8px;
  padding: 6px 10px;
  border-radius: 999px;
  background: rgba(15,76,129,.08);
  border: 1px solid rgba(15,76,129,.14);
  color: var(--navy);
  font-weight: 900;
  font-size: .86rem;
}

/* announcements (lebih mewah) */
.ann-list{
  display:flex;
  flex-direction: column;
  gap: 12px;
}
.ann-card{
  border-radius: 18px;
  border: 1px solid rgba(15,76,129,.12);
  background: rgba(255,255,255,.95);
  box-shadow: var(--shadow2);
  overflow: hidden;
  position: relative;
}
.ann-card:before{
  content:"";
  position:absolute;
  left:0; top:0; bottom:0;
  width: 6px;
  background: linear-gradient(180deg, var(--gold), rgba(242,183,5,.25));
}
.ann-head{
  padding: 14px 16px 10px 18px;
  display:flex;
  justify-content: space-between;
  align-items:flex-start;
  gap: 12px;
}
.ann-title{
  font-weight: 900;
  color: var(--navy);
  margin:0;
  font-size: 1.02rem;
}
.ann-meta{
  display:flex;
  gap: 8px;
  flex-wrap: wrap;
  justify-content:flex-end;
}
.badge-soft{
  display:inline-flex;
  align-items:center;
  gap: 8px;
  padding: 6px 10px;
  border-radius: 999px;
  font-weight: 900;
  font-size: 12px;
  border: 1px solid rgba(0,0,0,.06);
  white-space: nowrap;
}
.badge-soft.blue{
  background: rgba(15,76,129,.10);
  color: var(--navy);
  border-color: rgba(15,76,129,.16);
}
.badge-soft.gold{
  background: rgba(242,183,5,.18);
  color: #6b5200;
  border-color: rgba(242,183,5,.28);
}

.ann-body{
  padding: 0 16px 16px 18px;
}

/* typography for HTML from DB */
.gov-content{
  color: var(--muted);
  line-height: 1.70;
  font-size: .95rem;
}
.gov-content p{ margin: 0 0 10px; }
.gov-content ul, .gov-content ol{ margin: 0 0 10px 18px; }
.gov-content li{ margin-bottom: 6px; }
.gov-content h1, .gov-content h2, .gov-content h3, .gov-content h4{
  color: var(--navy);
  font-weight: 900;
  margin: 10px 0 8px;
}
.gov-content blockquote{
  margin: 12px 0;
  padding: 12px 12px;
  border-left: 4px solid rgba(242,183,5,.9);
  background: rgba(242,183,5,.10);
  border-radius: 14px;
}
.gov-content strong{ color: var(--text); }
.gov-content a{
  color: var(--blue);
  font-weight: 900;
  text-decoration: none;
  border-bottom: 1px dashed rgba(15,76,129,.4);
}
.gov-content a:hover{ border-bottom-style: solid; }

/* small */
.muted{ color: var(--muted); }
</style>

<div class="ppdb-page">
  <div class="ppdb-container">

    <!-- HERO -->
    <div class="ppdb-hero">
      <h3 class="title"><i class="fa-solid fa-landmark me-2"></i> Informasi PPDB</h3>
      <p class="subtitle">
        Informasi resmi PPDB — alur, jadwal, dan pengumuman. Pastikan membaca seluruh informasi sebelum melakukan pendaftaran.
      </p>

      <div class="ppdb-chips">
        <div class="ppdb-chip"><i class="fa-solid fa-shield-halved"></i> Resmi</div>
        <div class="ppdb-chip"><i class="fa-solid fa-circle-check"></i> Transparan</div>
        <div class="ppdb-chip"><i class="fa-solid fa-calendar-check"></i> Jadwal Terstruktur</div>
      </div>
    </div>

    <!-- GRID: ALUR + JADWAL -->
    <div class="ppdb-grid">

      <!-- ALUR -->
      <div class="ppdb-card">
        <div class="body">

          <div class="sec-head">
            <h5 class="sec-title"><span class="sec-dot"></span><i class="fa-solid fa-route"></i> Alur Pendaftaran</h5>
            <p class="sec-sub">Langkah singkat pendaftaran</p>
          </div>

          <div class="ppdb-info">
            <i class="fa-solid fa-circle-exclamation mt-1"></i>
            <div>
              <div style="font-weight:900;">Catatan</div>
              <div style="font-size:.92rem;">Pastikan data sesuai dokumen resmi. Berkas harus jelas agar lolos verifikasi.</div>
            </div>
          </div>

          <?php if (!empty($alur)): ?>
            <div class="steps">
              <?php foreach ($alur as $a): ?>
                <div class="step">
                  <div class="num"><?= esc($a['langkah']) ?></div>
                  <div class="box">
                    <b><?= esc($a['judul']) ?></b>
                    <small><?= esc($a['deskripsi']) ?></small>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <p class="muted mb-0">Alur pendaftaran belum tersedia.</p>
          <?php endif; ?>

        </div>
      </div>

      <!-- JADWAL -->
      <div class="ppdb-card">
        <div class="body">

          <div class="sec-head">
            <h5 class="sec-title"><span class="sec-dot"></span><i class="fa-solid fa-calendar-days"></i> Jadwal PPDB</h5>
            <p class="sec-sub">Dapat berubah sesuai kebijakan</p>
          </div>

          <?php if (!empty($jadwal)): ?>
            <div class="table-responsive table-wrap">
              <table class="table table-bordered align-middle">
                <thead>
                  <tr>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($jadwal as $j): ?>
                    <tr>
                      <td><span class="pill"><i class="fa-solid fa-flag"></i><?= esc($j['kegiatan']) ?></span></td>
                      <td>
                        <?= esc($j['tanggal_mulai']) ?>
                        <?php if (!empty($j['tanggal_selesai']) && $j['tanggal_mulai'] != $j['tanggal_selesai']): ?>
                          s/d <?= esc($j['tanggal_selesai']) ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else: ?>
            <p class="muted mb-0">Jadwal PPDB belum tersedia.</p>
          <?php endif; ?>

        </div>
      </div>

    </div>

    <!-- PENGUMUMAN -->
    <div class="ppdb-card">
      <div class="body">

        <div class="sec-head">
          <h5 class="sec-title"><span class="sec-dot"></span><i class="fa-solid fa-bullhorn"></i> Pengumuman Terbaru</h5>
          <p class="sec-sub">Update resmi seputar PPDB</p>
        </div>

        <?php if (!empty($pengumuman)): ?>
          <div class="ann-list">
            <?php foreach ($pengumuman as $p): ?>
              <div class="ann-card">
                <div class="ann-head">
                  <h6 class="ann-title">
                    <i class="fa-solid fa-circle-check me-2" style="color:var(--gold)"></i>
                    <?= esc($p['judul'] ?? 'Tanpa Judul') ?>
                  </h6>

                  <div class="ann-meta">
                    <span class="badge-soft gold"><i class="fa-solid fa-bullhorn"></i> Pengumuman</span>
                    <span class="badge-soft blue"><i class="fa-solid fa-file-lines"></i> Resmi</span>
                  </div>
                </div>

                <div class="ann-body">
                  <div class="gov-content">
                    <?php
                      // Render HTML dari DB tapi tetap aman (buang script/iframe/dll)
                      $allowed = '<p><br><b><strong><i><em><u><ul><ol><li><h1><h2><h3><h4><blockquote><a>';
                      echo strip_tags($p['isi'] ?? '', $allowed);
                    ?>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="muted mb-0">Belum ada pengumuman.</p>
        <?php endif; ?>

      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
