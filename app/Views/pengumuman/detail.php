<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<style>
  :root{
    --brand:#0b3a7a;
    --accent:#f4c542;
    --text:#111827;
    --muted:#6b7280;
    --border: rgba(17,24,39,.10);
  }

  .wrap-max{ max-width: 980px; }

  .back-link{
    display:inline-flex; gap:.5rem; align-items:center;
    color: var(--brand); text-decoration:none;
    font-weight: 600;
  }
  .back-link:hover{ text-decoration: underline; }

  .detail-shell{
    border-radius: 18px;
    border: 1px solid var(--border);
    background: rgba(255,255,255,.95);
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(0,0,0,.06);
  }

  .detail-head{
    padding: 18px 18px 16px;
    border-bottom: 1px solid var(--border);
    background:
      radial-gradient(900px 300px at 15% 0%, rgba(11,58,122,.14), transparent 55%),
      radial-gradient(700px 260px at 85% 30%, rgba(244,197,66,.16), transparent 55%),
      #fff;
  }

  .kat-badge{
    border-radius:999px;
    padding:.35rem .7rem;
    border:1px solid rgba(11,58,122,.18);
    background: rgba(11,58,122,.10);
    color: var(--brand);
    font-weight: 800;
    font-size: .8rem;
  }

  .meta{
    color: var(--muted);
    font-size: .9rem;
  }

  .title{
    color: var(--text);
    font-weight: 900;
    letter-spacing: .2px;
    line-height: 1.2;
    margin: .6rem 0 .35rem;
  }

  .ringkasan{
    color: var(--muted);
    margin: 0;
  }

  .actions{
    display:flex;
    gap:.5rem;
    flex-wrap: wrap;
    justify-content:flex-end;
  }

  .btn-soft{
    border-radius: 12px;
    border: 1px solid rgba(11,58,122,.18);
    background: rgba(11,58,122,.08);
    color: var(--brand);
    font-weight: 700;
  }
  .btn-soft:hover{
    background: rgba(11,58,122,.12);
    color: var(--brand);
  }

  .detail-body{
    padding: 20px 18px;
  }

  /* Typography konten pengumuman (biar rapi & premium) */
  .content{
    color: #1f2937;
    line-height: 1.8;
    font-size: 1rem;
  }
  .content h2, .content h3{
    margin-top: 1.2rem;
    margin-bottom: .6rem;
    line-height: 1.25;
    font-weight: 900;
    color: #111827;
  }
  .content p{ margin-bottom: 1rem; }
  .content ul, .content ol{ padding-left: 1.2rem; margin-bottom: 1rem; }
  .content li{ margin: .35rem 0; }
  .content blockquote{
    border-left: 4px solid rgba(244,197,66,.8);
    background: rgba(244,197,66,.12);
    padding: 12px 14px;
    border-radius: 12px;
    margin: 1rem 0;
  }

  /* Panel bantuan */
  .help-panel{
    margin-top: 16px;
    border: 1px solid var(--border);
    border-radius: 16px;
    background: rgba(255,255,255,.9);
    padding: 14px 14px;
    display:flex;
    gap: 12px;
    align-items:flex-start;
  }
  .help-ic{
    width: 44px; height: 44px;
    border-radius: 14px;
    display:grid; place-items:center;
    background: rgba(244,197,66,.18);
    border: 1px solid rgba(244,197,66,.30);
  }
  .help-title{ font-weight: 900; margin:0; }
  .help-text{ color: var(--muted); margin:0; }
  .help-btn{
    margin-left:auto;
    border-radius: 12px;
    background: var(--brand);
    border: 1px solid var(--brand);
    color:#fff;
    font-weight: 800;
    padding: .55rem .85rem;
    text-decoration:none;
    white-space: nowrap;
  }
  .help-btn:hover{ filter: brightness(.95); color:#fff; }

  @media (max-width: 576px){
    .actions{ justify-content:flex-start; }
    .help-panel{ flex-direction: column; }
    .help-btn{ margin-left: 0; width: fit-content; }
  }
</style>

<div class="container py-5 wrap-max">

  <a href="<?= base_url('pengumuman') ?>" class="back-link">
    ← Kembali ke daftar pengumuman
  </a>

  <div class="detail-shell mt-3">

    <div class="detail-head">
      <div class="d-flex flex-column flex-md-row gap-2 justify-content-between align-items-md-start">
        <div>
          <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="kat-badge"><?= esc($p['kategori'] ?? 'Umum') ?></span>

            <?php if (($p['is_active'] ?? 0) == 1): ?>
              <span class="badge rounded-pill text-bg-warning">Aktif</span>
            <?php endif; ?>

            <span class="meta">
              <?= !empty($p['created_at']) ? date('d M Y', strtotime($p['created_at'])) : '-' ?>
            </span>
          </div>

          <h3 class="title"><?= esc($p['judul'] ?? '-') ?></h3>

          <?php if (!empty($p['ringkasan'])): ?>
            <p class="ringkasan"><?= esc($p['ringkasan']) ?></p>
          <?php endif; ?>
        </div>

        <div class="actions">
          <button class="btn btn-soft btn-sm" onclick="window.print()">
            🖨️ Print
          </button>
          <button class="btn btn-soft btn-sm" onclick="copyLink()">
            🔗 Salin Link
          </button>
        </div>
      </div>
    </div>

    <div class="detail-body">
      <div class="content">
        <?= !empty($p['isi']) ? $p['isi'] : '<p class="text-secondary">Konten pengumuman belum tersedia.</p>' ?>
      </div>

      <div class="help-panel">
        <div class="help-ic">💬</div>
        <div>
          <p class="help-title mb-1">Butuh bantuan?</p>
          <p class="help-text">Jika ada kendala pendaftaran/validasi, silakan hubungi panitia melalui menu Kontak.</p>
        </div>
        <a class="help-btn" href="<?= base_url('contact') ?>">Buka Kontak</a>
      </div>
    </div>

  </div>
</div>

<script>
  function copyLink(){
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
      alert("Link berhasil disalin!");
    }).catch(() => {
      alert("Gagal menyalin link. Silakan salin manual dari address bar.");
    });
  }
</script>

<?= $this->endSection() ?>
