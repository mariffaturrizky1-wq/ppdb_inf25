<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* =========================================================
   PPDB GOV SIGNATURE UI (Premium, tidak polos)
   - Full background motif lembut
   - Hero resmi + badge & ornament
   - Stepper glossy
   - Card glass + section divider
   - Upload card premium
   - Input lebih hidup tapi tetap elegan
   ========================================================= */

:root{
  --navy:#0B2F55;
  --navy2:#082845;
  --blue:#0F4C81;
  --blue2:#1362a6;
  --sky:#EAF2FF;
  --gold:#F2B705;
  --gold2:#ffd24a;

  --bg1:#f5f8ff;
  --bg2:#eef3fb;

  --card:#ffffff;
  --text:#0f1d2e;
  --muted:#6B7A90;

  --border:rgba(15,76,129,.16);
  --border2:rgba(15,76,129,.10);

  --shadow: 0 22px 54px rgba(9, 27, 52, .14);
  --shadow2: 0 12px 28px rgba(9, 27, 52, .10);
  --shadow3: 0 8px 18px rgba(9, 27, 52, .10);

  --radius:22px;
}

/* AdminLTE override */
.content-wrapper{ background: transparent !important; }
.content{ padding-top: 16px !important; }

/* FULL PAGE BACKGROUND (motif halus) */
.ppdb-page{
  min-height: calc(100vh - 120px);
  padding: 18px 14px 34px;
  background:
    radial-gradient(1100px 520px at 12% 0%, rgba(19,98,166,.16) 0%, rgba(19,98,166,0) 58%),
    radial-gradient(900px 420px at 86% 18%, rgba(242,183,5,.13) 0%, rgba(242,183,5,0) 58%),
    linear-gradient(180deg, var(--bg1), var(--bg2));
  position: relative;
  overflow: hidden;
}
.ppdb-page:before{
  content:"";
  position:absolute;
  inset:0;
  background-image:
    radial-gradient(circle at 1px 1px, rgba(15,76,129,.06) 1px, transparent 0);
  background-size: 18px 18px;
  opacity:.55;
  pointer-events:none;
}

/* Layout container */
.ppdb-container{
  max-width: 1120px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

/* HERO (lebih hidup) */
.hero{
  background: linear-gradient(135deg, var(--navy2), var(--blue));
  border-radius: calc(var(--radius) + 4px);
  color:#fff;
  padding: 22px 22px;
  box-shadow: 0 20px 52px rgba(11,47,85,.26);
  position: relative;
  overflow:hidden;
}
.hero:before{
  content:"";
  position:absolute;
  width: 520px; height: 520px;
  right:-240px; top:-320px;
  background: radial-gradient(circle, rgba(242,183,5,.26), rgba(242,183,5,0) 62%);
  border-radius:50%;
}
.hero:after{
  content:"";
  position:absolute;
  width: 420px; height: 420px;
  left:-220px; bottom:-280px;
  background: radial-gradient(circle, rgba(255,255,255,.18), rgba(255,255,255,0) 62%);
  border-radius:50%;
}

.hero-top{
  display:flex;
  align-items:flex-start;
  justify-content: space-between;
  gap: 12px;
  position: relative;
  z-index: 1;
}
.hero h3{
  margin:0;
  font-weight: 950;
  letter-spacing:.2px;
  font-size: 1.65rem;
}
.hero p{
  margin: 7px 0 0;
  opacity:.92;
  font-size: 1rem;
  max-width: 820px;
}

/* Badge resmi */
.hero-badges{
  display:flex;
  gap:10px;
  flex-wrap:wrap;
  margin-top: 14px;
  position: relative;
  z-index: 1;
}
.badge-pill{
  display:inline-flex;
  align-items:center;
  gap:8px;
  padding: 8px 12px;
  border-radius: 999px;
  background: rgba(255,255,255,.12);
  border: 1px solid rgba(255,255,255,.18);
  font-size: .86rem;
  font-weight: 800;
}

/* STEP PER (lebih modern) */
.stepper{
  display:grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 10px;
  margin: 14px 0 16px;
}
.step{
  background: rgba(255,255,255,.92);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 10px 12px;
  box-shadow: var(--shadow3);
  display:flex;
  align-items:center;
  gap: 10px;
  min-height: 62px;
  position: relative;
  overflow: hidden;
}
.step:before{
  content:"";
  position:absolute;
  inset:0;
  background: linear-gradient(135deg, rgba(19,98,166,.10), rgba(242,183,5,.06));
  opacity:.75;
  pointer-events:none;
}
.step .num{
  width: 36px; height: 36px;
  border-radius: 14px;
  background: linear-gradient(180deg, #EAF2FF, #F7FBFF);
  border: 1px solid rgba(15,76,129,.20);
  color: var(--blue);
  font-weight: 950;
  display:grid;
  place-items:center;
  flex:0 0 auto;
  position: relative;
  z-index: 1;
}
.step .txt{
  position: relative;
  z-index: 1;
}
.step .label{
  font-weight: 950;
  color: var(--text);
  font-size:.93rem;
  line-height:1.1;
}
.step .hint{
  font-size:.78rem;
  color: var(--muted);
  margin-top:2px;
}
@media (max-width: 991px){
  .stepper{ grid-template-columns: 1fr; }
}

/* MAIN GLASS CARD */
.card-glass{
  border-radius: 24px;
  background: rgba(255,255,255,.86);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,.58);
  box-shadow: var(--shadow);
  position: relative;
  overflow: hidden;
}
.card-glass:before{
  content:"";
  position:absolute;
  inset:-2px;
  background: radial-gradient(700px 220px at 18% 0%, rgba(19,98,166,.10), transparent 60%),
              radial-gradient(700px 220px at 88% 18%, rgba(242,183,5,.08), transparent 60%);
  pointer-events:none;
}
.card-glass .card-body{
  padding: 26px;
  position: relative;
  z-index: 1;
}
@media (min-width:768px){
  .card-glass .card-body{ padding: 34px; }
}

/* ALERT INFO (lebih elegan) */
.notice{
  background: linear-gradient(180deg, rgba(242,183,5,.18), rgba(242,183,5,.08));
  border: 1px solid rgba(242,183,5,.34);
  color:#6b5200;
  border-radius: 18px;
  padding: 12px 14px;
  display:flex;
  gap: 10px;
  align-items:flex-start;
}

/* SECTION */
.section{
  padding-top: 18px;
  margin-top: 18px;
  border-top: 1px dashed rgba(15,76,129,.18);
}
.section:first-of-type{ padding-top:0; margin-top:0; border-top:none; }

.section-head{
  display:flex;
  justify-content: space-between;
  align-items:center;
  gap: 12px;
  margin-bottom: 12px;
}
.section-title{
  margin:0;
  font-weight: 950;
  color: var(--navy);
  display:flex;
  align-items:center;
  gap: 10px;
}
.dot{
  width:10px;height:10px;border-radius:50%;
  background: var(--gold);
  box-shadow: 0 0 0 8px rgba(242,183,5,.14);
}
.section-sub{
  margin:0;
  color: var(--muted);
  font-size: .9rem;
}

/* INPUTS (lebih premium) */
.form-label{
  font-weight: 950 !important;
  color: var(--text);
  letter-spacing: .1px;
}
.form-control, .form-select{
  border-radius: 14px !important;
  border: 1px solid rgba(15,76,129,.22) !important;
  padding: 12px 14px !important;
  background: rgba(255,255,255,.96) !important;
  box-shadow: 0 8px 16px rgba(9,27,52,.05);
}
.form-control::placeholder{ color: rgba(107,122,144,.75); }
.form-control:focus, .form-select:focus{
  border-color: rgba(19,98,166,.65) !important;
  box-shadow: 0 0 0 .22rem rgba(19,98,166,.12) !important;
}

/* input icon */
.iconwrap{ position: relative; }
.iconwrap i{
  position: absolute; left: 14px; top: 50%;
  transform: translateY(-50%);
  color: rgba(15,76,129,.70);
}
.iconwrap .form-control{ padding-left: 42px !important; }

/* helper note */
.note{
  color: var(--muted);
  font-size:.84rem;
  margin-top: 6px;
}

/* UPLOAD CARD */
.upload-card{
  background: rgba(255,255,255,.94);
  border: 1px dashed rgba(15,76,129,.30);
  border-radius: 18px;
  padding: 14px;
  box-shadow: var(--shadow3);
  position: relative;
}
.upload-card:before{
  content:"";
  position:absolute;
  inset:0;
  background: linear-gradient(135deg, rgba(19,98,166,.06), rgba(242,183,5,.05));
  border-radius: 18px;
  pointer-events:none;
}

/* BUTTONS */
.btn-main{
  background: linear-gradient(135deg, var(--navy2), var(--blue2));
  border: none;
  color:#fff;
  font-weight: 950;
  border-radius: 999px;
  padding: 12px 22px;
  box-shadow: 0 18px 30px rgba(11,47,85,.22);
}
.btn-main:hover{ filter: brightness(1.04); color:#fff; transform: translateY(-1px); transition:.15s ease; }

.btn-soft{
  border: 1px solid rgba(15,76,129,.24);
  background: rgba(255,255,255,.94);
  color: var(--navy);
  font-weight: 950;
  border-radius: 999px;
  padding: 12px 18px;
  box-shadow: 0 10px 18px rgba(9,27,52,.08);
}
.btn-soft:hover{ transform: translateY(-1px); transition:.15s ease; }

/* FOOTER */
.footer{
  display:flex;
  justify-content: space-between;
  align-items:center;
  gap: 12px;
  flex-wrap: wrap;
  margin-top: 18px;
}
.lock{
  color: var(--muted);
  display:flex;
  align-items:center;
  gap: 8px;
  font-size:.92rem;
}
</style>

<div class="ppdb-page">
  <div class="ppdb-container">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-top">
        <div>
          <h3><i class="fa-solid fa-landmark me-2"></i> PPDB Online SMA Kabupaten Brebes</h3>
          <p>Formulir resmi pendaftaran — isi sesuai dokumen (KK, Akta, Ijazah/SKL) agar proses verifikasi lancar.</p>

          <div class="hero-badges">
            <div class="badge-pill"><i class="fa-solid fa-shield-halved"></i> Aman & Terenkripsi</div>
            <div class="badge-pill"><i class="fa-solid fa-file-circle-check"></i> Verifikasi Berkas</div>
            <div class="badge-pill"><i class="fa-solid fa-clock"></i> Proses Cepat</div>
            <div class="badge-pill"><i class="fa-solid fa-circle-check"></i> Layanan Resmi</div>
          </div>
        </div>
      </div>
    </div>

    <!-- STEPPER -->
    <div class="stepper">
      <div class="step"><div class="num">1</div><div class="txt"><div class="label">Data Pribadi</div><div class="hint">NISN & asal sekolah</div></div></div>
      <div class="step"><div class="num">2</div><div class="txt"><div class="label">Alamat</div><div class="hint">Kecamatan & desa</div></div></div>
      <div class="step"><div class="num">3</div><div class="txt"><div class="label">Pilihan Sekolah</div><div class="hint">Pilihan 1 & 2</div></div></div>
      <div class="step"><div class="num">4</div><div class="txt"><div class="label">Dokumen</div><div class="hint">KK, Akta, Ijazah</div></div></div>
      <div class="step"><div class="num">5</div><div class="txt"><div class="label">Kirim</div><div class="hint">Pernyataan & submit</div></div></div>
    </div>

    <!-- MAIN CARD -->
    <div class="card card-glass">
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

        <div class="notice mb-3">
          <i class="fa-solid fa-circle-info mt-1"></i>
          <div>
            <div style="font-weight:950;">Perhatian</div>
            <div style="font-size:.92rem;">
              Pastikan data sesuai dokumen. Berkas wajib jelas (PDF/JPG/PNG), maksimal 2MB per file.
            </div>
          </div>
        </div>

        <form action="<?= base_url('pendaftaran/simpan') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>

          <!-- DATA PRIBADI -->
          <div class="section">
            <div class="section-head">
              <h6 class="section-title"><span class="dot"></span><i class="fa-solid fa-id-card"></i> Data Pribadi</h6>
              <p class="section-sub">Isi sesuai ijazah/rapor</p>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Nama Lengkap</label>
                <div class="iconwrap">
                  <i class="fa-solid fa-user"></i>
                  <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Ahmad Maulana" required>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label">NISN</label>
                <div class="iconwrap">
                  <i class="fa-solid fa-hashtag"></i>
                  <input type="text" name="nisn" class="form-control" placeholder="10 digit" maxlength="10" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Asal Sekolah</label>
                <div class="iconwrap">
                  <i class="fa-solid fa-school"></i>
                  <input type="text" name="asal_sekolah" class="form-control" placeholder="SMP/MTs ..." required>
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
                <div class="iconwrap">
                  <i class="fa-solid fa-star"></i>
                  <input type="number" step="0.01" name="nilai" class="form-control" placeholder="Contoh: 87.50" min="0" max="100" required>
                </div>
                <div class="note">Gunakan format angka desimal (contoh: 87.50).</div>
              </div>
            </div>
          </div>

          <!-- ALAMAT -->
          <div class="section">
            <div class="section-head">
              <h6 class="section-title"><span class="dot"></span><i class="fa-solid fa-location-dot"></i> Alamat Domisili</h6>
              <p class="section-sub">Sesuai KK</p>
            </div>

            <div class="mb-3">
              <label class="form-label">Alamat Lengkap</label>
              <div class="iconwrap">
                <i class="fa-solid fa-map"></i>
                <input type="text" name="alamat" class="form-control" placeholder="Jl..., RT/RW..., Dusun..." required>
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

          <!-- PILIHAN SEKOLAH -->
          <div class="section">
            <div class="section-head">
              <h6 class="section-title"><span class="dot"></span><i class="fa-solid fa-building-columns"></i> Pilihan Sekolah</h6>
              <p class="section-sub">Pilih sesuai minat</p>
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
                <div class="note">Kosongkan jika hanya memilih 1 sekolah.</div>
              </div>
            </div>
          </div>

          <!-- DOKUMEN -->
          <div class="section">
            <div class="section-head">
              <h6 class="section-title"><span class="dot"></span><i class="fa-solid fa-file-arrow-up"></i> Upload Dokumen Wajib</h6>
              <p class="section-sub">PDF/JPG/PNG (Max 2MB)</p>
            </div>

            <div class="row g-3">
              <div class="col-md-4">
                <div class="upload-card">
                  <label class="form-label">Kartu Keluarga (KK)</label>
                  <input type="file" name="dok_kk" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                  <div class="note"><i class="fa-solid fa-circle-check me-1"></i> Max 2MB</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="upload-card">
                  <label class="form-label">Akta Lahir</label>
                  <input type="file" name="dok_akta" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                  <div class="note"><i class="fa-solid fa-circle-check me-1"></i> Max 2MB</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="upload-card">
                  <label class="form-label">Ijazah / SKL</label>
                  <input type="file" name="dok_ijazah" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                  <div class="note"><i class="fa-solid fa-circle-check me-1"></i> Max 2MB</div>
                </div>
              </div>
            </div>
          </div>

          <!-- SUBMIT -->
          <div class="section">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="stmt" name="pernyataan" required>
              <label class="form-check-label" for="stmt" style="font-weight:950;color:var(--text);">
                Saya menyatakan data yang diinput benar dan dapat dipertanggungjawabkan.
              </label>
            </div>

            <div class="footer">
              <div class="lock">
                <i class="fa-solid fa-lock"></i>
                Data tersimpan aman dan akan diverifikasi operator.
              </div>

              <div class="d-flex gap-2 flex-wrap">
                <a href="<?= base_url('dashboard') ?>" class="btn btn-soft">
                  <i class="fa-solid fa-arrow-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn btn-main">
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
