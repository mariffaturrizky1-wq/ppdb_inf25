<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
  :root{
    --brand:#0b3a7a;
    --brand2:#062b58;
    --gold:#f4c542;
    --bg:#f3f6fb;
    --text:#0f172a;
    --muted:#64748b;
    --border: rgba(15,23,42,.10);
    --card: rgba(255,255,255,.96);
  }

  /* Layout tighten */
  .ppdb-wrap{
    max-width: 1200px;
    margin: 0 auto;
  }

  /* HERO (government look) */
  .ppdb-hero{
    border-radius: 18px;
    border: 1px solid var(--border);
    background:
      radial-gradient(900px 340px at 10% 0%, rgba(11,58,122,.16), transparent 58%),
      radial-gradient(760px 320px at 90% 30%, rgba(244,197,66,.16), transparent 55%),
      linear-gradient(180deg, rgba(255,255,255,.96), rgba(255,255,255,.90));
    padding: 18px;
    position: relative;
    overflow: hidden;
  }
  .ppdb-hero:after{
    content:"";
    position:absolute; inset:auto -120px -140px auto;
    width: 320px; height: 320px;
    background: radial-gradient(circle, rgba(244,197,66,.25), transparent 65%);
    transform: rotate(12deg);
    pointer-events:none;
  }
  .hero-title{ font-weight: 950; margin: 2px 0 2px; color: var(--text); }
  .hero-sub{ margin:0; color: var(--muted); }
  .hero-chip{
    display:inline-flex; align-items:center; gap:.45rem;
    border-radius:999px; padding:.3rem .7rem;
    border:1px solid rgba(0,0,0,.08);
    background: rgba(255,255,255,.78);
    font-size:.82rem;
    color: var(--text);
  }
  .hero-kop{
    display:flex; align-items:center; gap: 12px;
  }
  .kop-badge{
    width: 52px; height: 52px; border-radius: 16px;
    display:grid; place-items:center;
    background: rgba(11,58,122,.08);
    border:1px solid rgba(11,58,122,.12);
    color: var(--brand);
    font-size: 22px;
  }
  .account-box{
    text-align:right;
    color: var(--muted);
    font-size: 13px;
  }
  .account-box b{ color: var(--text); }

  /* Cards */
  .cardx{
    border-radius: 18px;
    border: 1px solid var(--border);
    background: var(--card);
    box-shadow: 0 12px 40px rgba(0,0,0,.06);
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
    gap:.65rem;
  }
  .ico{
    width: 36px; height: 36px; border-radius: 14px;
    display:grid; place-items:center;
    background: rgba(244,197,66,.18);
    border: 1px solid rgba(244,197,66,.30);
    font-size: 16px;
  }
  .cardx-body{ padding: 16px; }

  /* Sections inside form */
  .section{
    border: 1px solid rgba(0,0,0,.06);
    border-radius: 16px;
    padding: 14px;
    background: rgba(255,255,255,.72);
    margin-bottom: 12px;
  }
  .section-h{
    font-weight: 950;
    color: var(--text);
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap: 10px;
    margin-bottom: 10px;
  }
  .section-h small{ color: var(--muted); font-weight: 700; }

  /* Form controls */
  .form-label{ font-weight: 900; color:#1f2937; margin-bottom: .35rem; }
  .form-control, .form-select{
    border-radius: 12px;
    border-color: rgba(0,0,0,.12);
    padding: .62rem .8rem;
    background: rgba(255,255,255,.96);
  }
  .form-control:focus, .form-select:focus{
    border-color: rgba(11,58,122,.35);
    box-shadow: 0 0 0 .2rem rgba(11,58,122,.10);
  }

  /* Buttons */
  .btn-brand{
    border-radius: 12px;
    background: linear-gradient(180deg, var(--brand), var(--brand2));
    border: none;
    font-weight: 950;
    padding: .72rem 1rem;
    color:#fff;
  }
  .btn-brand:hover{ filter: brightness(.97); color:#fff; }
  .btn-soft{
    border-radius: 12px;
    border: 1px solid rgba(11,58,122,.20);
    background: rgba(11,58,122,.08);
    color: var(--brand);
    font-weight: 950;
    padding: .72rem 1rem;
  }
  .btn-soft:hover{ background: rgba(11,58,122,.12); color: var(--brand); }

  /* Upload area */
  .filebox{
    border: 1px dashed rgba(0,0,0,.18);
    background: rgba(255,255,255,.78);
    border-radius: 16px;
    padding: 12px;
    display:flex;
    gap: 12px;
    align-items:center;
  }
  .photo{
    width: 92px; height: 92px;
    border-radius: 18px;
    object-fit: cover;
    border: 1px solid rgba(0,0,0,.12);
    background: #fff;
  }
  .photo-empty{
    width: 92px; height: 92px;
    border-radius: 18px;
    border: 1px dashed rgba(0,0,0,.25);
    display:grid; place-items:center;
    color: var(--muted);
    font-weight: 900;
    background: rgba(255,255,255,.75);
  }
  .filebtn{
    border-radius: 12px;
    border: 1px solid rgba(11,58,122,.22);
    background: rgba(11,58,122,.08);
    color: var(--brand);
    padding: .55rem .85rem;
    font-weight: 950;
    cursor: pointer;
    white-space: nowrap;
    display:inline-flex;
    align-items:center;
    gap:8px;
  }
  .filename{
    font-weight: 800;
    color: #334155;
    overflow:hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
  }
  input[type="file"]{ display:none; }

  /* Right ID card */
  .id-wrap{ padding: 16px; }
  .id-card{
    border-radius: 18px;
    border: 1px solid rgba(0,0,0,.08);
    background:
      radial-gradient(600px 220px at 20% 0%, rgba(11,58,122,.10), transparent 55%),
      linear-gradient(180deg, rgba(255,255,255,.96), rgba(255,255,255,.92));
    padding: 14px;
  }
  .id-top{
    display:flex;
    gap: 12px;
    align-items:center;
    padding-bottom: 12px;
    border-bottom: 1px dashed rgba(0,0,0,.12);
    margin-bottom: 10px;
  }
  .id-name{ font-weight: 950; color: var(--text); line-height: 1.2; }
  .id-meta{ color: var(--muted); font-size: 12px; }
  .kv{
    display:flex;
    justify-content:space-between;
    gap: 14px;
    padding: 9px 0;
    border-bottom: 1px dashed rgba(0,0,0,.10);
    color: #334155;
    font-weight: 850;
    font-size: 13px;
  }
  .kv span{ color: var(--muted); font-weight: 750; text-align:right; }
  .kv:last-child{ border-bottom: none; }

  .progressx{
    height: 10px;
    border-radius: 999px;
    background: rgba(0,0,0,.08);
    overflow:hidden;
  }
  .progressx > div{
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, var(--brand), var(--gold));
  }

  .note{
    border-radius: 16px;
    border: 1px solid rgba(244,197,66,.35);
    background: rgba(244,197,66,.12);
    padding: 12px 12px;
    color: #5a4500;
    font-weight: 800;
    font-size: 14px;
  }

  /* make it feel premium */
  .shadow-soft{ box-shadow: 0 16px 50px rgba(0,0,0,.08); }
</style>

<?php
  $foto = $profile['foto'] ?? null;
  $fotoUrl = $foto ? base_url('uploads/profile/'.$foto) : null;

  $nm = $profile['nama_lengkap'] ?? '-';
  $email = session()->get('email');

  $filled = 0; $total = 6;
  if (!empty($profile['nama_lengkap'])) $filled++;
  if (!empty($profile['asal_sekolah'])) $filled++;
  if (!empty($profile['tanggal_lahir'])) $filled++;
  if (!empty($profile['alamat'])) $filled++;
  if (!empty($profile['no_hp'])) $filled++;
  if (!empty($profile['foto'])) $filled++;
  $percent = (int) round(($filled/$total)*100);
?>

<div class="col-12">
  <div class="ppdb-wrap">

    <!-- HERO -->
    <div class="ppdb-hero mb-3 shadow-soft">
      <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
        <div class="hero-kop">
          <div class="kop-badge">🏛️</div>
          <div>
            <div class="d-flex flex-wrap gap-2 mb-1">
              <span class="hero-chip">Portal PPDB</span>
              <span class="hero-chip">Profil Peserta</span>
              <span class="hero-chip">2025/2026</span>
            </div>
            <h3 class="hero-title">Profil Peserta Didik</h3>
            <p class="hero-sub">Lengkapi biodata & unggah foto wajah untuk proses verifikasi.</p>
          </div>
        </div>

        <div class="account-box">
          Akun: <b><?= esc(session()->get('nama_user')) ?></b><br>
          <?= esc($email) ?><br>
          <span class="hero-chip" style="margin-top:6px;">✅ Kelengkapan: <?= $percent ?>%</span>
        </div>
      </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
      <div class="alert alert-danger">
        <b>Periksa kembali:</b>
        <ul class="mb-0">
          <?php foreach (session()->getFlashdata('errors') as $err): ?>
            <li><?= esc($err) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="row g-3">
      <!-- LEFT: FORM -->
      <div class="col-12 col-lg-8">
        <div class="cardx shadow-soft">
          <div class="cardx-head">
            <h6 class="cardx-title"><span class="ico">🧾</span> Formulir Data Peserta</h6>
            <span class="badge badge-warning">Wajib: Nama + Foto</span>
          </div>

          <div class="cardx-body">
            <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
              <?= csrf_field() ?>

              <!-- FOTO -->
              <div class="section">
                <div class="section-h">
                  <div>Foto Wajah Peserta</div>
                  <small>JPG/PNG • Maks 2MB</small>
                </div>

                <div class="filebox">
                  <?php if ($fotoUrl): ?>
                    <img src="<?= $fotoUrl ?>" class="photo" alt="Foto Siswa">
                  <?php else: ?>
                    <div class="photo-empty">FOTO</div>
                  <?php endif; ?>

                  <div class="flex-grow-1">
                    <label class="filebtn" for="fotoInput">
                      <i class="fas fa-camera"></i> Pilih Foto
                    </label>
                    <div class="filename" id="fileName">Belum memilih file</div>
                    <div class="text-muted small mt-1">Foto wajah jelas, latar rapi, tanpa filter berlebihan.</div>
                    <input id="fotoInput" type="file" name="foto" accept="image/png,image/jpeg,image/jpg">
                  </div>
                </div>
              </div>

              <!-- DATA PRIBADI -->
              <div class="section mt-3">
                <div class="section-h">
                  <div>Data Pribadi</div>
                  <small>Isi sesuai identitas</small>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="nama_lengkap" class="form-control"
                      value="<?= old('nama_lengkap', $profile['nama_lengkap'] ?? '') ?>" required>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <?php $jk = old('jenis_kelamin', $profile['jenis_kelamin'] ?? ''); ?>
                    <select name="jenis_kelamin" class="form-select">
                      <option value="">- pilih -</option>
                      <option value="L" <?= $jk==='L'?'selected':'' ?>>Laki-laki</option>
                      <option value="P" <?= $jk==='P'?'selected':'' ?>>Perempuan</option>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control"
                      value="<?= old('tempat_lahir', $profile['tempat_lahir'] ?? '') ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control"
                      value="<?= old('tanggal_lahir', $profile['tanggal_lahir'] ?? '') ?>">
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="form-label">Agama</label>
                    <?php $ag = old('agama', $profile['agama'] ?? ''); ?>
                    <select name="agama" class="form-select">
                      <option value="">- pilih -</option>
                      <?php foreach (['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'] as $a): ?>
                        <option value="<?= $a ?>" <?= $ag===$a?'selected':'' ?>><?= $a ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control"
                      value="<?= old('no_hp', $profile['no_hp'] ?? '') ?>" placeholder="08xxxxxxxxxx">
                  </div>
                </div>
              </div>

              <!-- RIWAYAT SEKOLAH -->
              <div class="section mt-3">
                <div class="section-h">
                  <div>Riwayat Sekolah</div>
                  <small>Terakhir</small>
                </div>

                <div class="row">
                  <div class="col-12 mb-0">
                    <label class="form-label">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control"
                      value="<?= old('asal_sekolah', $profile['asal_sekolah'] ?? '') ?>"
                      placeholder="Contoh: SMPN 1 Brebes">
                  </div>
                </div>
              </div>

              <!-- ALAMAT -->
              <div class="section mt-3">
                <div class="section-h">
                  <div>Alamat Domisili</div>
                  <small>Lengkap</small>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="4"
                      placeholder="Tulis alamat lengkap..."><?= old('alamat', $profile['alamat'] ?? '') ?></textarea>
                  </div>
                </div>
              </div>

              <div class="d-flex flex-wrap gap-2 mt-3">
                <button class="btn-brand" type="submit">💾 Simpan Data</button>
                <a class="btn-soft" href="<?= base_url('pengumuman') ?>">📢 Lihat Pengumuman</a>
              </div>

              <div class="note mt-3">
                <strong>Info:</strong> Data & foto digunakan untuk verifikasi. Pastikan sesuai identitas peserta.
              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- RIGHT: IDENTITY -->
      <div class="col-12 col-lg-4">
        <div class="cardx shadow-soft">
          <div class="cardx-head">
            <h6 class="cardx-title"><span class="ico">🪪</span> Kartu Identitas Peserta</h6>
          </div>

          <div class="id-wrap">
            <div class="id-card">
              <div class="id-top">
                <?php if (!empty($fotoUrl)): ?>
                  <img src="<?= $fotoUrl ?>" class="photo" alt="Foto Siswa">
                <?php else: ?>
                  <div class="photo-empty">FOTO</div>
                <?php endif; ?>

                <div>
                  <div class="id-name"><?= esc($nm) ?></div>
                  <div class="id-meta"><?= esc($email) ?></div>
                  <div class="id-meta">ID Peserta: <b><?= esc(session()->get('id_user')) ?></b></div>
                </div>
              </div>

              <div class="kv"><div>Asal Sekolah</div><span><?= esc($profile['asal_sekolah'] ?? '-') ?></span></div>
              <div class="kv"><div>TTL</div><span><?= esc(($profile['tempat_lahir'] ?? '-') . ', ' . ($profile['tanggal_lahir'] ?? '-')) ?></span></div>
              <div class="kv"><div>Agama</div><span><?= esc($profile['agama'] ?? '-') ?></span></div>
              <div class="kv"><div>No HP</div><span><?= esc($profile['no_hp'] ?? '-') ?></span></div>

              <div class="mt-3">
                <div class="d-flex justify-content-between align-items-center mb-1" style="font-weight:900;color:var(--text);">
                  <div>Progress Kelengkapan</div>
                  <div style="color:var(--muted);font-weight:800;"><?= $percent ?>%</div>
                </div>
                <div class="progressx">
                  <div style="width: <?= $percent ?>%;"></div>
                </div>

                <div class="text-muted small mt-2">
                  Lengkapi data agar proses pendaftaran & verifikasi lebih cepat.
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- quick actions -->
        <div class="mt-3">
          <div class="cardx" style="border-radius:18px;">
            <div class="cardx-body">
              <div style="font-weight:950;color:var(--text);">Tips Verifikasi</div>
              <div class="text-muted small mt-1">
                Gunakan foto wajah terbaru, tanpa topi/kacamata gelap, dan pencahayaan cukup.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<script>
  (function(){
    const input = document.getElementById('fotoInput');
    const label = document.getElementById('fileName');
    if (!input || !label) return;

    input.addEventListener('change', function(){
      label.textContent = (this.files && this.files.length) ? this.files[0].name : 'Belum memilih file';
    });
  })();
</script>

<?= $this->endSection() ?>
