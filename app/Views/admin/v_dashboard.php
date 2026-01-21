<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
  :root{
    --brand:#0b3a7a;
    --brand2:#062b58;
    --gold:#f4c542;
    --text:#0f172a;
    --muted:#64748b;
    --border: rgba(15,23,42,.10);
    --card: rgba(255,255,255,.96);
  }

  .dash-wrap{ max-width: 1250px; margin: 0 auto; }

  .dash-hero{
    border-radius: 18px;
    border: 1px solid var(--border);
    background:
      radial-gradient(980px 360px at 10% 0%, rgba(11,58,122,.18), transparent 58%),
      radial-gradient(760px 320px at 90% 30%, rgba(244,197,66,.16), transparent 55%),
      linear-gradient(180deg, rgba(255,255,255,.96), rgba(255,255,255,.90));
    padding: 18px;
    position: relative;
    overflow: hidden;
  }

  .hero-title{ font-weight: 950; color: var(--text); margin:0; }
  .hero-sub{ color: var(--muted); margin: 4px 0 0; }
  .hero-chip{
    display:inline-flex; align-items:center; gap:.45rem;
    border-radius:999px; padding:.3rem .7rem;
    border:1px solid rgba(0,0,0,.08);
    background: rgba(255,255,255,.78);
    font-size:.82rem;
    color: var(--text);
    margin-right: 6px;
  }

  .stat{
    border-radius: 16px;
    border: 1px solid var(--border);
    background: var(--card);
    box-shadow: 0 14px 45px rgba(0,0,0,.06);
    padding: 14px 14px;
    display:flex;
    gap: 12px;
    align-items:center;
    height: 100%;
  }
  .stat-ico{
    width: 46px; height: 46px;
    border-radius: 16px;
    display:grid; place-items:center;
    background: rgba(244,197,66,.18);
    border: 1px solid rgba(244,197,66,.30);
    color:#6b4c00;
    font-size: 18px;
    flex: 0 0 auto;
  }
  .stat b{ font-size: 20px; color: var(--text); }
  .stat .lbl{ color: var(--muted); font-weight: 800; font-size: 13px; }
  .stat .hint{ color: var(--muted); font-size: 12px; margin-top: 2px; }

  .cardx{
    border-radius: 18px;
    border: 1px solid var(--border);
    background: var(--card);
    box-shadow: 0 14px 45px rgba(0,0,0,.06);
    overflow: hidden;
  }
  .cardx-head{
    padding: 14px 16px;
    background: linear-gradient(90deg, rgba(11,58,122,.08), rgba(244,197,66,.10));
    border-bottom: 1px solid var(--border);
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
  .ico{
    width: 36px; height: 36px; border-radius: 14px;
    display:grid; place-items:center;
    background: rgba(244,197,66,.18);
    border: 1px solid rgba(244,197,66,.30);
    font-size: 16px;
  }
  .cardx-body{ padding: 14px 16px; }

  .list-item{
    padding: 12px 0;
    border-bottom: 1px dashed rgba(0,0,0,.12);
  }
  .list-item:last-child{ border-bottom: none; }
  .list-title{ font-weight: 900; color: var(--text); }
  .list-meta{ color: var(--muted); font-size: 12px; margin-top: 2px; }

  .alert-gov{
    border-radius: 16px;
    border: 1px solid rgba(244,197,66,.35);
    background: rgba(244,197,66,.12);
    color: #5a4500;
    font-weight: 850;
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
          <a href="<?= base_url('pendidikan') ?>" class="btn btn-outline-primary btn-block mb-2">
            <i class="fas fa-graduation-cap"></i> Kelola Pendidikan
          </a>
          <a href="<?= base_url('agama') ?>" class="btn btn-outline-primary btn-block mb-2">
            <i class="fas fa-praying-hands"></i> Kelola Agama
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
