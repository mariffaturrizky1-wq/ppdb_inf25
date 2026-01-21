<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>
<style>
/* ======================
   PPDB VALIDASI — TONE PENDAFTARAN (LIGHT)
   Full replace CSS
   ====================== */

:root{
  /* base pendaftaran (terang) */
  --bg0:#F3F6FB;         /* page background */
  --bg1:#FFFFFF;         /* card base */
  --bg2:#EEF4FF;         /* soft section */

  --card:#FFFFFF;
  --card2:#F7FAFF;

  --stroke: rgba(15, 23, 42, .10);
  --stroke2: rgba(15, 23, 42, .14);

  --text:#0F172A;        /* slate-900 */
  --muted: rgba(15, 23, 42, .70);
  --muted2: rgba(15, 23, 42, .55);

  /* accent pendaftaran */
  --primary:#2563EB;     /* blue-600 */
  --primary2:#1D4ED8;    /* blue-700 */
  --cyan:#06B6D4;
  --emerald:#10B981;
  --amber:#F59E0B;
  --rose:#EF4444;

  --shadow: 0 18px 60px rgba(15,23,42,.10);
  --shadow2: 0 10px 30px rgba(15,23,42,.08);

  --r16:16px;
  --r18:18px;
  --r22:22px;
  --r24:24px;
}

.ppdb-shell{
  min-height: 72vh;
  padding: 18px 12px;
  border-radius: var(--r22);
  background:
    radial-gradient(900px 520px at 10% 0%, rgba(37,99,235,.14), transparent 60%),
    radial-gradient(900px 520px at 90% 18%, rgba(6,182,212,.10), transparent 60%),
    linear-gradient(180deg, var(--bg0) 0%, #FFFFFF 60%, var(--bg0) 100%);
}

.ppdb-wrap{ max-width: 1180px; margin: 0 auto; }

/* ====== Top bar ====== */
.ppdb-top{
  display:flex; justify-content:space-between; align-items:flex-start;
  gap:12px; margin-bottom: 14px;
}
.ppdb-title{
  margin:0; font-weight: 950; letter-spacing:.2px;
  font-size: 1.25rem;
  background: linear-gradient(90deg, var(--primary), var(--cyan), var(--primary2));
  -webkit-background-clip:text; -webkit-text-fill-color:transparent;
}
.ppdb-sub{ margin:6px 0 0; color: var(--muted); font-weight: 650; }

.ppdb-actions{ display:flex; gap:10px; flex-wrap:wrap; align-items:center; }

/* chip + button (light) */
.chip{
  display:inline-flex; align-items:center; gap:10px;
  padding: 10px 12px; border-radius: 999px;
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.92);
  box-shadow: var(--shadow2);
  color: var(--text); font-weight: 900; font-size: .9rem;
}
.chip svg{ opacity:.9 }
.chip svg path{ stroke: currentColor !important; } /* biar stroke tidak putih */

.btnx{
  display:inline-flex; align-items:center; gap:10px;
  padding: 10px 14px;
  border-radius: 14px;
  border: 1px solid var(--stroke2);
  background: rgba(255,255,255,.94);
  color: var(--text);
  font-weight: 950;
  text-decoration:none;
  box-shadow: var(--shadow2);
  transition: transform .10s ease, box-shadow .10s ease, background .10s ease;
  user-select:none;
}
.btnx svg path{ stroke: currentColor !important; } /* biar icon ikut warna */
.btnx:hover{
  transform: translateY(-1px);
  box-shadow: 0 16px 50px rgba(15,23,42,.12);
  background: rgba(255,255,255,1);
  text-decoration:none;
  color: var(--text);
}
.btnx.primary{
  border-color: rgba(37,99,235,.35);
  background: rgba(37,99,235,.10);
  color: var(--primary2);
}
.btnx.primary:hover{
  background: rgba(37,99,235,.14);
  color: var(--primary2);
}
.btnx.danger{
  border-color: rgba(239,68,68,.30);
  background: rgba(239,68,68,.08);
  color: var(--rose);
}
.btnx.danger:hover{
  background: rgba(239,68,68,.12);
  color: var(--rose);
}

/* ====== Hero card ====== */
.hero{
  border-radius: var(--r24);
  border: 1px solid var(--stroke);
  background:
    radial-gradient(900px 260px at 14% 0%, rgba(37,99,235,.10), transparent 60%),
    radial-gradient(900px 260px at 90% 0%, rgba(16,185,129,.08), transparent 60%),
    rgba(255,255,255,.88);
  box-shadow: var(--shadow);
  overflow:hidden;
  backdrop-filter: blur(8px);
}
.hero-head{
  display:flex; justify-content:space-between; align-items:center;
  padding: 16px 18px;
  border-bottom: 1px solid var(--stroke);
  gap: 10px;
}
.hero-left{
  display:flex; align-items:center; gap:12px;
}
.hero-icon{
  width:44px; height:44px; border-radius: 14px;
  display:grid; place-items:center;
  border: 1px solid rgba(37,99,235,.18);
  background: rgba(37,99,235,.08);
  color: var(--primary2);
}
.hero-icon svg path{ stroke: currentColor !important; }

.hero-h{
  margin:0; color:var(--text); font-weight: 980; letter-spacing:.2px;
  font-size: 1.05rem;
}
.hero-p{
  margin:4px 0 0; color: var(--muted); font-weight: 650; font-size: .92rem;
}

/* ====== Main status pill ====== */
.pill{
  display:inline-flex; align-items:center; gap:10px;
  padding: 10px 14px;
  border-radius: 999px;
  border: 1px solid transparent;
  font-weight: 980;
  box-shadow: var(--shadow2);
  white-space:nowrap;
  background: rgba(255,255,255,.92);
}
.dot{ width:10px; height:10px; border-radius:50%; background: currentColor; }
.pill.pending{ color: var(--amber); border-color: rgba(245,158,11,.35); background: rgba(245,158,11,.08); }
.pill.review{  color: var(--primary2); border-color: rgba(37,99,235,.30); background: rgba(37,99,235,.08); }
.pill.ok{      color: var(--emerald); border-color: rgba(16,185,129,.30); background: rgba(16,185,129,.08); }
.pill.no{      color: var(--rose); border-color: rgba(239,68,68,.28); background: rgba(239,68,68,.08); }
.pill.default{ color: var(--text); border-color: var(--stroke2); background: rgba(255,255,255,.92); }

/* ====== Hero body grid ====== */
.hero-body{ padding: 16px 18px 18px; }
.grid{
  display:grid;
  grid-template-columns: 1.2fr .8fr;
  gap: 14px;
}
@media(max-width: 900px){
  .grid{ grid-template-columns: 1fr; }
}

.cardx{
  border-radius: var(--r18);
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.92);
  box-shadow: var(--shadow2);
  backdrop-filter: blur(8px);
  padding: 14px;
}

.big-box{
  border-radius: var(--r16);
  border: 1px solid rgba(37,99,235,.18);
  background: linear-gradient(180deg, rgba(37,99,235,.08) 0%, rgba(255,255,255,.92) 100%);
  padding: 12px;
  margin-bottom: 12px;
}
.label{ color: var(--muted2); font-weight: 800; font-size: .88rem; }
.big{ color: var(--text); font-weight: 1000; letter-spacing:.3px; font-size: 1.05rem; margin-top: 3px; }

.kv{
  display:grid;
  grid-template-columns: 160px 1fr;
  gap: 10px 14px;
  align-items:start;
}
@media(max-width:520px){ .kv{ grid-template-columns: 1fr; } }

.k{ color: var(--muted); font-weight: 850; font-size: .9rem; }
.v{ color: var(--text); font-weight: 800; font-size: .95rem; line-height: 1.45; overflow-wrap: break-word; }

/* ====== Rejection panel ====== */
.reason{
  margin-top: 14px;
  border-radius: var(--r18);
  border: 1px solid rgba(239,68,68,.25);
  background: linear-gradient(180deg, rgba(239,68,68,.08) 0%, rgba(255,255,255,.92) 100%);
  box-shadow: var(--shadow2);
  padding: 14px;
}
.reason h4{
  margin:0 0 6px;
  color: var(--text);
  font-weight: 980;
  letter-spacing:.2px;
  display:flex; align-items:center; gap:10px;
}
.reason p{
  margin:0;
  color: rgba(15,23,42,.82);
  font-weight: 700;
  white-space: pre-line;
  line-height: 1.55;
}

/* ====== Sections ====== */
.section{
  margin-top: 14px;
  border-radius: var(--r24);
  overflow:hidden;
  border: 1px solid var(--stroke);
  background: rgba(255,255,255,.88);
  box-shadow: var(--shadow);
  backdrop-filter: blur(8px);
}
.section-head{
  padding: 14px 18px;
  border-bottom: 1px solid var(--stroke);
  display:flex; justify-content:space-between; align-items:flex-end;
  gap: 10px;
}
.section-title{
  margin:0;
  color: var(--text);
  font-weight: 980;
  letter-spacing:.2px;
  font-size: 1.02rem;
}
.section-hint{
  margin:4px 0 0;
  color: var(--muted);
  font-weight: 650;
  font-size: .92rem;
}

/* ====== Table ====== */
.table{ margin:0 !important; }
.table thead th{
  background: rgba(37,99,235,.08);
  color: var(--text);
  font-weight: 980;
  border-bottom: 1px solid var(--stroke2)!important;
  border-color: var(--stroke2)!important;
  padding: 12px 14px!important;
  font-size: .92rem;
}
.table tbody td{
  border-color: rgba(15,23,42,.08)!important;
  padding: 14px 14px!important;
  vertical-align: middle;
  color: var(--text);
  font-weight: 750;
}
.table tbody tr:hover td{
  background: rgba(37,99,235,.04);
}

/* ====== Document status chips ====== */
.doc-chip{
  display:inline-flex; align-items:center; gap:10px;
  padding: 8px 12px;
  border-radius: 999px;
  border: 1px solid transparent;
  font-weight: 980;
  font-size: .86rem;
  letter-spacing:.2px;
  position: relative;
  background: rgba(255,255,255,.92);
}
.doc-chip .mini-dot{
  width:10px; height:10px; border-radius:50%;
  background: currentColor;
  box-shadow: 0 0 0 4px rgba(15,23,42,.04);
}

/* approved / rejected / pending */
.doc-approved{
  color: var(--emerald);
  background: rgba(16,185,129,.10);
  border-color: rgba(16,185,129,.30);
  box-shadow: 0 0 0 3px rgba(16,185,129,.08);
}
.doc-rejected{
  color: var(--rose);
  background: rgba(239,68,68,.08);
  border-color: rgba(239,68,68,.24);
  box-shadow: 0 0 0 3px rgba(239,68,68,.06);
}
.doc-pending{
  color: var(--amber);
  background: rgba(245,158,11,.10);
  border-color: rgba(245,158,11,.28);
  box-shadow: 0 0 0 3px rgba(245,158,11,.06);
}
.doc-other{
  color: var(--primary2);
  background: rgba(37,99,235,.08);
  border-color: rgba(37,99,235,.22);
  box-shadow: 0 0 0 3px rgba(37,99,235,.05);
}

/* File button */
.btn-file{
  display:inline-flex; align-items:center; gap:10px;
  padding: 10px 14px;
  border-radius: 14px;
  border: 1px solid rgba(37,99,235,.30);
  background: rgba(37,99,235,.10);
  color: var(--primary2);
  font-weight: 980;
  font-size: .9rem;
  text-decoration:none;
  box-shadow: var(--shadow2);
  transition: transform .10s ease, background .10s ease, box-shadow .10s ease;
}
.btn-file:hover{
  transform: translateY(-1px);
  background: rgba(37,99,235,.14);
  box-shadow: 0 16px 45px rgba(15,23,42,.12);
  color: var(--primary2);
  text-decoration:none;
}

.empty{
  padding: 18px;
  text-align:center;
  color: rgba(15,23,42,.70);
  font-weight: 900;
  background: rgba(15,23,42,.02);
}

/* divider */
.fade-hr{
  height:1px;
  border:0;
  background: linear-gradient(90deg, transparent, rgba(15,23,42,.14), transparent);
  margin: 14px 0;
}
</style>

<?php
  // ===============================
  // 1) STATUS PENDAFTARAN
  // ===============================
  $statusKey = strtolower(trim($pendaftaran['status'] ?? ''));

  $statusMap = [
    'pending'                 => ['class' => 'pending', 'icon' => '⏳', 'label' => 'Pending'],
    'submit'                  => ['class' => 'review',  'icon' => '🔍', 'label' => 'Menunggu Verifikasi'],
    'menunggu terverifikasi'  => ['class' => 'review',  'icon' => '🔍', 'label' => 'Menunggu Verifikasi'],
    'menunggu verifikasi'     => ['class' => 'review',  'icon' => '🔍', 'label' => 'Menunggu Verifikasi'],
    'terverifikasi'           => ['class' => 'ok',      'icon' => '✅', 'label' => 'Terverifikasi'],
    'diterima'                => ['class' => 'ok',      'icon' => '🎉', 'label' => 'Diterima'],
    'ditolak'                 => ['class' => 'no',      'icon' => '❌', 'label' => 'Ditolak'],
  ];

  $picked = $statusMap[$statusKey] ?? [
    'class' => 'default',
    'icon'  => 'ℹ️',
    'label' => ($pendaftaran['status'] ?? 'Status')
  ];

  // ===============================
  // 2) ALASAN DITOLAK (multi key)
  // ===============================
  $reasonKeys = ['alasan_penolakan','alasan','catatan_admin','keterangan','catatan'];
  $alasanDitolak = '';
  foreach ($reasonKeys as $rk) {
    if (!empty($pendaftaran[$rk])) { $alasanDitolak = $pendaftaran[$rk]; break; }
  }

  // ===============================
  // 3) BADGE STATUS DOKUMEN — khusus approved/rejected/pending
  // ===============================
  $docBadge = function($s){
    $x = strtolower(trim($s ?? 'pending'));

    if ($x === 'approved') return ['doc-approved', '✅ Approved'];
    if ($x === 'rejected') return ['doc-rejected', '❌ Rejected'];
    if ($x === 'pending')  return ['doc-pending',  '⏳ Pending'];

    // fallback bila ada value lain
    return ['doc-other', 'ℹ️ '.($s ?: 'Info')];
  };

  // ===============================
  // 4) PERBAIKAN URL (route rapi)
  // ===============================
  $perbaikanUrl = base_url('perbaikan');

  // tombol perbaikan muncul kalau:
  // - status pendaftaran ditolak
  // - atau ada dokumen rejected
  $showPerbaikan = ($statusKey === 'ditolak');
  if (!$showPerbaikan && !empty($dokumen)) {
    foreach ($dokumen as $d) {
      $dx = strtolower(trim($d['status'] ?? 'pending'));
      if ($dx === 'rejected') { $showPerbaikan = true; break; }
    }
  }
?>

<div class="ppdb-shell">
  <div class="ppdb-wrap">

    <!-- TOP -->
    <div class="ppdb-top">
      <div>
        <h3 class="ppdb-title">Validasi Pendaftaran</h3>
        <p class="ppdb-sub">Pantau status pendaftaran, dokumen, dan riwayat proses secara real-time.</p>
      </div>
      <div class="ppdb-actions">
        <span class="chip" title="Akun yang login">
          <!-- user icon -->
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M20 21a8 8 0 1 0-16 0" stroke="white" stroke-opacity=".9" stroke-width="2" stroke-linecap="round"/>
            <path d="M12 13a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z" stroke="white" stroke-opacity=".9" stroke-width="2"/>
          </svg>
          <?= esc(session()->get('email') ?? 'user') ?>
        </span>
        <a class="btnx" href="<?= base_url('validasi') ?>">
          <!-- refresh -->
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M21 12a9 9 0 1 1-3-6.7" stroke="white" stroke-opacity=".9" stroke-width="2" stroke-linecap="round"/>
            <path d="M21 3v6h-6" stroke="white" stroke-opacity=".9" stroke-width="2" stroke-linecap="round"/>
          </svg>
          Refresh
        </a>

        <?php if ($showPerbaikan): ?>
          <a class="btnx primary" href="<?= $perbaikanUrl ?>">
            <!-- pencil -->
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
              <path d="M12 20h9" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linecap="round"/>
              <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5Z" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linejoin="round"/>
            </svg>
            Perbaiki Dokumen
          </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- HERO -->
    <div class="hero">
      <div class="hero-head">
        <div class="hero-left">
          <div class="hero-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
              <path d="M12 2l8 4v6c0 5-3.5 9.5-8 10-4.5-.5-8-5-8-10V6l8-4z" stroke="white" stroke-opacity=".92" stroke-width="2"/>
              <path d="M8.5 12l2.5 2.5L15.8 9.7" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div>
            <h4 class="hero-h">Status Pendaftaran</h4>
            <p class="hero-p">Nomor pendaftaran + ringkasan status dan catatan.</p>
          </div>
        </div>

        <span class="pill <?= esc($picked['class']) ?>">
          <span class="dot"></span>
          <span><?= esc($picked['icon']) ?></span>
          <span><?= esc($picked['label']) ?></span>
        </span>
      </div>

      <div class="hero-body">
        <div class="grid">

          <!-- IDENTITAS -->
          <div class="cardx">
            <div class="big-box">
              <div class="label">Nomor Pendaftaran</div>
              <div class="big"><?= esc($pendaftaran['no_pendaftaran'] ?? '-') ?></div>
            </div>

            <div class="kv">
              <div class="k">Nama Lengkap</div>
              <div class="v"><?= esc($pendaftaran['nama_lengkap'] ?? '-') ?></div>

              <div class="k">NISN</div>
              <div class="v"><?= esc($pendaftaran['nisn'] ?? '-') ?></div>
            </div>
          </div>

          <!-- INFO -->
          <div class="cardx">
            <div class="kv">
              <div class="k">Status</div>
              <div class="v"><?= esc($pendaftaran['status'] ?? '-') ?></div>

              <div class="k">Tanggal Submit</div>
              <div class="v"><?= esc($pendaftaran['created_at'] ?? '-') ?></div>

              <div class="k">Catatan</div>
              <div class="v" style="color:var(--muted); font-weight:700;">
                Simpan nomor pendaftaran untuk pengecekan berikutnya.
              </div>
            </div>

            <?php if ($statusKey === 'ditolak'): ?>
              <hr class="fade-hr">
              <div class="reason">
                <h4>❗ Alasan Ditolak</h4>
                <p><?= esc($alasanDitolak ?: 'Belum ada alasan dari admin.') ?></p>

                <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top: 12px;">
                  <a class="btnx danger" href="<?= $perbaikanUrl ?>">
                    <!-- upload -->
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                      <path d="M12 16V4" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linecap="round"/>
                      <path d="M7 9l5-5 5 5" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M20 20H4" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Perbaiki & Upload Ulang
                  </a>
                  <a class="btnx" href="<?= base_url('contact') ?>">
                    <!-- chat -->
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                      <path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v8Z" stroke="white" stroke-opacity=".92" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                    Hubungi Admin
                  </a>
                </div>
              </div>
            <?php endif; ?>

          </div>

        </div>
      </div>
    </div>

    <!-- DOKUMEN -->
    <div class="section">
      <div class="section-head">
        <div>
          <div class="section-title">Status Dokumen</div>
          <div class="section-hint">
            Badge dokumen sekarang beda jelas: <b style="color:#34D399">approved</b>,
            <b style="color:#FBBF24">pending</b>,
            <b style="color:#FB7185">rejected</b>.
          </div>
        </div>
        <?php if ($showPerbaikan): ?>
          <a class="btnx primary" href="<?= $perbaikanUrl ?>">✍️ Perbaiki Sekarang</a>
        <?php endif; ?>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width:38%;">Jenis</th>
              <th style="width:27%;">Status</th>
              <th style="width:20%;">File</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($dokumen)): ?>
              <?php foreach ($dokumen as $d): ?>
                <?php
                  [$cls, $label] = $docBadge($d['status'] ?? 'pending');
                  $isRejected = (strtolower(trim($d['status'] ?? 'pending')) === 'rejected');
                ?>
                <tr>
                  <td style="font-weight:980; letter-spacing:.2px;">
                    <?= esc($d['jenis'] ?? '-') ?>
                    <?php if ($isRejected): ?>
                      <div style="margin-top:6px; color: var(--muted); font-weight: 700; font-size:.88rem;">
                        Dokumen ini ditolak — silakan upload ulang.
                      </div>
                    <?php endif; ?>
                  </td>
                  <td>
                    <span class="doc-chip <?= esc($cls) ?>">
                      <span class="mini-dot"></span>
                      <span><?= esc($label) ?></span>
                    </span>
                  </td>
                  <td>
                    <?php if (!empty($d['file_path'])): ?>
                      <a class="btn-file" href="<?= base_url('dokumen/view/'.$d['id']) ?>" target="_blank" rel="noopener">
                        👁️ Lihat File
                      </a>

                      <?php if ($isRejected): ?>
                        <div style="margin-top:10px;">
                          <a class="btnx danger" href="<?= $perbaikanUrl ?>" style="padding:10px 12px;">
                            ⬆ Upload Ulang
                          </a>
                        </div>
                      <?php endif; ?>

                    <?php else: ?>
                      <span style="opacity:.85; font-weight:900;">-</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="3" class="empty">Dokumen belum tersedia.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- LOG -->
    <div class="section">
      <div class="section-head">
        <div>
          <div class="section-title">Riwayat Proses</div>
          <div class="section-hint">Catatan aktivitas selama proses pendaftaran.</div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width:32%;">Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($log)): ?>
              <?php foreach ($log as $l): ?>
                <tr>
                  <td style="font-weight:980; opacity:.92;"><?= esc($l['waktu'] ?? '-') ?></td>
                  <td><?= esc($l['aksi'] ?? '-') ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="2" class="empty">Belum ada log.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>
