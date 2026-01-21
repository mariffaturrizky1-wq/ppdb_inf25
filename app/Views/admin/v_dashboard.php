<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
  :root{
    /* Dark neon palette */
    --bg: #070A12;
    --panel: rgba(12, 18, 35, .78);
    --panel2: rgba(12, 18, 35, .92);
    --text: #EAF0FF;
    --muted: rgba(234, 240, 255, .70);
    --border: rgba(138, 180, 255, .16);

    --cyan: #22D3EE;
    --violet: #A78BFA;
    --lime: #A3FF12;
    --pink: #FF4DDF;

    --glow: 0 0 0.65rem rgba(34,211,238,.25), 0 0 1.2rem rgba(167,139,250,.18);
    --glow2: 0 0 0.85rem rgba(255,77,223,.18), 0 0 1.4rem rgba(34,211,238,.14);
  }

  /* Page background (biar admin layout ikut dark) */
  body{
    background:
      radial-gradient(1000px 500px at 10% -10%, rgba(34,211,238,.18), transparent 55%),
      radial-gradient(900px 420px at 90% 10%, rgba(167,139,250,.18), transparent 55%),
      radial-gradient(900px 500px at 50% 120%, rgba(255,77,223,.10), transparent 55%),
      linear-gradient(180deg, #050713, #070A12);
    color: var(--text);
  }

  .dash-wrap{ max-width: 1250px; margin: 0 auto; }

  /* HERO */
  .dash-hero{
    border-radius: 18px;
    border: 1px solid var(--border);
    background:
      radial-gradient(900px 360px at 12% 0%, rgba(34,211,238,.18), transparent 60%),
      radial-gradient(760px 320px at 88% 30%, rgba(167,139,250,.16), transparent 58%),
      radial-gradient(720px 260px at 50% 120%, rgba(255,77,223,.12), transparent 60%),
      linear-gradient(180deg, rgba(12,18,35,.90), rgba(12,18,35,.70));
    padding: 18px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 22px 70px rgba(0,0,0,.55);
  }

  .hero-title{
    font-weight: 950;
    margin:0;
    letter-spacing:.2px;
    text-shadow: 0 0 18px rgba(34,211,238,.14);
  }
  .hero-sub{ color: var(--muted); margin: 6px 0 0; }

  .hero-chip{
    display:inline-flex; align-items:center; gap:.45rem;
    border-radius:999px; padding:.35rem .75rem;
    border:1px solid rgba(34,211,238,.22);
    background: linear-gradient(90deg, rgba(34,211,238,.12), rgba(167,139,250,.10));
    color: rgba(234,240,255,.92);
    font-size:.82rem;
    margin-right: 6px;
    box-shadow: var(--glow);
    backdrop-filter: blur(10px);
  }

  /* Alert neon */
  .alert-gov{
    border-radius: 16px;
    border: 1px solid rgba(34,211,238,.25);
    background: linear-gradient(90deg, rgba(34,211,238,.12), rgba(167,139,250,.10));
    color: rgba(234,240,255,.90);
    font-weight: 850;
    box-shadow: var(--glow2);
  }

  /* Cards */
  .cardx, .stat{
    border-radius: 18px;
    border: 1px solid var(--border);
    background: linear-gradient(180deg, var(--panel2), var(--panel));
    box-shadow: 0 20px 65px rgba(0,0,0,.55);
    overflow: hidden;
    backdrop-filter: blur(12px);
  }

  /* lift hover */
  .cardx:hover, .stat:hover{
    transform: translateY(-2px);
    transition: .18s ease;
    box-shadow: 0 26px 85px rgba(0,0,0,.60), var(--glow);
    border-color: rgba(34,211,238,.28);
  }

  .cardx-head{
    padding: 14px 16px;
    background:
      linear-gradient(90deg, rgba(34,211,238,.12), rgba(167,139,250,.10));
    border-bottom: 1px solid rgba(138,180,255,.14);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 10px;
  }

  .cardx-title{
    margin:0;
    font-weight: 950;
    color: var(--text);
    display:flex;
    align-items:center;
    gap:.6rem;
  }

  .cardx-body{ padding: 14px 16px; }

  /* Icon badge */
  .ico, .stat-ico{
    width: 40px; height: 40px;
    border-radius: 14px;
    display:grid; place-items:center;
    background: linear-gradient(135deg, rgba(34,211,238,.18), rgba(167,139,250,.14));
    border: 1px solid rgba(34,211,238,.22);
    color: rgba(234,240,255,.95);
    box-shadow: var(--glow);
  }
  .stat-ico{ width: 46px; height: 46px; font-size: 18px; }

  /* Stats content */
  .stat{
    padding: 14px;
    display:flex;
    gap: 12px;
    align-items:center;
    height: 100%;
    transition: .18s ease;
  }
  .stat b{
    font-size: 22px;
    color: var(--text);
    text-shadow: 0 0 16px rgba(34,211,238,.10);
  }
  .stat .lbl{
    color: rgba(234,240,255,.78);
    font-weight: 850;
    font-size: 13px;
  }
  .stat .hint{ color: var(--muted); font-size: 12px; margin-top: 2px; }

  /* List */
  .list-item{
    padding: 12px 0;
    border-bottom: 1px dashed rgba(138,180,255,.16);
  }
  .list-item:last-child{ border-bottom: none; }

  .list-title{
    font-weight: 900;
    color: var(--text);
  }
  .list-meta{
    color: var(--muted);
    font-size: 12px;
    margin-top: 3px;
  }

  /* Buttons (neon) */
  .btn{
    border-radius: 14px !important;
    font-weight: 850;
    letter-spacing:.2px;
  }

  .btn-primary{
    border: 1px solid rgba(34,211,238,.30) !important;
    background: linear-gradient(90deg, rgba(34,211,238,.95), rgba(167,139,250,.95)) !important;
    color: #081022 !important;
    box-shadow: var(--glow);
  }
  .btn-primary:hover{
    filter: brightness(1.05);
    box-shadow: 0 0 0.9rem rgba(34,211,238,.35), 0 0 1.6rem rgba(167,139,250,.22);
    transform: translateY(-1px);
    transition: .18s ease;
  }

  .btn-outline-primary{
    border: 1px solid rgba(34,211,238,.35) !important;
    color: rgba(234,240,255,.92) !important;
    background: rgba(12,18,35,.55) !important;
  }
  .btn-outline-primary:hover{
    background: rgba(34,211,238,.14) !important;
    box-shadow: var(--glow);
    transform: translateY(-1px);
    transition: .18s ease;
  }

  .btn-outline-dark{
    border: 1px solid rgba(234,240,255,.20) !important;
    color: rgba(234,240,255,.90) !important;
    background: rgba(12,18,35,.55) !important;
  }
  .btn-outline-dark:hover{
    border-color: rgba(255,77,223,.28) !important;
    box-shadow: var(--glow2);
    transform: translateY(-1px);
    transition: .18s ease;
  }

  /* Badges */
  .badge-warning{
    background: linear-gradient(90deg, rgba(163,255,18,.95), rgba(34,211,238,.85)) !important;
    color: #07110a !important;
    border: 1px solid rgba(163,255,18,.30);
    box-shadow: 0 0 .9rem rgba(163,255,18,.18);
    border-radius: 999px;
    padding: .35rem .55rem;
    font-weight: 900;
  }

  /* HR */
  hr{ border-color: rgba(138,180,255,.16); }

  /* Text tweaks */
  .text-muted{ color: var(--muted) !important; }

  /* FORCE DARK BACKGROUND (override template & bootstrap) */
html, body{
  background-color: #070A12 !important;
  color: var(--text);
}

/* wrapper utama admin template */
.content-wrapper,
.container-fluid,
.main-content,
.wrapper{
  background: transparent !important;
}

/* bootstrap default card putih */
.card{
  background: linear-gradient(180deg, rgba(12,18,35,.92), rgba(12,18,35,.75)) !important;
  border: 1px solid var(--border);
  box-shadow: 0 20px 65px rgba(0,0,0,.55);
  color: var(--text);
}

/* table / section putih */
.table,
.table th,
.table td{
  background-color: transparent !important;
  color: var(--text);
}

/* dropdown & modal */
.dropdown-menu,
.modal-content{
  background: linear-gradient(180deg, rgba(12,18,35,.96), rgba(12,18,35,.85)) !important;
  color: var(--text);
  border: 1px solid var(--border);
  box-shadow: 0 25px 80px rgba(0,0,0,.6);
}

/* form control */
.form-control,
.custom-select{
  background: rgba(12,18,35,.75) !important;
  border: 1px solid rgba(138,180,255,.25);
  color: var(--text);
}
.form-control::placeholder{
  color: rgba(234,240,255,.45);
}

/* navbar / header kalau masih putih */
.navbar,
.header,
.topbar{
  background: linear-gradient(90deg, rgba(12,18,35,.95), rgba(8,12,26,.95)) !important;
  border-bottom: 1px solid var(--border);
}

html, body { height: 100%; }

/* area bawah (footer) */
.main-footer{
  background: rgba(7,11,20,.85) !important;
  color: rgba(229,231,235,.85) !important;
  border-top: 1px solid rgba(255,255,255,.10) !important;
}

/* kalau ada link di footer */
.main-footer a{
  color: rgba(56,189,248,.95) !important;
  text-decoration: none;
}
.main-footer a:hover{ text-decoration: underline; }

/* kadang putihnya berasal dari wrapper/content */
.content-wrapper,
.wrapper,
.content{
  background: transparent !important;
}

</style>


<div class="dash-wrap">

  <!-- HERO -->
  <div class="dash-hero mb-3">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-2">
      <div>
        <div class="mb-1">
          <span class="hero-chip">🏛️ Sistem PPDB Online</span>
          <span class="hero-chip">Tahun Ajaran 2025/2026</span>
          <span class="hero-chip">Panel Admin</span>
        </div>
        <h3 class="hero-title">Beranda</h3>
        <p class="hero-sub">Ringkasan data & aktivitas terbaru untuk membantu pengelolaan PPDB.</p>
      </div>

      <div class="text-muted small text-lg-right">
        Login sebagai: <b><?= esc(session()->get('nama_user')) ?></b><br>
        <?= esc(session()->get('email')) ?>
      </div>
    </div>
  </div>

  <div class="alert alert-gov mb-3">
    ⚠️ Info: Pastikan pengumuman resmi selalu diaktifkan sesuai jadwal dan lakukan verifikasi data sekolah secara berkala.
  </div>

  <!-- STATS -->
  <div class="row">
    <div class="col-12 col-md-6 col-lg-3 mb-3">
      <div class="stat">
        <div class="stat-ico"><i class="fas fa-school"></i></div>
        <div>
          <div class="lbl">Total Sekolah</div>
          <b><?= (int)$totalSekolah ?></b>
          <div class="hint">Data sekolah terdaftar</div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 mb-3">
      <div class="stat">
        <div class="stat-ico"><i class="fas fa-users"></i></div>
        <div>
          <div class="lbl">Total Kuota</div>
          <b><?= number_format((int)$totalKuota) ?></b>
          <div class="hint">Akumulasi kuota sekolah</div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 mb-3">
      <div class="stat">
        <div class="stat-ico"><i class="fas fa-bullhorn"></i></div>
        <div>
          <div class="lbl">Total Pengumuman</div>
          <b><?= (int)$totalPengumuman ?></b>
          <div class="hint">Semua pengumuman dibuat</div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-3 mb-3">
      <div class="stat">
        <div class="stat-ico"><i class="fas fa-check-circle"></i></div>
        <div>
          <div class="lbl">Pengumuman Aktif</div>
          <b><?= (int)$aktifPengumuman ?></b>
          <div class="hint">Ditampilkan ke publik</div>
        </div>
      </div>
    </div>
  </div>

  <!-- PANELS -->
  <div class="row">
    <div class="col-12 col-lg-8 mb-3">
      <div class="cardx">
        <div class="cardx-head">
          <h6 class="cardx-title"><span class="ico">📰</span> Pengumuman Terbaru</h6>
          <a class="btn btn-sm btn-primary" href="<?= base_url('pengumuman') ?>">
            Lihat Semua
          </a>
        </div>
        <div class="cardx-body">
          <?php if (!empty($pengumumanTerbaru)): ?>
            <?php foreach ($pengumumanTerbaru as $p): ?>
              <div class="list-item">
                <div class="d-flex justify-content-between align-items-start gap-2">
                  <div>
                    <div class="list-title"><?= esc($p['judul']) ?></div>
                    <div class="list-meta">
                      <?= !empty($p['created_at']) ? date('d M Y', strtotime($p['created_at'])) : '-' ?>
                      • Kategori: <b><?= esc($p['kategori'] ?? 'Umum') ?></b>
                      <?php if (($p['is_active'] ?? 0) == 1): ?>
                        • <span class="badge badge-warning">Aktif</span>
                      <?php endif; ?>
                    </div>
                  </div>
                  <a class="btn btn-sm btn-outline-primary"
                     href="<?= base_url('pengumuman/'.$p['slug']) ?>">
                    Detail
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="text-muted">Belum ada pengumuman.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-4 mb-3">
      <div class="cardx">
        <div class="cardx-head">
          <h6 class="cardx-title"><span class="ico">⚙️</span> Quick Actions</h6>
        </div>
        <div class="cardx-body">
          <a href="<?= base_url('sekolah') ?>" class="btn btn-primary btn-block mb-2">
            <i class="fas fa-school"></i> Kelola Sekolah
          </a>
          <a href="<?= base_url('profile') ?>" class="btn btn-outline-dark btn-block">
            <i class="fas fa-user"></i> Profil Saya
          </a>

          <hr>
          <div class="text-muted small">
            ✅ Dashboard ini dibuat untuk ringkasan cepat: memudahkan admin memantau data PPDB tanpa membuka menu satu per satu.
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
