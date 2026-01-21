<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun | PPDB Online</title>

  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">

  <style>
    :root{
      --bg1:#071227;
      --bg2:#0b255a;
      --bg3:#091a3b;
      --card: rgba(255,255,255,.08);
      --card2: rgba(255,255,255,.10);
      --stroke: rgba(255,255,255,.16);
      --text: rgba(255,255,255,.92);
      --muted: rgba(255,255,255,.70);
      --brand1:#f6c74f;
      --brand2:#4fd1c5;
      --shadow: 0 30px 90px rgba(0,0,0,.45);
      --radius: 22px;
      --radius2: 18px;
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Liberation Sans", sans-serif;
    }

    *{box-sizing:border-box}
    body{
      min-height:100vh;
      margin:0;
      font-family:var(--font);
      color:var(--text);
      background:
        radial-gradient(900px 520px at 20% 10%, rgba(79,209,197,.18), transparent 55%),
        radial-gradient(900px 520px at 85% 0%, rgba(246,199,79,.14), transparent 58%),
        linear-gradient(135deg, var(--bg1), var(--bg2), var(--bg3));
      overflow-x:hidden;
      display:flex;
      align-items:center;
      justify-content:center;
      padding: 28px 16px;
    }

    /* dekorasi kecil */
    .stars{
      position:fixed; inset:0;
      pointer-events:none;
      opacity:.55;
      background-image:
        radial-gradient(circle at 10% 20%, rgba(255,255,255,.18) 0 2px, transparent 3px),
        radial-gradient(circle at 40% 80%, rgba(255,255,255,.14) 0 1.6px, transparent 3px),
        radial-gradient(circle at 70% 30%, rgba(255,255,255,.13) 0 1.8px, transparent 3px),
        radial-gradient(circle at 90% 60%, rgba(255,255,255,.12) 0 2px, transparent 3px);
      background-size: 520px 520px;
      animation: drift 14s linear infinite;
    }
    @keyframes drift{
      from{ transform: translate3d(0,0,0) }
      to{ transform: translate3d(-60px, 40px, 0) }
    }

    .shell{
      width: min(1060px, 100%);
      display:grid;
      grid-template-columns: 1.35fr .9fr;
      gap: 18px;
      align-items: stretch;
    }
    @media (max-width: 980px){
      .shell{ grid-template-columns: 1fr; }
    }

    .panel{
      background: var(--card);
      border: 1px solid var(--stroke);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      overflow:hidden;
      position:relative;
    }
    .panel::before{
      content:"";
      position:absolute; inset:-2px;
      background:
        radial-gradient(520px 260px at 15% 0%, rgba(246,199,79,.16), transparent 60%),
        radial-gradient(520px 260px at 100% 10%, rgba(79,209,197,.14), transparent 60%);
      pointer-events:none;
    }
    .panel > *{ position:relative; }

    /* kiri */
    .hero{
      padding: 28px 26px;
      display:flex;
      flex-direction:column;
      gap: 16px;
      min-height: 420px;
    }
    .brand{
      display:flex;
      align-items:center;
      gap:12px;
    }
    .logo{
      width:44px; height:44px;
      border-radius: 14px;
      display:grid; place-items:center;
      background: linear-gradient(135deg, rgba(246,199,79,.95), rgba(79,209,197,.75));
      box-shadow: 0 14px 40px rgba(0,0,0,.25);
      border: 1px solid rgba(255,255,255,.22);
      color:#0b1736;
      font-weight:900;
    }
    .brand h1{
      margin:0;
      font-size: 16px;
      font-weight: 800;
      letter-spacing:.2px;
    }
    .brand p{
      margin:2px 0 0;
      font-size: 12px;
      color: var(--muted);
    }

    .headline{
      margin-top: 6px;
      font-size: 34px;
      line-height:1.1;
      font-weight: 900;
      letter-spacing: .2px;
    }
    .headline .accent{
      background: linear-gradient(135deg, var(--brand1), var(--brand2));
      -webkit-background-clip: text;
      background-clip:text;
      color: transparent;
    }
    .desc{
      margin:0;
      color: var(--muted);
      font-size: 13px;
      line-height: 1.6;
      max-width: 48ch;
    }
    .chips{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      margin-top: 6px;
    }
    .chip{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:10px 12px;
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.16);
      background: rgba(255,255,255,.06);
      color: rgba(255,255,255,.88);
      font-size: 12px;
    }
    .chip i{ opacity:.9; }

    .miniRow{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
      margin-top: 10px;
    }
    @media (max-width: 980px){
      .miniRow{ grid-template-columns: 1fr; }
    }
    .mini{
      padding: 14px 14px;
      border-radius: var(--radius2);
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      display:flex;
      gap:10px;
      align-items:flex-start;
    }
    .mini .ic{
      width:36px; height:36px;
      border-radius: 14px;
      display:grid; place-items:center;
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.12);
      flex:0 0 auto;
    }
    .mini .t{ font-weight:800; font-size: 13px; margin:0; }
    .mini .s{ margin:3px 0 0; color: var(--muted); font-size: 12px; }

    .pills{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      margin-top:auto;
      padding-top: 8px;
    }
    .pill{
      font-size: 11px;
      padding: 7px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.05);
      color: rgba(255,255,255,.82);
    }

    /* kanan (form) */
    .formCard{
      padding: 18px 18px;
      display:flex;
      flex-direction:column;
      gap: 12px;
      min-height: 420px;
    }
    .formTop{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
      padding: 6px 2px 10px;
    }
    .formTop .ttl{
      display:flex;
      flex-direction:column;
      gap:4px;
    }
    .formTop .ttl b{ font-size: 15px; }
    .formTop .ttl span{ font-size: 12px; color: var(--muted); }

    .circleBtn{
      width:40px;height:40px;
      border-radius: 14px;
      border:1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      display:grid; place-items:center;
      color: rgba(255,255,255,.9);
      cursor:pointer;
      transition: .15s ease;
      user-select:none;
      text-decoration:none;
    }
    .circleBtn:hover{ background: rgba(255,255,255,.10); border-color: rgba(255,255,255,.20); }

    .field{
      position:relative;
      margin-bottom: 10px;
    }
    .inp{
      width:100%;
      height: 48px;
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.07);
      color: rgba(255,255,255,.92);
      padding: 0 44px 0 44px;
      outline:none;
      font-size: 13px;
    }
    .inp::placeholder{ color: rgba(255,255,255,.55); }
    .inp:focus{
      border-color: rgba(255,255,255,.28);
      box-shadow: 0 0 0 4px rgba(79,209,197,.14);
    }

    .leftIcon, .rightIcon{
      position:absolute;
      top:50%;
      transform:translateY(-50%);
      width:34px; height:34px;
      border-radius: 14px;
      display:grid;
      place-items:center;
      color: rgba(255,255,255,.86);
      pointer-events:none;
    }
    .leftIcon{ left:8px; background: rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.10); }
    .rightIcon{
      right:8px;
      background: rgba(255,255,255,.05);
      border:1px solid rgba(255,255,255,.10);
      pointer-events:auto;
      cursor:pointer;
      user-select:none;
    }

    .strength{
      display:flex;
      align-items:center;
      gap:10px;
      margin: 2px 2px 6px;
    }
    .strength small{ color: var(--muted); font-size: 11px; width:70px; }
    .bar{
      height: 6px;
      border-radius: 999px;
      background: rgba(255,255,255,.10);
      overflow:hidden;
      flex:1;
      border: 1px solid rgba(255,255,255,.10);
    }
    .bar > i{
      display:block;
      height:100%;
      width: 0%;
      background: linear-gradient(90deg, #ff6b6b, #f6c74f, #4fd1c5);
      transition: width .18s ease;
    }

    .row2{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      margin-top: 2px;
      flex-wrap:wrap;
    }
    .check{
      display:flex;
      align-items:center;
      gap:8px;
      color: rgba(255,255,255,.80);
      font-size: 12px;
      user-select:none;
    }
    .check input{ accent-color: var(--brand2); }

    .link{
      color: rgba(255,255,255,.78);
      font-size: 12px;
      text-decoration:none;
    }
    .link:hover{ text-decoration:underline; }

    .btnMain{
      height: 48px;
      border-radius: 16px;
      border: 0;
      width:100%;
      font-weight: 900;
      letter-spacing:.3px;
      color:#0b1736;
      background: linear-gradient(135deg, var(--brand1), var(--brand2));
      box-shadow: 0 16px 40px rgba(0,0,0,.28);
      transition: .15s ease;
    }
    .btnMain:hover{ filter: brightness(1.05); transform: translateY(-1px); }
    .btnMain:disabled{ opacity:.7; cursor:not-allowed; transform:none; }

    .foot{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      margin-top:auto;
      padding-top: 10px;
      color: rgba(255,255,255,.66);
      font-size: 12px;
    }

    /* alerts */
    .alert{
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.06);
      color: rgba(255,255,255,.90);
    }
    .alert-danger{
      border-color: rgba(255,107,107,.35);
      background: rgba(255,107,107,.10);
    }
    .alert-success{
      border-color: rgba(79,209,197,.35);
      background: rgba(79,209,197,.10);
    }

    /* loading overlay */
    .loading{
      position:fixed;
      inset:0;
      background:rgba(2,12,34,.70);
      display:none;
      align-items:center;
      justify-content:center;
      z-index:9999;
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
    }
    .spinner{
      width:72px;height:72px;
      border:6px solid rgba(255,255,255,.25);
      border-top:6px solid var(--brand1);
      border-radius:50%;
      animation:spin 1s linear infinite;
    }
    @keyframes spin{ to{transform:rotate(360deg)} }
  </style>
</head>

<body>
<div class="stars"></div>

<!-- LOADING -->
<div class="loading" id="loading">
  <div class="spinner"></div>
</div>

<div class="shell">

  <!-- LEFT INFO PANEL -->
  <section class="panel">
    <div class="hero">
      <div class="brand">
        <div class="logo"><i class="fas fa-graduation-cap"></i></div>
        <div>
          <h1>PPDB Online</h1>
          <p>Portal Daftar • Admin & User</p>
        </div>
      </div>

      <div class="headline">
        Daftar akun untuk akses <span class="accent">lebih cepat</span> & <span class="accent">lebih aman</span>
      </div>
      <p class="desc">
        Buat akun untuk mengelola proses PPDB. Setelah daftar, kamu bisa login dan sistem akan mengarahkan sesuai level akun.
      </p>

      <div class="miniRow">
        <div class="mini">
          <div class="ic"><i class="fas fa-shield-alt"></i></div>
          <div>
            <p class="t">Aman</p>
            <p class="s">Validasi input & proteksi akun.</p>
          </div>
        </div>
        <div class="mini">
          <div class="ic"><i class="fas fa-users-cog"></i></div>
          <div>
            <p class="t">Admin & User</p>
            <p class="s">Akses menyesuaikan role akun.</p>
          </div>
        </div>
        <div class="mini">
          <div class="ic"><i class="fas fa-bolt"></i></div>
          <div>
            <p class="t">Cepat</p>
            <p class="s">UI ringan & mudah dipakai.</p>
          </div>
        </div>
      </div>

      <div class="pills">
        <span class="pill"><i class="fas fa-check-circle"></i> Validasi berkas</span>
        <span class="pill"><i class="fas fa-chart-line"></i> Monitoring</span>
        <span class="pill"><i class="fas fa-history"></i> Log aktivitas</span>
        <span class="pill"><i class="fas fa-lock"></i> Session secure</span>
      </div>
    </div>
  </section>

  <!-- RIGHT FORM PANEL -->
  <section class="panel">
    <div class="formCard">

      <div class="formTop">
        <div class="ttl">
          <b><i class="fas fa-user-plus mr-2"></i>Daftar</b>
          <span>Masukkan data untuk membuat akun</span>
        </div>
        <a class="circleBtn" href="<?= base_url('/') ?>" title="Kembali ke Website">
          <i class="fas fa-home"></i>
        </a>
      </div>

      <?php if(session()->getFlashdata('errors')): ?>
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
          <div class="alert alert-danger py-2 px-3 mb-2"><?= esc($error) ?></div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if(session()->getFlashdata('pesan')): ?>
        <div class="alert alert-success py-2 px-3 mb-2">
          <?= esc(session()->getFlashdata('pesan')) ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('auth/simpan_daftar') ?>" method="post" onsubmit="showLoading()">

        <div class="field">
          <span class="leftIcon"><i class="fas fa-user"></i></span>
          <input class="inp" type="text" name="nama_user" placeholder="Nama Lengkap" required>
        </div>

        <div class="field">
          <span class="leftIcon"><i class="fas fa-envelope"></i></span>
          <input class="inp" type="email" id="email" name="email" placeholder="Email" required>
          <span class="rightIcon" id="btnFillEmail" title="Isi cepat email admin (contoh)">
            <i class="fas fa-magic"></i>
          </span>
        </div>

        <div class="field" style="margin-bottom:6px;">
          <span class="leftIcon"><i class="fas fa-lock"></i></span>
          <input class="inp" type="password" id="password" name="password" placeholder="Password" required>
          <span class="rightIcon" onclick="togglePassword()" title="Lihat/Sembunyikan password">
            <i class="fas fa-eye" id="eye"></i>
          </span>
        </div>

        <div class="strength">
          <small>Strength</small>
          <div class="bar"><i id="strengthBar"></i></div>
        </div>

        <div class="row2">
          <label class="check">
            <input type="checkbox" id="rememberEmail">
            Ingat email saya
          </label>
          <a class="link" href="<?= base_url('auth/login') ?>">Sudah punya akun? Login</a>
        </div>

        <button class="btnMain mt-2" id="btnDaftar" type="submit">
          <i class="fas fa-user-plus mr-2"></i> DAFTAR
        </button>

      </form>

      <div class="foot">
        <span>© PPDB Online</span>
        <span style="opacity:.75;">AdminLTE • Modern UI</span>
      </div>

    </div>
  </section>

</div>

<script>
  function togglePassword(){
    const p = document.getElementById('password');
    const i = document.getElementById('eye');
    if(p.type === 'password'){
      p.type = 'text';
      i.classList.remove('fa-eye');
      i.classList.add('fa-eye-slash');
    }else{
      p.type = 'password';
      i.classList.remove('fa-eye-slash');
      i.classList.add('fa-eye');
    }
  }

  function showLoading(){
    document.getElementById('loading').style.display='flex';
    document.getElementById('btnDaftar').disabled=true;
  }

  // Strength meter sederhana
  const strengthBar = document.getElementById('strengthBar');
  const pass = document.getElementById('password');

  function calcStrength(v){
    let s = 0;
    if(v.length >= 8) s += 25;
    if(/[A-Z]/.test(v)) s += 20;
    if(/[a-z]/.test(v)) s += 20;
    if(/[0-9]/.test(v)) s += 20;
    if(/[^A-Za-z0-9]/.test(v)) s += 15;
    return Math.min(100, s);
  }

  pass.addEventListener('input', ()=>{
    const v = pass.value || '';
    strengthBar.style.width = calcStrength(v) + '%';
  });

  // Ingat email (localStorage)
  const email = document.getElementById('email');
  const remember = document.getElementById('rememberEmail');

  const saved = localStorage.getItem('ppdb_reg_email');
  if(saved){
    email.value = saved;
    remember.checked = true;
  }

  remember.addEventListener('change', ()=>{
    if(remember.checked){
      localStorage.setItem('ppdb_reg_email', email.value || '');
    }else{
      localStorage.removeItem('ppdb_reg_email');
    }
  });

  email.addEventListener('input', ()=>{
    if(remember.checked){
      localStorage.setItem('ppdb_reg_email', email.value || '');
    }
  });

  // tombol isi cepat (opsional)
  document.getElementById('btnFillEmail').addEventListener('click', ()=>{
    if(!email.value) email.value = 'admin@gmail.com';
    if(remember.checked) localStorage.setItem('ppdb_reg_email', email.value);
  });
</script>

<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>
</body>
</html>
