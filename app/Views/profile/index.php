<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<style>
  :root{
    --brand:#0b3a7a;
    --brand2:#0a2f61;
    --accent:#f4c542;
    --text:#111827;
    --muted:#6b7280;
    --border: rgba(17,24,39,.10);
    --card: rgba(255,255,255,.92);
    --bg:#f6f8fc;
  }

  body{ background: var(--bg); }

  .wrap-max{ max-width: 1100px; }

  /* HERO */
  .profile-hero{
    border-radius: 22px;
    border: 1px solid var(--border);
    background:
      radial-gradient(950px 380px at 15% 0%, rgba(11,58,122,.18), transparent 55%),
      radial-gradient(700px 300px at 85% 30%, rgba(244,197,66,.18), transparent 55%),
      linear-gradient(180deg, rgba(255,255,255,.94), rgba(255,255,255,.85));
    backdrop-filter: blur(10px);
    padding: 22px 18px;
  }
  .chip{
    display:inline-flex;
    align-items:center;
    gap:.45rem;
    padding:.35rem .7rem;
    border-radius: 999px;
    font-size: .82rem;
    border: 1px solid rgba(0,0,0,.08);
    background: rgba(255,255,255,.75);
    color: var(--text);
  }
  .hero-title{
    font-weight: 900;
    letter-spacing: .2px;
    color: var(--text);
    margin: .5rem 0 .2rem;
  }
  .hero-sub{ color: var(--muted); margin: 0; }

  /* CARDS */
  .cardx{
    border-radius: 18px;
    border: 1px solid var(--border);
    background: var(--card);
    box-shadow: 0 14px 45px rgba(0,0,0,.06);
    overflow: hidden;
  }
  .cardx-head{
    padding: 14px 16px;
    background: linear-gradient(90deg, rgba(11,58,122,.08), rgba(244,197,66,.12));
    border-bottom: 1px solid var(--border);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 10px;
  }
  .cardx-title{
    margin:0;
    font-weight: 900;
    color: var(--text);
    display:flex;
    align-items:center;
    gap:.6rem;
  }
  .cardx-title .ico{
    width: 36px; height: 36px; border-radius: 14px;
    display:grid; place-items:center;
    background: rgba(244,197,66,.18);
    border: 1px solid rgba(244,197,66,.30);
  }
  .cardx-body{ padding: 18px 16px; }

  /* FORM */
  .form-label{ font-weight: 800; color: #1f2937; }
  .form-control, .form-select{
    border-radius: 12px;
    border-color: rgba(0,0,0,.12);
    padding: .62rem .8rem;
  }
  .form-control:focus, .form-select:focus{
    border-color: rgba(11,58,122,.35);
    box-shadow: 0 0 0 .2rem rgba(11,58,122,.12);
  }

  /* BUTTONS */
  .btn-brand{
    border-radius: 12px;
    background: linear-gradient(180deg, var(--brand), var(--brand2));
    border: none;
    font-weight: 900;
    padding: .7rem 1rem;
  }
  .btn-brand:hover{ filter: brightness(.96); }

  .btn-soft{
    border-radius: 12px;
    border: 1px solid rgba(11,58,122,.20);
    background: rgba(11,58,122,.08);
    color: var(--brand);
    font-weight: 900;
    padding: .7rem 1rem;
  }
  .btn-soft:hover{ background: rgba(11,58,122,.12); color: var(--brand); }

  /* SUMMARY */
  .summary{
    padding: 16px;
  }
  .avatar{
    width: 52px; height: 52px; border-radius: 18px;
    background: rgba(11,58,122,.10);
    border: 1px solid rgba(11,58,122,.18);
    display:grid; place-items:center;
    font-weight: 900;
    color: var(--brand);
  }
  .kv{
    display:flex;
    justify-content:space-between;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px dashed rgba(0,0,0,.10);
    color: #374151;
  }
  .kv:last-child{ border-bottom: none; }
  .kv span{ color: var(--muted); }

  /* SMALL NOTE */
  .note{
    border-radius: 16px;
    border: 1px solid rgba(244,197,66,.35);
    background: rgba(244,197,66,.14);
    padding: 12px 12px;
    color: #5a4500;
  }

  @media (max-width: 992px){
    .wrap-max{ max-width: 900px; }
  }
</style>

<div class="container py-5 wrap-max">

  <!-- HERO -->
  <div class="profile-hero mb-4">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
      <div>
        <div class="d-flex flex-wrap gap-2">
          <span class="chip">👤 Profile Siswa</span>
          <span class="chip">PPDB 2025/2026</span>
          <span class="chip">Lengkapi Data</span>
        </div>
        <h3 class="hero-title">Profile Siswa</h3>
        <p class="hero-sub">Lengkapi data diri untuk kebutuhan PPDB. Data tersimpan aman sesuai akun login.</p>
      </div>

      <div class="text-muted small">
        Akun: <strong><?= esc(session()->get('nama_user')) ?></strong>
        (<?= esc(session()->get('email')) ?>)
      </div>
    </div>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
      <strong>Periksa kembali:</strong>
      <ul class="mb-0">
        <?php foreach (session()->getFlashdata('errors') as $err): ?>
          <li><?= esc($err) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <div class="row g-4">
    <!-- FORM CARD -->
    <div class="col-12 col-lg-8">
      <div class="cardx">
        <div class="cardx-head">
          <h6 class="cardx-title">
            <span class="ico">📝</span>
            Form Biodata
          </h6>
          <span class="badge rounded-pill text-bg-warning">Wajib diisi: Nama Lengkap</span>
        </div>

        <div class="cardx-body">
          <form action="<?= base_url('profile/update') ?>" method="post">
            <?= csrf_field() ?>

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nama Lengkap *</label>
                <input type="text" name="nama_lengkap" class="form-control"
                       value="<?= old('nama_lengkap', $profile['nama_lengkap'] ?? '') ?>" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control"
                       value="<?= old('asal_sekolah', $profile['asal_sekolah'] ?? '') ?>" placeholder="Contoh: SMPN 1 Brebes">
              </div>

              <div class="col-md-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control"
                       value="<?= old('tempat_lahir', $profile['tempat_lahir'] ?? '') ?>">
              </div>

              <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                       value="<?= old('tanggal_lahir', $profile['tanggal_lahir'] ?? '') ?>">
              </div>

              <div class="col-md-6">
                <label class="form-label">Jenis Kelamin</label>
                <?php $jk = old('jenis_kelamin', $profile['jenis_kelamin'] ?? ''); ?>
                <select name="jenis_kelamin" class="form-select">
                  <option value="">- pilih -</option>
                  <option value="L" <?= $jk==='L'?'selected':'' ?>>Laki-laki</option>
                  <option value="P" <?= $jk==='P'?'selected':'' ?>>Perempuan</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Agama</label>
                <?php $ag = old('agama', $profile['agama'] ?? ''); ?>
                <select name="agama" class="form-select">
                  <option value="">- pilih -</option>
                  <?php foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $a): ?>
                    <option value="<?= $a ?>" <?= $ag===$a?'selected':'' ?>><?= $a ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control"
                       value="<?= old('no_hp', $profile['no_hp'] ?? '') ?>" placeholder="08xxxxxxxxxx">
              </div>

              <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="4"
                          placeholder="Tulis alamat lengkap..."><?= old('alamat', $profile['alamat'] ?? '') ?></textarea>
              </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
              <button class="btn btn-brand text-white" type="submit">💾 Simpan Profil</button>
              <a class="btn btn-soft" href="<?= base_url('pengumuman') ?>">📢 Lihat Pengumuman</a>
            </div>

            <div class="note mt-3">
              <strong>Info:</strong> Pastikan data yang diisi benar. Data profil digunakan untuk proses PPDB dan verifikasi berkas.
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- SUMMARY CARD -->
    <div class="col-12 col-lg-4">
      <div class="cardx">
        <div class="cardx-head">
          <h6 class="cardx-title">
            <span class="ico">✅</span>
            Ringkasan Profil
          </h6>
        </div>

        <div class="summary">
          <?php
            $nm = $profile['nama_lengkap'] ?? '-';
            $initial = strtoupper(substr(trim($nm), 0, 1));
          ?>
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="avatar"><?= esc($initial ?: 'U') ?></div>
            <div>
              <div class="fw-bold" style="color:var(--text)"><?= esc($nm) ?></div>
              <div class="text-muted small"><?= esc(session()->get('email')) ?></div>
            </div>
          </div>

          <div class="kv"><div>Asal Sekolah</div><span><?= esc($profile['asal_sekolah'] ?? '-') ?></span></div>
          <div class="kv"><div>TTL</div><span>
            <?= esc(($profile['tempat_lahir'] ?? '-') . ', ' . ($profile['tanggal_lahir'] ?? '-')) ?>
          </span></div>
          <div class="kv"><div>Agama</div><span><?= esc($profile['agama'] ?? '-') ?></span></div>
          <div class="kv"><div>No HP</div><span><?= esc($profile['no_hp'] ?? '-') ?></span></div>

          <div class="mt-3 text-muted small">
            Lengkapi profil agar proses pendaftaran & verifikasi berjalan lancar.
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
