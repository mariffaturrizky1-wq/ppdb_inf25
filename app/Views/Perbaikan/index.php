<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
  :root{
    --bg0:#060B18; --bg1:#0A1530; --bg2:#071025;
    --card: rgba(255,255,255,.08);
    --stroke: rgba(255,255,255,.14);
    --text:#EAF0FF;
    --muted: rgba(234,240,255,.72);
    --shadow: 0 18px 70px rgba(0,0,0,.45);
    --shadow2: 0 12px 40px rgba(0,0,0,.35);
    --r18:18px; --r24:24px;
    --ok:#34D399; --no:#FB7185; --wait:#FBBF24; --info:#60A5FA;
  }

  .pp-wrap{
    padding: 16px 12px; border-radius: var(--r24);
    background:
      radial-gradient(1000px 600px at 10% 0%, rgba(124,58,237,.24), transparent 60%),
      radial-gradient(1100px 700px at 90% 18%, rgba(6,182,212,.20), transparent 60%),
      radial-gradient(900px 600px at 40% 95%, rgba(16,185,129,.16), transparent 60%),
      linear-gradient(180deg, var(--bg0) 0%, var(--bg1) 46%, var(--bg2) 100%);
    box-shadow: var(--shadow);
    border: 1px solid rgba(255,255,255,.12);
  }

  .head{
    display:flex; justify-content:space-between; align-items:flex-start; gap:12px;
    padding: 14px 14px 0;
  }
  .title{
    margin:0; font-weight: 1000; letter-spacing:.2px;
    background: linear-gradient(90deg, #93C5FD, #34D399, #C4B5FD);
    -webkit-background-clip:text; -webkit-text-fill-color:transparent;
  }
  .sub{ margin:6px 0 0; color: var(--muted); font-weight: 650; }

  .chip{
    display:inline-flex; align-items:center; gap:10px;
    padding: 10px 12px; border-radius: 999px;
    border: 1px solid var(--stroke);
    background: rgba(255,255,255,.06);
    color: var(--text); font-weight: 900; font-size: .9rem;
    box-shadow: var(--shadow2);
  }

  .grid{
    padding: 14px;
    display:grid;
    grid-template-columns: 1fr;
    gap: 12px;
  }

  .card{
    border-radius: var(--r18);
    border: 1px solid rgba(255,255,255,.12);
    background: rgba(255,255,255,.07);
    box-shadow: var(--shadow2);
    padding: 14px;
  }

  .rowx{
    display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap;
  }

  .badge{
    display:inline-flex; align-items:center; gap:10px;
    padding: 8px 12px; border-radius: 999px;
    border: 1px solid transparent;
    font-weight: 980; letter-spacing:.2px;
  }
  .b-ok{ color: var(--ok); background: rgba(52,211,153,.14); border-color: rgba(52,211,153,.35); }
  .b-no{ color: var(--no); background: rgba(251,113,133,.14); border-color: rgba(251,113,133,.35); }
  .b-wait{ color: var(--wait); background: rgba(251,191,36,.14); border-color: rgba(251,191,36,.35); }
  .b-info{ color: var(--info); background: rgba(96,165,250,.14); border-color: rgba(96,165,250,.35); }
  .dot{ width:10px; height:10px; border-radius:50%; background: currentColor; box-shadow: 0 0 0 4px rgba(255,255,255,.06); }

  .btnx{
    display:inline-flex; align-items:center; gap:10px;
    padding: 10px 14px; border-radius: 14px;
    border: 1px solid rgba(255,255,255,.18);
    background: rgba(255,255,255,.08);
    color: var(--text);
    font-weight: 980;
    text-decoration:none;
    box-shadow: var(--shadow2);
  }
  .btnx:hover{ text-decoration:none; color: var(--text); background: rgba(255,255,255,.12); transform: translateY(-1px); }
  .btnx.primary{ border-color: rgba(79,70,229,.55); background: rgba(79,70,229,.18); }

  .input{
    background: rgba(0,0,0,.25) !important;
    border: 1px solid rgba(255,255,255,.16) !important;
    color: var(--text) !important;
    border-radius: 14px !important;
    padding: 11px 12px !important;
    font-weight: 750;
  }
  .input:focus{ box-shadow:none!important; border-color: rgba(6,182,212,.55)!important; }

  .hr{
    height:1px; border:0;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,.18), transparent);
    margin: 12px 0;
  }
</style>

<?php
  $badgeDoc = function($s){
    $x = strtolower(trim($s ?? 'pending'));
    if ($x === 'approved') return ['b-ok', '✅ Approved'];
    if ($x === 'rejected') return ['b-no', '❌ Rejected'];
    if ($x === 'pending')  return ['b-wait','⏳ Pending'];
    return ['b-info','ℹ️ '.($s ?: 'Info')];
  };
?>

<div class="pp-wrap">
  <div class="head">
    <div>
      <h3 class="title">Perbaikan Dokumen</h3>
      <p class="sub">Pilih dokumen yang ditolak, lalu upload ulang. Setelah upload ulang, status kembali <b>pending</b> untuk dicek admin.</p>
    </div>
    <span class="chip">No: <?= esc($pendaftaran['no_pendaftaran'] ?? '-') ?></span>
  </div>

  <div class="grid">

    <?php if (session()->getFlashdata('pesan')): ?>
      <div class="card">
        <div style="color: var(--text); font-weight: 900;">
          <?= session()->getFlashdata('pesan') ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="card">
      <div class="rowx">
        <div>
          <div style="color: var(--muted); font-weight: 800;">Nama</div>
          <div style="color: var(--text); font-weight: 1000; letter-spacing:.2px;">
            <?= esc($pendaftaran['nama_lengkap'] ?? '-') ?>
          </div>
        </div>
        <div>
          <div style="color: var(--muted); font-weight: 800;">NISN</div>
          <div style="color: var(--text); font-weight: 1000; letter-spacing:.2px;">
            <?= esc($pendaftaran['nisn'] ?? '-') ?>
          </div>
        </div>
        <a class="btnx" href="<?= base_url('validasi') ?>">← Kembali ke Validasi</a>
      </div>
      <hr class="hr">
      <div style="color: var(--muted); font-weight: 700;">
        Tips: Upload ulang hanya dokumen yang <b style="color:var(--no)">Rejected</b>.
      </div>
    </div>

    <?php if (!empty($dokumen)): ?>
      <?php foreach ($dokumen as $d): ?>
        <?php
          [$cls, $label] = $badgeDoc($d['status'] ?? 'pending');
          $isRejected = (strtolower(trim($d['status'] ?? 'pending')) === 'rejected');
        ?>
        <div class="card">
          <div class="rowx">
            <div>
              <div style="color: var(--muted); font-weight: 800;">Jenis Dokumen</div>
              <div style="color: var(--text); font-weight: 1000; font-size:1.05rem; letter-spacing:.2px;">
                <?= esc($d['jenis'] ?? '-') ?>
              </div>
            </div>

            <span class="badge <?= esc($cls) ?>">
              <span class="dot"></span>
              <span><?= esc($label) ?></span>
            </span>

            <?php if (!empty($d['file_path'])): ?>
              <a class="btnx" target="_blank" rel="noopener" href="<?= base_url('dokumen/view/'.$d['id']) ?>">👁️ Lihat File</a>
            <?php endif; ?>
          </div>

          <hr class="hr">

          <?php if ($isRejected): ?>
            <form method="post" action="<?= base_url('perbaikan/upload') ?>" enctype="multipart/form-data">
              <?= csrf_field() ?>
              <input type="hidden" name="id_dokumen" value="<?= esc($d['id']) ?>">

              <div class="row" style="margin:0;">
                <div class="col-md-8" style="padding-left:0; padding-right:10px;">
                  <input class="form-control input" type="file" name="file_dokumen" required>
                  <div style="margin-top:8px; color: var(--muted); font-weight: 650;">
                    Format: PDF/JPG/JPEG/PNG. Maksimal sesuai config upload kamu.
                  </div>
                </div>
                <div class="col-md-4" style="padding-left:0; padding-right:0; display:flex; align-items:flex-start;">
                  <button class="btnx primary" type="submit" style="width:100%; justify-content:center;">
                    ⬆ Upload Ulang
                  </button>
                </div>
              </div>
            </form>
          <?php else: ?>
            <div style="color: var(--muted); font-weight: 750;">
              Dokumen ini tidak perlu diperbaiki.
            </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="card">
        <div style="color: var(--muted); font-weight: 900;">
          Dokumen belum tersedia.
        </div>
      </div>
    <?php endif; ?>

  </div>
</div>

<?= $this->endSection() ?>
