<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* =========================================================
   PPDB Premium Government UI (Full Code - Single File)
   Target: lebih mewah, berwarna, elegan, rapi & hilangkan putih
   ========================================================= */
:root{
  --navy:#0B2F55;
  --blue:#0F4C81;
  --sky:#EAF2FF;
  --gold:#F2B705;
  --bg1:#F4F8FF;
  --bg2:#EEF3FB;
  --card:#FFFFFF;
  --text:#122033;
  --muted:#6B7A90;
  --border:rgba(15,76,129,.16);
  --shadow: 0 18px 40px rgba(9, 27, 52, .10);
  --shadow2: 0 10px 24px rgba(9, 27, 52, .08);
}

/* Force background full width on AdminLTE */
.content-wrapper{ background: transparent !important; }
.content{ padding-top: 18px !important; }

/* Full-page premium background */
.ppdb-premium{
  min-height: calc(100vh - 120px);
  padding: 18px 14px 34px;
  background:
    radial-gradient(1200px 500px at 18% 0%, rgba(15,76,129,.18) 0%, rgba(15,76,129,0) 55%),
    radial-gradient(1000px 420px at 85% 20%, rgba(242,183,5,.14) 0%, rgba(242,183,5,0) 56%),
    linear-gradient(180deg, var(--bg1), var(--bg2));
}

/* Wider container for better proportions */
.ppdb-container{
  max-width: 1100px;
  margin: 0 auto;
}

/* Hero */
.ppdb-hero{
  background: linear-gradient(135deg, var(--navy), var(--blue));
  border-radius: 24px;
  color: #fff;
  padding: 22px 22px;
  box-shadow: 0 18px 40px rgba(11,47,85,.22);
  position: relative;
  overflow: hidden;
}
.ppdb-hero:before{
  content:"";
  position:absolute;
  width: 360px; height: 360px;
  right: -140px; top: -170px;
  background: radial-gradient(circle, rgba(242,183,5,.22), rgba(242,183,5,0) 62%);
  border-radius: 50%;
}
.ppdb-hero:after{
  content:"";
  position:absolute;
  width: 260px; height: 260px;
  left: -120px; bottom: -150px;
  background: radial-gradient(circle, rgba(255,255,255,.14), rgba(255,255,255,0) 62%);
  border-radius: 50%;
}
.ppdb-hero .title{
  margin: 0;
  font-weight: 900;
  letter-spacing: .2px;
  font-size: 1.55rem;
  position: relative;
  z-index: 1;
}
.ppdb-hero .subtitle{
  margin: 7px 0 0;
  opacity: .92;
  font-size: 1rem;
  position: relative;
  z-index: 1;
}

/* Chips */
.ppdb-chips{
  display:flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-top: 14px;
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

/* Stepper */
.ppdb-stepper{
  display:grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 10px;
  margin: 14px 0 16px;
}
.ppdb-step{
  background: rgba(255,255,255,.92);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 10px 12px;
  box-shadow: var(--shadow2);
  display:flex;
  align-items:center;
  gap: 10px;
  min-height: 60px;
}
.ppdb-step .num{
  width: 34px; height: 34px;
  border-radius: 13px;
  background: linear-gradient(180deg, #EAF2FF, #F6FAFF);
  border: 1px solid rgba(15,76,129,.18);
  color: var(--blue);
  font-weight: 900;
  display:grid;
  place-items:center;
}
.ppdb-step .label{
  font-weight: 900;
  color: var(--text);
  font-size:.93rem;
  line-height:1.1;
}
.ppdb-step .hint{
  font-size:.78rem;
  color: var(--muted);
  margin-top:2px;
}
@media (max-width: 991px){
  .ppdb-stepper{ grid-template-columns: 1fr; }
}

/* Main card (glass) */
.ppdb-card{
  border-radius: 24px;
  background: rgba(255,255,255,.86);
  backdrop-filter: blur(9px);
  border: 1px solid rgba(255,255,255,.55);
  box-shadow: var(--shadow);
}
.ppdb-card .card-body{ padding: 26px; }
@media (min-width:768px){
  .ppdb-card .card-body{ padding: 34px; }
}

/* Info box */
.ppdb-info{
  background: linear-gradient(180deg, rgba(242,183,5,.16), rgba(242,183,5,.08));
  border: 1px solid rgba(242,183,5,.32);
  color: #6b5200;
  border-radius: 18px;
  padding: 12px 14px;
  display:flex;
  gap: 10px;
  align-items:flex-start;
}

/* Sections */
.ppdb-section{
  padding-top: 18px;
  margin-top: 18px;
  border-top: 1px dashed rgba(15,76,129,.18);
}
.ppdb-section:first-of-type{ padding-top: 0; margin-top: 0; border-top: none; }

.ppdb-section-title{
  display:flex;
  justify-content: space-between;
  align-items:center;
  margin-bottom: 12px;
}
.ppdb-section-title h6{
  margin: 0;
  font-weight: 900;
  color: var(--navy);
  display:flex;
  align-items:center;
  gap: 10px;
}
.ppdb-dot{
  width: 10px; height: 10px;
  border-radius: 50%;
  background: var(--gold);
  box-shadow: 0 0 0 8px rgba(242,183,5,.14);
}
.ppdb-mini{ margin:0; color: var(--muted); font-size:.9rem; }

/* Inputs */
.form-label{ font-weight: 900 !important; color: var(--text); }
.form-control, .form-select{
  border-radius: 14px !important;
  border: 1px solid rgba(15,76,129,.22) !important;
  padding: 12px 14px !important;
  background: rgba(255,255,255,.92) !important;
}
.form-control:focus, .form-select:focus{
  border-color: rgba(15,76,129,.55) !important;
  box-shadow: 0 0 0 .22rem rgba(15,76,129,.12) !important;
}

/* Input icons */
.ppdb-iconwrap{ position: relative; }
.ppdb-iconwrap i{
  position: absolute; left: 14px; top: 50%;
  transform: translateY(-50%);
  color: rgba(15,76,129,.68);
}
.ppdb-iconwrap .form-control{ padding-left: 42px !important; }

/* Upload cards */
.ppdb-upload{
  background: rgba(255,255,255,.92);
  border: 1px dashed rgba(15,76,129,.32);
  border-radius: 18px;
  padding: 14px;
}
.ppdb-note{ color: var(--muted); font-size:.84rem; margin-top: 6px; }

/* Buttons */
.btn-ppdb{
  background: linear-gradient(135deg, var(--navy), var(--blue));
  border: none;
  color:#fff;
  font-weight: 900;
  border-radius: 999px;
  padding: 12px 22px;
  box-shadow: 0 16px 26px rgba(11,47,85,.22);
}
.btn-ppdb:hover{ filter: brightness(1.03); color:#fff; }

.btn-ghost{
  border: 1px solid rgba(15,76,129,.24);
  background: rgba(255,255,255,.92);
  color: var(--navy);
  font-weight: 900;
  border-radius: 999px;
  padding: 12px 18px;
}

/* Footer line */
.ppdb-footer{
  display:flex;
  justify-content: space-between;
  align-items:center;
  gap: 12px;
  flex-wrap: wrap;
  margin-top: 18px;
}
.ppdb-lock{
  color: var(--muted);
  display:flex;
  align-items:center;
  gap: 8px;
  font-size:.92rem;
}
</style>

<div class="ppdb-premium">
  <div class="ppdb-container">

    <!-- HERO -->
    <div class="ppdb-hero">
      <h3 class="title"><i class="fa-solid fa-landmark me-2"></i> PPDB Online SMA Kabupaten Brebes</h3>
      <p class="subtitle">Formulir resmi pendaftaran — isi sesuai dokumen (KK, Akta, Ijazah/SKL).</p>

      <div class="ppdb-chips">
        <div class="ppdb-chip"><i class="fa-solid fa-shield-halved"></i> Aman & Terenkripsi</div>
        <div class="ppdb-chip"><i class="fa-solid fa-clock"></i> Proses Cepat</div>
        <div class="ppdb-chip"><i class="fa-solid fa-file-circle-check"></i> Verifikasi Berkas</div>
      </div>
    </div>

    <!-- STEPPER -->
    <div class="ppdb-stepper">
      <div class="ppdb-step">
        <div class="num">1</div>
        <div>
          <div class="label">Data Pribadi</div>
          <div class="hint">NISN & asal sekolah</div>
        </div>
      </div>
      <div class="ppdb-step">
        <div class="num">2</div>
        <div>
          <div class="label">Alamat</div>
          <div class="hint">Kecamatan & desa</div>
        </div>
      </div>
      <div class="ppdb-step">
        <div class="num">3</div>
        <div>
          <div class="label">Pilihan Sekolah</div>
          <div class="hint">Pilihan 1 & 2</div>
        </div>
      </div>
      <div class="ppdb-step">
        <div class="num">4</div>
        <div>
          <div class="label">Dokumen</div>
          <div class="hint">KK, Akta, Ijazah</div>
        </div>
      </div>
      <div class="ppdb-step">
        <div class="num">5</div>
        <div>
          <div class="label">Kirim</div>
          <div class="hint">Pernyataan & submit</div>
        </div>
      </div>
    </div>

    <!-- MAIN CARD -->
    <div class="card ppdb-card">
      <div class="card-body">

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success d-flex align-items-center">
            <i class="fa-solid fa-circle-check me-2"></i>
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger d-flex align-items-center">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <div class="ppdb-info mb-3">
          <i class="fa-solid fa-circle-info mt-1"></i>
          <div>
            <div style="font-weight:900;">Perhatian</div>
            <div style="font-size:.92rem;">
              Pastikan data sesuai dokumen. Berkas wajib jelas (PDF/JPG/PNG), maksimal 2MB per file.
            </div>
          </div>
        </div>

        <form action="<?= base_url('pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <!-- SECTION: Data Pribadi -->
          <div class="ppdb-section">
            <div class="ppdb-section-title">
              <h6><span class="ppdb-dot"></span><i class="fa-solid fa-id-card"></i> Data Pribadi</h6>
              <p class="ppdb-mini">Isi sesuai ijazah/rapor</p>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Nama Lengkap</label>
                <div class="ppdb-iconwrap">
                  <i class="fa-solid fa-user"></i>
                  <input type="text" name="nama_lengkap" class="form-control"
                         placeholder="Contoh: Ahmad Maulana" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">NISN</label>
                <div class="ppdb-iconwrap">
                  <i class="fa-solid fa-hashtag"></i>
                  <input type="text" name="nisn" class="form-control"
                         placeholder="10 digit" maxlength="10" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Asal Sekolah</label>
                <div class="ppdb-iconwrap">
                  <i class="fa-solid fa-school"></i>
                  <input type="text" name="asal_sekolah" class="form-control"
                         placeholder="SMP/MTs ..." required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Jalur Pendaftaran</label>
                <select name="jalur_id" class="form-select" required>
                  <option value="">— Pilih Jalur —</option>
                  <?php foreach ($jalur as $j): ?>
                    <option value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Nilai Rata-rata</label>
                <div class="ppdb-iconwrap">
                  <i class="fa-solid fa-star"></i>
                  <input type="number" step="0.01" name="nilai" class="form-control"
                         placeholder="Contoh: 87.50" min="0" max="100" required>
                </div>
                <div class="ppdb-note">Gunakan format angka desimal (contoh: 87.50).</div>
              </div>
            </div>
          </div>

          <!-- SECTION: Alamat -->
          <div class="ppdb-section">
            <div class="ppdb-section-title">
              <h6><span class="ppdb-dot"></span><i class="fa-solid fa-location-dot"></i> Alamat Domisili</h6>
              <p class="ppdb-mini">Sesuai KK</p>
            </div>

            <div class="mb-3">
              <label class="form-label">Alamat Lengkap</label>
              <div class="ppdb-iconwrap">
                <i class="fa-solid fa-map"></i>
                <input type="text" name="alamat" class="form-control"
                       placeholder="Jl..., RT/RW..., Dusun..." required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan" class="form-select" required>
                  <option value="">— Pilih Kecamatan —</option>
                  <?php foreach ($kecamatan as $k): ?>
                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Desa/Kelurahan</label>
                <select name="desa_id" id="desa" class="form-select" required>
                  <option value="">— Pilih Desa —</option>
                </select>
              </div>
            </div>
          </div>

          <!-- SECTION: Pilihan Sekolah -->
          <div class="ppdb-section">
            <div class="ppdb-section-title">
              <h6><span class="ppdb-dot"></span><i class="fa-solid fa-building-columns"></i> Pilihan Sekolah</h6>
              <p class="ppdb-mini">Pilih sesuai minat</p>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Pilihan 1</label>
                <select name="id_sekolah" class="form-select" required>
                  <option value="">— Pilih Sekolah —</option>
                  <?php foreach ($sekolah as $s): ?>
                    <option value="<?= $s['id_sekolah'] ?>">
                      <?= $s['nama_sekolah'] ?> (Kuota: <?= $s['kuota'] ?>)
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">Pilihan 2 (Opsional)</label>
                <select name="id_sekolah2" class="form-select">
                  <option value="">— (Opsional) —</option>
                  <?php foreach ($sekolah as $s): ?>
                    <option value="<?= $s['id_sekolah'] ?>">
                      <?= $s['nama_sekolah'] ?> (Kuota: <?= $s['kuota'] ?>)
                    </option>
                  <?php endforeach; ?>
                </select>
                <div class="ppdb-note">Kosongkan jika hanya memilih 1 sekolah.</div>
              </div>
            </div>
          </div>

          <!-- SECTION: Upload Dokumen -->
          <div class="ppdb-section">
            <div class="ppdb-section-title">
              <h6><span class="ppdb-dot"></span><i class="fa-solid fa-file-arrow-up"></i> Upload Dokumen Wajib</h6>
              <p class="ppdb-mini">Format PDF/JPG/PNG</p>
            </div>

            <div class="row g-3">
              <div class="col-md-4">
                <div class="ppdb-upload">
                  <label class="form-label">Kartu Keluarga (KK)</label>
                  <input type="file" name="dok_kk" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                  <div class="ppdb-note"><i class="fa-solid fa-circle-check me-1"></i> Max 2MB</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="ppdb-upload">
                  <label class="form-label">Akta Lahir</label>
                  <input type="file" name="dok_akta" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                  <div class="ppdb-note"><i class="fa-solid fa-circle-check me-1"></i> Max 2MB</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="ppdb-upload">
                  <label class="form-label">Ijazah / SKL</label>
                  <input type="file" name="dok_ijazah" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                  <div class="ppdb-note"><i class="fa-solid fa-circle-check me-1"></i> Max 2MB</div>
                </div>
              </div>
            </div>
          </div>

          <!-- SECTION: Pernyataan + Submit -->
          <div class="ppdb-section">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="stmt" name="pernyataan" required>
              <label class="form-check-label" for="stmt" style="font-weight:900;color:var(--text);">
                Saya menyatakan data yang diinput benar dan dapat dipertanggungjawabkan.
              </label>
            </div>

            <div class="ppdb-footer">
              <div class="ppdb-lock">
                <i class="fa-solid fa-lock"></i>
                Data Anda tersimpan dengan aman dan akan diverifikasi oleh operator.
              </div>

              <div class="d-flex gap-2 flex-wrap">
                <a href="<?= base_url('dashboard') ?>" class="btn btn-ghost">
                  <i class="fa-solid fa-arrow-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn btn-ppdb">
                  <i class="fa-solid fa-paper-plane me-2"></i> Kirim Pendaftaran
                </button>
              </div>
            </div>
          </div>

        </form>

      </div>
    </div>

  </div>
</div>

<script>
/* Dropdown desa dinamis */
document.getElementById('kecamatan')?.addEventListener('change', async function(){
  const kecId = this.value;
  const desaSelect = document.getElementById('desa');
  desaSelect.innerHTML = `<option value="">Memuat...</option>`;

  if(!kecId){
    desaSelect.innerHTML = `<option value="">— Pilih Desa —</option>`;
    return;
  }

  try{
    const res = await fetch(`<?= base_url('pendaftaran/desa') ?>/${kecId}`);
    const data = await res.json();

    let html = `<option value="">— Pilih Desa —</option>`;
    data.forEach(d => html += `<option value="${d.id}">${d.nama}</option>`);
    desaSelect.innerHTML = html;
  }catch(e){
    desaSelect.innerHTML = `<option value="">Gagal memuat desa</option>`;
  }
});
</script>

<?= $this->endSection() ?>
