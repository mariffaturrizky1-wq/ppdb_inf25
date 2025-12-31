<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<style>
  :root{
    --brand:#0b3a7a;
    --accent:#f4c542;
    --bg:#f7f9fc;
    --text:#111827;
    --muted:#6b7280;
    --border: rgba(17,24,39,.10);
  }

  body { background: var(--bg); }

  .wrap-max{ max-width: 1120px; }

  /* HERO */
  .hero{
    border-radius: 20px;
    padding: 26px 20px;
    border: 1px solid var(--border);
    background:
      radial-gradient(900px 360px at 12% 0%, rgba(11,58,122,.18), transparent 55%),
      radial-gradient(700px 300px at 88% 25%, rgba(244,197,66,.18), transparent 55%),
      linear-gradient(180deg, rgba(255,255,255,.92), rgba(255,255,255,.86));
    backdrop-filter: blur(8px);
  }

  .chip{
    border-radius:999px;
    padding:.35rem .65rem;
    font-size:.8rem;
    border:1px solid rgba(0,0,0,.08);
    background: rgba(255,255,255,.8);
    color: var(--text);
  }
  .hero h3{ color: var(--text); letter-spacing:.2px; }
  .hero p{ color: var(--muted); }

  /* TOOLBAR */
  .toolbar{
    border:1px solid var(--border);
    border-radius: 16px;
    padding: 14px;
    background: rgba(255,255,255,.85);
    backdrop-filter: blur(8px);
  }
  .toolbar .form-control, .toolbar .form-select{
    border-radius: 12px;
    border-color: rgba(0,0,0,.12);
  }
  .btn-brand{
    border-radius: 12px;
    background: var(--brand);
    border-color: var(--brand);
  }
  .btn-brand:hover{ filter: brightness(.95); }

  .pill{
    border-radius:999px;
    padding:.35rem .75rem;
    border:1px solid rgba(0,0,0,.10);
    background: rgba(255,255,255,.78);
    color: var(--text);
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:.35rem;
    font-size:.9rem;
  }
  .pill.active{
    background: rgba(11,58,122,.10);
    border-color: rgba(11,58,122,.25);
    color: var(--brand);
    font-weight: 700;
  }

  /* CARD */
  .cardx{
    height: 100%;
    border-radius: 18px;
    border:1px solid var(--border);
    background: rgba(255,255,255,.90);
    backdrop-filter: blur(10px);
    transition: transform .15s ease, box-shadow .15s ease;
    position: relative;
    overflow: hidden;
  }
  .cardx:hover{
    transform: translateY(-2px);
    box-shadow: 0 18px 50px rgba(0,0,0,.10);
  }
  .cardx .body{ padding: 18px; display:flex; flex-direction:column; height: 100%; }

  .badge-kat{
    position:absolute;
    top:14px; right:14px;
    border-radius:999px;
    padding:.35rem .6rem;
    border:1px solid rgba(11,58,122,.18);
    background: rgba(11,58,122,.10);
    color: var(--brand);
    font-weight: 700;
    font-size: .78rem;
  }

  .active-line{
    position:absolute; top:0; left:0; right:0; height:4px;
    background: linear-gradient(90deg, var(--brand), var(--accent));
    opacity: 0;
  }
  .cardx.active .active-line{ opacity:1; }

  .icon{
    width: 44px; height: 44px; border-radius: 14px;
    display:grid; place-items:center;
    background: rgba(244,197,66,.18);
    border:1px solid rgba(244,197,66,.28);
    color: #7a5a00;
    flex: 0 0 auto;
  }

  .title{
    font-weight: 800;
    color: var(--text);
    font-size: 1.05rem;
    line-height: 1.25;
    margin-bottom:.15rem;
  }
  .meta{ color: var(--muted); font-size: .85rem; }

  .excerpt{
    margin-top:.75rem;
    color:#4b5563;
    font-size:.95rem;
    display:-webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow:hidden;
    min-height: 4.2em;
  }

  .btn-soft{
    border-radius: 12px;
    border: 1px solid rgba(11,58,122,.18);
    background: rgba(11,58,122,.08);
    color: var(--brand);
  }
  .btn-soft:hover{
    background: rgba(11,58,122,.12);
    color: var(--brand);
  }
</style>

<div class="container py-5 wrap-max">

  <!-- HERO -->
  <div class="hero text-center mb-4">
    <div class="d-flex justify-content-center flex-wrap gap-2 mb-2">
      <span class="chip">📢 Pengumuman Resmi</span>
      <span class="chip">PPDB 2025/2026</span>
      <span class="chip">Dinas Pendidikan</span>
    </div>
    <h3 class="fw-bold mb-1">Pengumuman PPDB</h3>
    <p class="mb-0">Informasi resmi seputar PPDB Tahun Ajaran 2025/2026</p>
  </div>

  <!-- TOOLBAR -->
  <div class="toolbar mb-4">
    <form class="row g-2 align-items-center" method="get" action="<?= site_url('pengumuman') ?>">
      <div class="col-12 col-lg-6">
        <input class="form-control" type="search" name="q" value="<?= esc($q ?? '') ?>" placeholder="Cari judul / ringkasan / isi pengumuman...">
      </div>

      <div class="col-6 col-lg-3">
        <select class="form-select" name="sort">
          <option value="terbaru" <?= ($sort ?? 'terbaru')==='terbaru'?'selected':'' ?>>Terbaru</option>
          <option value="terlama" <?= ($sort ?? '')==='terlama'?'selected':'' ?>>Terlama</option>
          <option value="aktif"   <?= ($sort ?? '')==='aktif'?'selected':'' ?>>Aktif dulu</option>
        </select>
      </div>

      <div class="col-6 col-lg-3 d-grid">
        <button class="btn btn-brand text-white" type="submit">Terapkan</button>
      </div>

      <input type="hidden" name="kategori" value="<?= esc($kategori ?? 'Semua') ?>">
    </form>

    <!-- Filter pills -->
    <?php $active = $kategori ?? 'Semua'; ?>
    <div class="d-flex flex-wrap gap-2 mt-3">
      <?php foreach (['Semua','PPDB','Umum','Seleksi'] as $k): ?>
        <a class="pill <?= $active === $k ? 'active' : '' ?>"
           href="<?= site_url('pengumuman?kategori=' . urlencode($k) . '&q=' . urlencode($q ?? '') . '&sort=' . urlencode($sort ?? 'terbaru')) ?>">
          <?= $active === $k ? '✅' : '•' ?> <?= esc($k) ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- LIST -->
  <?php if (!empty($pengumuman)): ?>
    <div class="row g-4">
      <?php foreach ($pengumuman as $p): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="cardx <?= ($p['is_active'] ?? 0) == 1 ? 'active' : '' ?>">
            <div class="active-line"></div>

            <div class="badge-kat"><?= esc($p['kategori'] ?? 'Umum') ?></div>

            <div class="body">
              <div class="d-flex align-items-start gap-3">
                <div class="icon"><i class="fas fa-bullhorn"></i></div>
                <div class="flex-grow-1">
                  <div class="title"><?= esc($p['judul']) ?></div>
                  <div class="meta">
                    <?= !empty($p['created_at']) ? date('d M Y', strtotime($p['created_at'])) : '-' ?>
                    <?php if (($p['is_active'] ?? 0) == 1): ?>
                      <span class="ms-2 badge rounded-pill text-bg-warning">Aktif</span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="excerpt">
                <?= esc($p['ringkasan'] ?? '') ?>
              </div>

              <div class="mt-auto pt-3">
                <a href="<?= base_url('pengumuman/'.$p['slug']) ?>" class="btn btn-soft btn-sm w-100">
                  Baca Selengkapnya →
                </a>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <?php if (isset($pager)): ?>
      <div class="mt-4 d-flex justify-content-center">
        <?= $pager->links() ?>
      </div>
    <?php endif; ?>

  <?php else: ?>
    <div class="alert alert-info text-center">
      Belum ada pengumuman tersedia
    </div>
  <?php endif; ?>

</div>

<?= $this->endSection() ?>
