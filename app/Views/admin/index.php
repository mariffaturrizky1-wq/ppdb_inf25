<?php
/**
 * Admin Feedback View (CI4)
 * Expected: $feedbacks (array of rows)
 * Each row keys (based on your model):
 * id, nama, jenis_kelamin, keluhan, provinsi, kabupaten, kecamatan, desa, keterangan, foto, created_at, updated_at
 */

$feedbacks = $feedbacks ?? [];

// Helper for safe output
function h($v): string { return esc((string)($v ?? '')); }

// If your "foto" is stored as filename under public/uploads/feedback/ for example,
// set base path here (adjust if needed). If foto already contains full URL, it will be used.
$fotoBase = base_url('uploads/feedback'); // change if your folder differs, e.g. base_url('uploads')
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin • Feedback</title>
  <style>
    :root{
      --bg:#0b1220;
      --panel: rgba(255,255,255,.06);
      --panel2: rgba(255,255,255,.08);
      --text:#e8edf7;
      --muted:#a8b3c7;
      --stroke: rgba(255,255,255,.12);
      --stroke2: rgba(255,255,255,.18);
      --brand:#7c5cff;
      --brand2:#2dd4bf;
      --danger:#ff5c7a;
      --warning:#fbbf24;
      --ok:#34d399;
      --shadow: 0 20px 70px rgba(0,0,0,.45);
      --radius: 18px;
      --radius2: 14px;
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Liberation Sans", sans-serif;
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:var(--font);
      color:var(--text);
      background:
        radial-gradient(1000px 600px at 20% -10%, rgba(124,92,255,.25), transparent 55%),
        radial-gradient(900px 550px at 100% 0%, rgba(45,212,191,.18), transparent 55%),
        radial-gradient(900px 650px at 20% 110%, rgba(251,191,36,.12), transparent 60%),
        linear-gradient(180deg, #070b14, #0b1220 30%, #070b14);
      overflow-x:hidden;
    }

    .wrap{
      max-width: 1200px;
      margin: 0 auto;
      padding: 28px 18px 60px;
    }

    .topbar{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:14px;
      margin-bottom:16px;
    }

    .title{
      display:flex;
      gap:14px;
      align-items:center;
    }

    .badge{
      width:44px;height:44px;border-radius:14px;
      background:
        radial-gradient(circle at 30% 30%, rgba(255,255,255,.25), transparent 45%),
        linear-gradient(135deg, rgba(124,92,255,.9), rgba(45,212,191,.75));
      box-shadow: 0 14px 40px rgba(124,92,255,.22);
      border:1px solid rgba(255,255,255,.18);
      display:grid;place-items:center;
      flex:0 0 auto;
    }
    .badge svg{opacity:.95}

    h1{
      font-size: 22px;
      margin:0;
      line-height:1.2;
      letter-spacing:.2px;
    }
    .subtitle{
      margin:4px 0 0;
      color:var(--muted);
      font-size: 13px;
      line-height:1.4;
    }

    .actions{
      display:flex;
      gap:10px;
      align-items:center;
      flex-wrap:wrap;
      justify-content:flex-end;
    }

    .chip{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:10px 12px;
      border-radius: 999px;
      background: var(--panel);
      border:1px solid var(--stroke);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      color:var(--text);
      font-size:13px;
      box-shadow: 0 10px 26px rgba(0,0,0,.22);
    }
    .chip strong{font-weight:700}
    .chip .dot{
      width:8px;height:8px;border-radius:50%;
      background: linear-gradient(135deg, var(--brand), var(--brand2));
      box-shadow: 0 0 0 4px rgba(124,92,255,.12);
    }

    .panel{
      background: var(--panel);
      border:1px solid var(--stroke);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
      position:relative;
    }
    .panel::before{
      content:"";
      position:absolute; inset:-2px;
      background: radial-gradient(600px 280px at 10% 0%, rgba(124,92,255,.18), transparent 60%),
                  radial-gradient(600px 280px at 100% 20%, rgba(45,212,191,.14), transparent 60%);
      pointer-events:none;
    }
    .panel > *{ position:relative; }

    .toolbar{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
      padding: 14px 14px;
      border-bottom: 1px solid var(--stroke);
      background: rgba(255,255,255,.03);
    }

    .leftTools{
      display:flex;
      gap:10px;
      align-items:center;
      flex-wrap:wrap;
    }

    .rightTools{
      display:flex;
      gap:10px;
      align-items:center;
      flex-wrap:wrap;
      justify-content:flex-end;
    }

    .field{
      display:flex;
      align-items:center;
      gap:8px;
      padding:10px 12px;
      border-radius: 14px;
      background: rgba(255,255,255,.06);
      border: 1px solid var(--stroke);
      min-height: 40px;
    }

    .field input, .field select{
      all:unset;
      color:var(--text);
      font-size: 13px;
      width: 220px;
    }
    .field select{ width: 180px; cursor:pointer; }
    .field input::placeholder{ color: rgba(168,179,199,.75); }

    .btn{
      all:unset;
      cursor:pointer;
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:10px 12px;
      border-radius: 14px;
      border:1px solid var(--stroke);
      background: rgba(255,255,255,.06);
      color:var(--text);
      font-size: 13px;
      transition: transform .08s ease, background .15s ease, border-color .15s ease;
      user-select:none;
    }
    .btn:hover{ background: rgba(255,255,255,.09); border-color: var(--stroke2); }
    .btn:active{ transform: translateY(1px); }

    .btn.primary{
      background: linear-gradient(135deg, rgba(124,92,255,.9), rgba(45,212,191,.65));
      border-color: rgba(255,255,255,.18);
      box-shadow: 0 12px 34px rgba(124,92,255,.18);
    }
    .btn.primary:hover{ filter: brightness(1.04); }
    .btn.danger{
      background: rgba(255,92,122,.12);
      border-color: rgba(255,92,122,.25);
      color: #ffd7df;
    }

    .tableWrap{ overflow:auto; }
    table{
      width:100%;
      border-collapse:separate;
      border-spacing:0;
      min-width: 980px;
    }
    thead th{
      text-align:left;
      font-size: 12px;
      color: rgba(232,237,247,.82);
      padding: 12px 14px;
      position:sticky;
      top:0;
      background: rgba(10,16,30,.92);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--stroke);
      z-index:2;
      letter-spacing:.3px;
      text-transform: uppercase;
    }
    tbody td{
      padding: 14px 14px;
      border-bottom: 1px solid rgba(255,255,255,.08);
      vertical-align: top;
      font-size: 13px;
      color: rgba(232,237,247,.92);
    }
    tbody tr:hover td{
      background: rgba(255,255,255,.035);
    }

    .col-id{ width:78px; color:rgba(168,179,199,.95); font-variant-numeric: tabular-nums; }
    .name{
      display:flex; align-items:center; gap:10px;
      min-width: 220px;
    }
    .avatar{
      width:32px; height:32px; border-radius: 12px;
      background: linear-gradient(135deg, rgba(124,92,255,.55), rgba(45,212,191,.35));
      border:1px solid rgba(255,255,255,.15);
      display:grid; place-items:center;
      flex:0 0 auto;
      box-shadow: 0 10px 26px rgba(0,0,0,.18);
    }
    .avatar span{
      font-size: 12px;
      font-weight: 800;
      color: rgba(255,255,255,.92);
      letter-spacing:.4px;
    }
    .nameBlock{ display:flex; flex-direction:column; gap:3px; }
    .nameBlock .n{ font-weight: 750; line-height:1.2; }
    .nameBlock .loc{ color: var(--muted); font-size: 12px; line-height:1.2; max-width: 320px; }

    .pill{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding: 6px 10px;
      border-radius: 999px;
      border: 1px solid var(--stroke);
      background: rgba(255,255,255,.05);
      font-size: 12px;
      color: rgba(232,237,247,.9);
      white-space:nowrap;
    }
    .pill .miniDot{ width:7px; height:7px; border-radius:50%; background: rgba(168,179,199,.8); }
    .pill.male .miniDot{ background: rgba(124,92,255,.95); }
    .pill.female .miniDot{ background: rgba(45,212,191,.95); }

    .clip{
      display:-webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow:hidden;
      color: rgba(232,237,247,.88);
      max-width: 520px;
    }

    .muted{ color: var(--muted); font-size:12px; }

    .rowActions{
      display:flex;
      align-items:center;
      gap:8px;
      justify-content:flex-end;
      min-width: 180px;
    }

    .icon{
      width:16px;height:16px; opacity:.9;
    }

    .footer{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
      padding: 12px 14px;
      background: rgba(255,255,255,.03);
      border-top: 1px solid var(--stroke);
      flex-wrap:wrap;
    }
    .pagination{
      display:flex; gap:8px; align-items:center; flex-wrap:wrap;
    }
    .pageBtn{
      all:unset;
      cursor:pointer;
      padding: 8px 10px;
      border-radius: 12px;
      border: 1px solid var(--stroke);
      background: rgba(255,255,255,.06);
      font-size: 12px;
      color: rgba(232,237,247,.9);
      min-width: 38px;
      text-align:center;
    }
    .pageBtn:hover{ border-color: var(--stroke2); background: rgba(255,255,255,.09); }
    .pageBtn[disabled]{ opacity:.45; cursor:not-allowed; }
    .pageBtn.active{
      background: linear-gradient(135deg, rgba(124,92,255,.8), rgba(45,212,191,.55));
      border-color: rgba(255,255,255,.18);
    }

    /* Modal */
    .modalBack{
      position:fixed; inset:0;
      background: rgba(0,0,0,.55);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      display:none;
      align-items:flex-end;
      justify-content:center;
      z-index:50;
      padding: 18px;
    }
    .modalBack.show{ display:flex; }
    .modal{
      width:min(980px, 100%);
      background: rgba(10,16,30,.92);
      border: 1px solid rgba(255,255,255,.16);
      border-radius: 22px;
      box-shadow: 0 30px 100px rgba(0,0,0,.6);
      overflow:hidden;
      transform: translateY(10px);
      animation: pop .18s ease forwards;
    }
    @keyframes pop{ to{ transform: translateY(0);} }

    .modalHeader{
      display:flex; align-items:flex-start; justify-content:space-between;
      gap:12px;
      padding: 16px 16px;
      border-bottom: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.03);
    }
    .modalTitle{
      display:flex; flex-direction:column; gap:4px;
    }
    .modalTitle .h{ font-size: 15px; font-weight: 800; }
    .modalTitle .s{ font-size: 12px; color: var(--muted); }

    .modalBody{
      display:grid;
      grid-template-columns: 1.3fr .7fr;
      gap: 14px;
      padding: 14px 16px 16px;
    }
    @media (max-width: 860px){
      .modalBody{ grid-template-columns: 1fr; }
      .field input{ width: 180px; }
      .field select{ width: 160px; }
    }

    .card{
      background: rgba(255,255,255,.04);
      border: 1px solid rgba(255,255,255,.10);
      border-radius: 18px;
      padding: 14px;
    }
    .card h3{
      margin:0 0 10px;
      font-size: 12px;
      letter-spacing: .35px;
      text-transform: uppercase;
      color: rgba(232,237,247,.86);
    }

    .kv{
      display:grid;
      grid-template-columns: 160px 1fr;
      gap: 8px 12px;
      font-size: 13px;
    }
    .kv .k{ color: var(--muted); }
    .kv .v{ color: rgba(232,237,247,.92); }
    .kv .v pre{
      margin:0;
      white-space:pre-wrap;
      word-break:break-word;
      font-family: var(--font);
      line-height: 1.5;
    }

    .photoBox{
      display:flex;
      flex-direction:column;
      gap:10px;
    }
    .photo{
      width:100%;
      aspect-ratio: 4/3;
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.03);
      overflow:hidden;
      display:grid;
      place-items:center;
    }
    .photo img{
      width:100%;
      height:100%;
      object-fit:cover;
      display:block;
    }
    .emptyPhoto{
      color: rgba(168,179,199,.8);
      font-size: 12px;
      text-align:center;
      padding: 12px;
    }

    /* Toast */
    .toast{
      position: fixed;
      right: 16px;
      bottom: 16px;
      z-index: 80;
      display:none;
      background: rgba(10,16,30,.92);
      border:1px solid rgba(255,255,255,.16);
      border-radius: 16px;
      padding: 12px 12px;
      box-shadow: 0 20px 70px rgba(0,0,0,.5);
      max-width: 340px;
      color: rgba(232,237,247,.95);
      font-size: 13px;
    }
    .toast.show{ display:block; animation: pop .18s ease forwards; }

    /* Small */
    .kbd{
      padding:2px 8px;
      border-radius: 10px;
      border:1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.05);
      font-size: 12px;
      color: rgba(232,237,247,.85);
    }

    .sep{ opacity:.55; padding:0 6px; }

    .hint{
      color: rgba(168,179,199,.85);
      font-size: 12px;
      margin-top:10px;
    }

    /* Print */
    @media print{
      body{ background:#fff; color:#000; }
      .panel, .chip, .toolbar, .footer, .modalBack, .toast{ display:none !important; }
    }

    /* ==== BRAND TITLE FULL WHITE ==== */
.brand-text,
.brand-text.font-weight-light,
.brand-text small{
  color: #ffffff !important;
}

  </style>
</head>

<body>
<div class="wrap">

  <div class="topbar">
    <div class="title">
      <div class="badge" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
          <path d="M7 7h10v10H7V7Z" stroke="white" stroke-width="1.6" opacity=".9"/>
          <path d="M4 10V6a2 2 0 0 1 2-2h4" stroke="white" stroke-width="1.6" opacity=".9"/>
          <path d="M20 14v4a2 2 0 0 1-2 2h-4" stroke="white" stroke-width="1.6" opacity=".9"/>
        </svg>
      </div>
      <div>
        <h1>Daftar Feedback</h1>
        <p class="subtitle">
          Panel admin untuk melihat masukan dari pengguna. Gunakan pencarian, filter, dan klik <span class="kbd">Detail</span> untuk melihat isi lengkap.
        </p>
      </div>
    </div>

    <div class="actions">
      <div class="chip" title="Jumlah data">
        <span class="dot"></span>
        Total: <strong id="countTotal"><?= count($feedbacks) ?></strong>
      </div>

      <button class="btn primary" id="btnExport" type="button" title="Export CSV">
        <svg class="icon" viewBox="0 0 24 24" fill="none">
          <path d="M12 3v10" stroke="white" stroke-width="1.6" stroke-linecap="round"/>
          <path d="m8 9 4 4 4-4" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2" stroke="white" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
        Export CSV
      </button>

      <button class="btn" id="btnCopy" type="button" title="Copy tabel">
        <svg class="icon" viewBox="0 0 24 24" fill="none">
          <path d="M9 9h10v10H9V9Z" stroke="white" stroke-width="1.6" opacity=".9"/>
          <path d="M5 15H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1" stroke="white" stroke-width="1.6" opacity=".9"/>
        </svg>
        Copy
      </button>
    </div>
  </div>

  <div class="panel">
    <div class="toolbar">
      <div class="leftTools">
        <div class="field" title="Cari nama, keluhan, atau lokasi">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Z" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M16.5 16.5 21 21" stroke="white" stroke-width="1.6" stroke-linecap="round" opacity=".9"/>
          </svg>
          <input id="q" type="search" placeholder="Cari feedback..." autocomplete="off">
        </div>

        <div class="field" title="Filter jenis kelamin">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path d="M12 3c3.314 0 6 2.239 6 5s-2.686 5-6 5-6-2.239-6-5 2.686-5 6-5Z" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M12 13v8" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M8 17h8" stroke="white" stroke-width="1.6" opacity=".9"/>
          </svg>
          <select id="gender">
            <option value="">Semua</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>

        <div class="field" title="Urutkan">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path d="M8 7h12" stroke="white" stroke-width="1.6" stroke-linecap="round" opacity=".9"/>
            <path d="M4 7h0" stroke="white" stroke-width="3" stroke-linecap="round" opacity=".9"/>
            <path d="M8 12h12" stroke="white" stroke-width="1.6" stroke-linecap="round" opacity=".9"/>
            <path d="M4 12h0" stroke="white" stroke-width="3" stroke-linecap="round" opacity=".9"/>
            <path d="M8 17h12" stroke="white" stroke-width="1.6" stroke-linecap="round" opacity=".9"/>
            <path d="M4 17h0" stroke="white" stroke-width="3" stroke-linecap="round" opacity=".9"/>
          </svg>
          <select id="sort">
            <option value="created_desc">Terbaru</option>
            <option value="created_asc">Terlama</option>
            <option value="nama_asc">Nama A → Z</option>
            <option value="nama_desc">Nama Z → A</option>
          </select>
        </div>
      </div>

      <div class="rightTools">
        <button class="btn" id="btnReset" type="button" title="Reset filter">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path d="M21 12a9 9 0 1 1-2.64-6.36" stroke="white" stroke-width="1.6" stroke-linecap="round" opacity=".9"/>
            <path d="M21 3v6h-6" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" opacity=".9"/>
          </svg>
          Reset
        </button>

        <div class="chip" title="Tips">
          <span class="dot"></span>
          Tips: <span class="muted">Cari cepat</span> <span class="sep">•</span> <span class="kbd">Ctrl</span> + <span class="kbd">F</span>
        </div>
      </div>
    </div>

    <div class="tableWrap">
      <table id="tbl" aria-label="Tabel feedback">
        <thead>
          <tr>
            <th class="col-id">ID</th>
            <th>Pengirim</th>
            <th>JK</th>
            <th>Keluhan</th>
            <th>Waktu</th>
            <th style="text-align:right; padding-right:18px;">Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php if (empty($feedbacks)): ?>
            <tr>
              <td colspan="6" style="padding:18px;">
                <div class="muted">Belum ada data feedback.</div>
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($feedbacks as $row): ?>
              <?php
                $id = $row['id'] ?? '';
                $nama = $row['nama'] ?? '';
                $jk = $row['jenis_kelamin'] ?? '';
                $keluhan = $row['keluhan'] ?? '';
                $prov = $row['provinsi'] ?? '';
                $kab = $row['kabupaten'] ?? '';
                $kec = $row['kecamatan'] ?? '';
                $desa = $row['desa'] ?? '';
                $ket = $row['keterangan'] ?? '';
                $foto = $row['foto'] ?? '';
                $created = $row['created_at'] ?? ($row['updated_at'] ?? '');
                $loc = trim(implode(', ', array_filter([$desa, $kec, $kab, $prov])));
                $initial = mb_strtoupper(mb_substr(trim((string)$nama) ?: 'U', 0, 1));
              ?>
              <tr
                class="row"
                data-id="<?= h($id) ?>"
                data-nama="<?= h($nama) ?>"
                data-jk="<?= h($jk) ?>"
                data-keluhan="<?= h($keluhan) ?>"
                data-prov="<?= h($prov) ?>"
                data-kab="<?= h($kab) ?>"
                data-kec="<?= h($kec) ?>"
                data-desa="<?= h($desa) ?>"
                data-ket="<?= h($ket) ?>"
                data-foto="<?= h($foto) ?>"
                data-created="<?= h($created) ?>"
              >
                <td class="col-id"><?= h($id) ?></td>
                <td>
                  <div class="name">
                    <div class="avatar" aria-hidden="true"><span><?= h($initial) ?></span></div>
                    <div class="nameBlock">
                      <div class="n"><?= h($nama) ?></div>
                      <div class="loc"><?= h($loc ?: '—') ?></div>
                    </div>
                  </div>
                </td>
                <td>
                  <?php
                    $cls = '';
                    if ($jk === 'Laki-laki') $cls = 'male';
                    if ($jk === 'Perempuan') $cls = 'female';
                  ?>
                  <span class="pill <?= $cls ?>">
                    <span class="miniDot"></span>
                    <?= h($jk ?: '—') ?>
                  </span>
                </td>
                <td>
                  <div class="clip"><?= h($keluhan ?: '—') ?></div>
                  <?php if (!empty($ket)): ?>
                    <div class="muted" style="margin-top:6px;">Ada keterangan tambahan</div>
                  <?php endif; ?>
                </td>
                <td>
                  <div><?= h($created ?: '—') ?></div>
                  <div class="muted">ID: <?= h($id) ?></div>
                </td>
                <td>
                  <div class="rowActions">
                    <button class="btn" type="button" data-action="detail" title="Lihat detail">
                      <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" stroke="white" stroke-width="1.6" opacity=".9"/>
                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" stroke="white" stroke-width="1.6" opacity=".9"/>
                      </svg>
                      Detail
                    </button>
                    <button class="btn" type="button" data-action="copyrow" title="Copy ringkas">
                      <svg class="icon" viewBox="0 0 24 24" fill="none">
                        <path d="M9 9h10v10H9V9Z" stroke="white" stroke-width="1.6" opacity=".9"/>
                        <path d="M5 15H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1" stroke="white" stroke-width="1.6" opacity=".9"/>
                      </svg>
                      Copy
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="footer">
      <div class="muted">
        Menampilkan <strong id="shownCount">0</strong> dari <strong id="totalCount"><?= count($feedbacks) ?></strong>.
      </div>

      <div class="pagination">
        <button class="pageBtn" id="prevBtn" type="button">Prev</button>
        <span class="muted">Hal</span>
        <span class="pageBtn active" id="pageInfo" style="cursor:default;">1</span>
        <span class="muted">dari</span>
        <span class="pageBtn" id="pageTotal" style="cursor:default; background:rgba(255,255,255,.04);">1</span>
        <button class="pageBtn" id="nextBtn" type="button">Next</button>

        <span class="sep">•</span>

        <div class="field" title="Baris per halaman">
          <select id="perPage">
            <option value="10">10 / hal</option>
            <option value="20" selected>20 / hal</option>
            <option value="50">50 / hal</option>
            <option value="100">100 / hal</option>
          </select>
        </div>
      </div>
    </div>

  </div>

  <div class="hint">
    Catatan: Jika kolom <b>foto</b> berisi nama file, pastikan file tersimpan di folder <span class="kbd">public/uploads/feedback</span>
    (atau ubah variabel <span class="kbd">$fotoBase</span> di bagian atas file ini).
  </div>

</div>

<!-- Modal -->
<div class="modalBack" id="modalBack" aria-hidden="true">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="mTitle">
    <div class="modalHeader">
      <div class="modalTitle">
        <div class="h" id="mTitle">Detail Feedback</div>
        <div class="s" id="mSub">—</div>
      </div>
      <button class="btn" id="btnClose" type="button" title="Tutup">
        <svg class="icon" viewBox="0 0 24 24" fill="none">
          <path d="M6 6l12 12M18 6 6 18" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        Tutup
      </button>
    </div>

    <div class="modalBody">
      <div class="card">
        <h3>Informasi</h3>
        <div class="kv">
          <div class="k">ID</div><div class="v" id="d_id">—</div>
          <div class="k">Nama</div><div class="v" id="d_nama">—</div>
          <div class="k">Jenis Kelamin</div><div class="v" id="d_jk">—</div>
          <div class="k">Lokasi</div><div class="v" id="d_lokasi">—</div>
          <div class="k">Waktu</div><div class="v" id="d_created">—</div>
        </div>
      </div>

      <div class="card photoBox">
        <h3>Foto</h3>
        <div class="photo" id="photoWrap">
          <div class="emptyPhoto" id="photoEmpty">Tidak ada foto.</div>
          <img id="photoImg" alt="Foto feedback" style="display:none;">
        </div>
        <div class="muted" id="photoMeta"></div>
      </div>

      <div class="card" style="grid-column: 1 / -1;">
        <h3>Keluhan</h3>
        <div class="kv" style="grid-template-columns: 120px 1fr;">
          <div class="k">Keluhan</div>
          <div class="v"><pre id="d_keluhan">—</pre></div>

          <div class="k">Keterangan</div>
          <div class="v"><pre id="d_ket">—</pre></div>
        </div>
      </div>

      <div class="card" style="grid-column: 1 / -1; display:flex; gap:10px; justify-content:flex-end;">
        <button class="btn" id="btnCopyDetail" type="button">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path d="M9 9h10v10H9V9Z" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M5 15H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1" stroke="white" stroke-width="1.6" opacity=".9"/>
          </svg>
          Copy Detail
        </button>
        <button class="btn primary" id="btnPrint" type="button">
          <svg class="icon" viewBox="0 0 24 24" fill="none">
            <path d="M6 9V4h12v5" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M6 18h12v2H6v-2Z" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M6 14h12v4H6v-4Z" stroke="white" stroke-width="1.6" opacity=".9"/>
            <path d="M8 14v-3h8v3" stroke="white" stroke-width="1.6" opacity=".9"/>
          </svg>
          Print
        </button>
      </div>
    </div>
  </div>
</div>

<div class="toast" id="toast">Copied</div>

<script>
  // Data from server is already in the table; we enhance UX client-side.
  const $ = (s, el=document) => el.querySelector(s);
  const $$ = (s, el=document) => Array.from(el.querySelectorAll(s));

  const state = {
    q: '',
    gender: '',
    sort: 'created_desc',
    page: 1,
    perPage: 20,
    rows: []
  };

  const tbody = $('#tbody');
  const rows = $$('.row', tbody);

  // Snapshot row data for sorting/filtering/paging without reloading
  state.rows = rows.map(tr => ({
    el: tr,
    id: tr.dataset.id || '',
    nama: tr.dataset.nama || '',
    jk: tr.dataset.jk || '',
    keluhan: tr.dataset.keluhan || '',
    prov: tr.dataset.prov || '',
    kab: tr.dataset.kab || '',
    kec: tr.dataset.kec || '',
    desa: tr.dataset.desa || '',
    ket: tr.dataset.ket || '',
    foto: tr.dataset.foto || '',
    created: tr.dataset.created || ''
  }));

  const normalize = (s) => (s || '').toString().toLowerCase().trim();

  function parseDateSmart(s){
    // Try Date() fallback; if invalid, return 0 to keep stable ordering.
    const t = Date.parse(s);
    return Number.isFinite(t) ? t : 0;
  }

  function apply(){
    const q = normalize(state.q);
    const g = state.gender;

    // filter
    let filtered = state.rows.filter(r => {
      if (g && r.jk !== g) return false;
      if (!q) return true;

      const hay = normalize([
        r.id, r.nama, r.jk, r.keluhan,
        r.prov, r.kab, r.kec, r.desa, r.ket,
        r.created
      ].join(' '));

      return hay.includes(q);
    });

    // sort
    const sort = state.sort;
    filtered.sort((a,b) => {
      if (sort === 'nama_asc') return a.nama.localeCompare(b.nama, 'id');
      if (sort === 'nama_desc') return b.nama.localeCompare(a.nama, 'id');
      if (sort === 'created_asc') return parseDateSmart(a.created) - parseDateSmart(b.created);
      return parseDateSmart(b.created) - parseDateSmart(a.created); // created_desc default
    });

    // pagination
    const total = filtered.length;
    const per = state.perPage;
    const pages = Math.max(1, Math.ceil(total / per));
    state.page = Math.min(state.page, pages);

    const start = (state.page - 1) * per;
    const pageItems = filtered.slice(start, start + per);

    // hide all then show selected
    state.rows.forEach(r => r.el.style.display = 'none');
    pageItems.forEach(r => r.el.style.display = '');

    $('#shownCount').textContent = String(pageItems.length);
    $('#totalCount').textContent = String(state.rows.length);
    $('#countTotal').textContent = String(state.rows.length);

    $('#pageInfo').textContent = String(state.page);
    $('#pageTotal').textContent = String(pages);

    $('#prevBtn').disabled = state.page <= 1;
    $('#nextBtn').disabled = state.page >= pages;

    // If no results, show a message row (create once)
    let emptyRow = $('#emptyRow');
    if (total === 0){
      if (!emptyRow){
        emptyRow = document.createElement('tr');
        emptyRow.id = 'emptyRow';
        emptyRow.innerHTML = `
          <td colspan="6" style="padding:18px;">
            <div class="muted">Tidak ada data yang cocok dengan filter/pencarian.</div>
          </td>`;
        tbody.appendChild(emptyRow);
      }
      emptyRow.style.display = '';
    } else if (emptyRow){
      emptyRow.style.display = 'none';
    }
  }

  function toast(msg){
    const t = $('#toast');
    t.textContent = msg;
    t.classList.add('show');
    clearTimeout(window.__toastTimer);
    window.__toastTimer = setTimeout(()=>t.classList.remove('show'), 1100);
  }

  function copyText(text){
    if (!navigator.clipboard){
      // fallback
      const ta = document.createElement('textarea');
      ta.value = text;
      document.body.appendChild(ta);
      ta.select();
      document.execCommand('copy');
      ta.remove();
      toast('Copied!');
      return;
    }
    navigator.clipboard.writeText(text).then(()=>toast('Copied!'));
  }

  // Controls
  $('#q').addEventListener('input', (e)=>{
    state.q = e.target.value || '';
    state.page = 1;
    apply();
  });
  $('#gender').addEventListener('change', (e)=>{
    state.gender = e.target.value || '';
    state.page = 1;
    apply();
  });
  $('#sort').addEventListener('change', (e)=>{
    state.sort = e.target.value || 'created_desc';
    apply();
  });
  $('#perPage').addEventListener('change', (e)=>{
    state.perPage = Number(e.target.value || 20);
    state.page = 1;
    apply();
  });

  $('#prevBtn').addEventListener('click', ()=>{
    state.page = Math.max(1, state.page - 1);
    apply();
  });
  $('#nextBtn').addEventListener('click', ()=>{
    state.page = state.page + 1;
    apply();
  });

  $('#btnReset').addEventListener('click', ()=>{
    state.q = '';
    state.gender = '';
    state.sort = 'created_desc';
    state.page = 1;
    state.perPage = 20;

    $('#q').value = '';
    $('#gender').value = '';
    $('#sort').value = 'created_desc';
    $('#perPage').value = '20';
    apply();
    toast('Reset OK');
  });

  // Copy entire visible table (simple)
  $('#btnCopy').addEventListener('click', ()=>{
    const visible = state.rows.filter(r => r.el.style.display !== 'none');
    const lines = visible.map(r => {
      const loc = [r.desa, r.kec, r.kab, r.prov].filter(Boolean).join(', ');
      return `${r.id}\t${r.nama}\t${r.jk}\t${(r.keluhan||'').replace(/\s+/g,' ').trim()}\t${loc}\t${r.created}`;
    });
    copyText(lines.join('\n') || 'Tidak ada baris yang terlihat.');
  });

  // Export CSV of filtered results (not only visible page)
  $('#btnExport').addEventListener('click', ()=>{
    // rebuild filtered in same way as apply() but without paging
    const q = (state.q || '').toLowerCase().trim();
    const g = state.gender;

    let filtered = state.rows.filter(r => {
      if (g && r.jk !== g) return false;
      if (!q) return true;
      const hay = [
        r.id, r.nama, r.jk, r.keluhan, r.prov, r.kab, r.kec, r.desa, r.ket, r.created
      ].join(' ').toLowerCase();
      return hay.includes(q);
    });

    const escCsv = (s) => {
      s = (s ?? '').toString();
      if (/[",\n]/.test(s)) s = `"${s.replace(/"/g,'""')}"`;
      return s;
    };

    const header = ['id','nama','jenis_kelamin','keluhan','provinsi','kabupaten','kecamatan','desa','keterangan','foto','created_at'];
    const rowsCsv = filtered.map(r => ([
      r.id, r.nama, r.jk, r.keluhan, r.prov, r.kab, r.kec, r.desa, r.ket, r.foto, r.created
    ]).map(escCsv).join(','));

    const csv = header.join(',') + '\n' + rowsCsv.join('\n');
    const blob = new Blob([csv], {type:'text/csv;charset=utf-8;'});
    const a = document.createElement('a');
    const url = URL.createObjectURL(blob);
    a.href = url;
    a.download = 'feedback_export.csv';
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
    toast('CSV exported');
  });

  // Modal detail
  const modalBack = $('#modalBack');
  const btnClose = $('#btnClose');
  const photoImg = $('#photoImg');
  const photoEmpty = $('#photoEmpty');
  const photoMeta = $('#photoMeta');

  function openModal(r){
    const lokasi = [r.desa, r.kec, r.kab, r.prov].filter(Boolean).join(', ') || '—';
    $('#mSub').textContent = `ID ${r.id || '—'} • ${r.created || '—'}`;

    $('#d_id').textContent = r.id || '—';
    $('#d_nama').textContent = r.nama || '—';
    $('#d_jk').textContent = r.jk || '—';
    $('#d_lokasi').textContent = lokasi;
    $('#d_created').textContent = r.created || '—';
    $('#d_keluhan').textContent = r.keluhan || '—';
    $('#d_ket').textContent = r.ket || '—';

    // Foto handling:
    const foto = (r.foto || '').trim();
    if (!foto){
      photoImg.style.display = 'none';
      photoEmpty.style.display = '';
      photoMeta.textContent = '—';
    } else {
      // If looks like URL, use it; else use base from PHP
      const base = <?= json_encode($fotoBase) ?>;
      const url = /^https?:\/\//i.test(foto) ? foto : (base.replace(/\/$/,'') + '/' + foto.replace(/^\//,''));
      photoImg.src = url;
      photoImg.style.display = '';
      photoEmpty.style.display = 'none';
      photoMeta.textContent = foto;

      photoImg.onerror = () => {
        photoImg.style.display = 'none';
        photoEmpty.style.display = '';
        photoMeta.textContent = 'Foto tidak ditemukan: ' + foto;
      };
    }

    // store current
    window.__currentRow = r;

    modalBack.classList.add('show');
    modalBack.setAttribute('aria-hidden','false');
  }

  function closeModal(){
    modalBack.classList.remove('show');
    modalBack.setAttribute('aria-hidden','true');
  }

  btnClose.addEventListener('click', closeModal);
  modalBack.addEventListener('click', (e)=>{
    if (e.target === modalBack) closeModal();
  });
  window.addEventListener('keydown', (e)=>{
    if (e.key === 'Escape') closeModal();
  });

  // Row action handler
  tbody.addEventListener('click', (e)=>{
    const btn = e.target.closest('button[data-action]');
    if (!btn) return;
    const tr = e.target.closest('tr.row');
    if (!tr) return;

    const r = {
      id: tr.dataset.id || '',
      nama: tr.dataset.nama || '',
      jk: tr.dataset.jk || '',
      keluhan: tr.dataset.keluhan || '',
      prov: tr.dataset.prov || '',
      kab: tr.dataset.kab || '',
      kec: tr.dataset.kec || '',
      desa: tr.dataset.desa || '',
      ket: tr.dataset.ket || '',
      foto: tr.dataset.foto || '',
      created: tr.dataset.created || ''
    };

    const act = btn.dataset.action;
    if (act === 'detail') openModal(r);
    if (act === 'copyrow'){
      const loc = [r.desa, r.kec, r.kab, r.prov].filter(Boolean).join(', ');
      copyText(`ID: ${r.id}\nNama: ${r.nama}\nJK: ${r.jk}\nWaktu: ${r.created}\nLokasi: ${loc}\nKeluhan: ${r.keluhan}\nKeterangan: ${r.ket}`);
    }
  });

  $('#btnCopyDetail').addEventListener('click', ()=>{
    const r = window.__currentRow || {};
    const loc = [r.desa, r.kec, r.kab, r.prov].filter(Boolean).join(', ');
    copyText(`ID: ${r.id}\nNama: ${r.nama}\nJK: ${r.jk}\nWaktu: ${r.created}\nLokasi: ${loc}\nKeluhan: ${r.keluhan}\nKeterangan: ${r.ket}\nFoto: ${r.foto || '-'}`);
  });

  $('#btnPrint').addEventListener('click', ()=>{
    window.print();
  });

  // initial
  apply();
</script>
</body>
</html>
