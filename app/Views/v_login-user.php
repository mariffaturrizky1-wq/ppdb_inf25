<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login | PPDB Online</title>

  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">

  <style>
    :root{
      --bgA:#040716;
      --bgB:#061a3a;
      --bgC:#0f2d66;

      --card: rgba(255,255,255,.10);
      --card2: rgba(255,255,255,.15);
      --stroke: rgba(255,255,255,.18);

      --text: rgba(255,255,255,.92);
      --muted: rgba(255,255,255,.72);

      --gold1:#f6d365;
      --gold2:#d4af37;

      --cyan:#5ee7ff;
      --violet:#8b5cff;
      --blue:#6aa8ff;

      --shadow: 0 28px 90px rgba(0,0,0,.55);
      --shadow2: 0 18px 60px rgba(0,0,0,.42);

      --radius: 26px;
      --radius2: 18px;
    }

    /* ===== base ===== */
    *{ box-sizing:border-box; }
    html,body{ height:100%; }
    body{
        min-height:100vh;
        margin:0;
        font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
        color:var(--text);

        background: radial-gradient(1100px 800px at 15% 20%, rgba(139,92,255,.22) 0%, transparent 55%),
                    radial-gradient(900px 700px at 80% 28%, rgba(94,231,255,.18) 0%, transparent 55%),
                    linear-gradient(135deg, var(--bgA), var(--bgB), var(--bgC));

        display:flex;
        align-items:center;        /* tengah vertikal */
        justify-content:center;    /* tengah horizontal */

        padding:28px 16px;         /* biar aman di layar kecil */
        overflow-x:hidden;
        overflow-y:auto;           /* penting: biar flex centering stabil */
    }


    /* canvas background */
    #space {
      position:fixed;
      inset:0;
      z-index:0;
      display:block;
    }

    /* parallax glow blobs */
    .glow {
      position:fixed;
      inset:-20%;
      z-index:1;
      pointer-events:none;
      background:
        radial-gradient(450px 350px at 20% 30%, rgba(246,211,101,.20), transparent 60%),
        radial-gradient(520px 420px at 70% 25%, rgba(106,168,255,.18), transparent 60%),
        radial-gradient(520px 420px at 65% 70%, rgba(139,92,255,.16), transparent 60%);
      filter: blur(18px);
      transform: translate3d(0,0,0);
      animation: breathe 9s ease-in-out infinite;
    }
    @keyframes breathe{
      0%,100%{ transform: scale(1) translateY(0); opacity:.95; }
      50%{ transform: scale(1.05) translateY(-10px); opacity:1; }
    }

    /* floating icons layer */
    .floaters{
      position:fixed;
      inset:0;
      z-index:2;
      pointer-events:none;
      overflow:hidden;
    }
    .floater{
      position:absolute;
      opacity:.55;
      filter: drop-shadow(0 18px 40px rgba(0,0,0,.45));
      animation: floatUp linear infinite;
      will-change: transform;
    }
    .floater i{ color: rgba(255,255,255,.85); }
    .floater.gold i{ color: rgba(246,227,122,.92); }
    .floater.blue i{ color: rgba(106,168,255,.90); }
    .floater.cyan i{ color: rgba(94,231,255,.88); }

    @keyframes floatUp{
      from{ transform: translateY(110vh) translateX(0) rotate(0deg); }
      to{ transform: translateY(-25vh) translateX(120px) rotate(18deg); }
    }

    /* ===== layout ===== */
    .wrap{
    position:relative;
      z-index:3;
      width:min(1100px, 94vw);
      display:grid;
      grid-template-columns: 1.20fr .80fr;
      gap:24px;
      align-items:stretch;
    }

    .panel{
      border:1px solid var(--stroke);
      background: linear-gradient(180deg, rgba(255,255,255,.12), rgba(255,255,255,.06));
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      overflow:hidden;
      position:relative;
    }

    /* shimmer border */
    .panel::before{
      content:'';
      position:absolute;
      inset:-2px;
      background: conic-gradient(from 180deg,
        rgba(246,211,101,.0),
        rgba(246,211,101,.25),
        rgba(94,231,255,.25),
        rgba(139,92,255,.22),
        rgba(246,211,101,.0));
      filter: blur(18px);
      opacity:.55;
      pointer-events:none;
    }
    .panel > *{ position:relative; z-index:1; }

    /* left promo */
    .promo{
      padding:34px 34px 30px;
      min-height: 520px;
    }
    .brand{
      display:flex;
      align-items:center;
      gap:14px;
      margin-bottom:22px;
    }
    .badge{
      width:48px;height:48px;
      border-radius:16px;
      display:grid;
      place-items:center;
      background: linear-gradient(135deg, var(--gold1), var(--gold2));
      color:#081a3c;
      box-shadow: 0 16px 45px rgba(0,0,0,.35);
      font-size:20px;
    }
    .brand h1{
      margin:0;
      font-size:20px;
      font-weight:900;
      letter-spacing:.2px;
    }
    .brand p{
      margin:3px 0 0 0;
      color:var(--muted);
      font-size:13px;
    }

    .headline{
      margin-top:6px;
      font-size:40px;
      line-height:1.05;
      font-weight:1000;
      letter-spacing:.2px;
    }
    .headline .grad{
      background: linear-gradient(90deg, var(--gold1), var(--gold2), var(--cyan));
      -webkit-background-clip:text;
      background-clip:text;
      color:transparent;
    }
    .desc{
      margin-top:14px;
      color: rgba(255,255,255,.76);
      font-size:14px;
      line-height:1.75;
      max-width: 52ch;
    }

    .stats{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap:12px;
      margin-top:22px;
    }
    .stat{
      border:1px solid rgba(255,255,255,.15);
      background: rgba(255,255,255,.06);
      border-radius:18px;
      padding:12px 12px;
      box-shadow: var(--shadow2);
    }
    .stat .k{
      font-size:12px;
      color: rgba(255,255,255,.70);
    }
    .stat .v{
      margin-top:6px;
      font-size:18px;
      font-weight:900;
      letter-spacing:.2px;
    }
    .stat .v i{ margin-right:6px; color: rgba(246,227,122,.92); }

    .chips{
      display:flex;
      flex-wrap:wrap;
      gap:10px;
      margin-top:18px;
    }
    .chip{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:8px 12px;
      border-radius:999px;
      border:1px solid rgba(255,255,255,.16);
      background: rgba(255,255,255,.07);
      color: rgba(255,255,255,.80);
      font-size:12px;
    }
    .chip i{ color: rgba(94,231,255,.95); }

    .dividerGlow{
      position:absolute;
      left:20px; right:20px; bottom:20px;
      height:1px;
      background: linear-gradient(90deg, transparent, rgba(246,227,122,.6), rgba(94,231,255,.55), rgba(139,92,255,.45), transparent);
      opacity:.75;
    }

    /* right login */
    .login{
      padding:26px 26px 20px;
      display:flex;
      flex-direction:column;
      justify-content:center;
    }

    .topbar{
      display:flex;
      align-items:center;
      justify-content:space-between;
      margin-bottom:10px;
    }
    .loginTitle{
      margin:0;
      font-size:18px;
      font-weight:900;
      letter-spacing:.2px;
    }
    .loginSub{
      margin:6px 0 18px;
      color: rgba(255,255,255,.72);
      font-size:13px;
    }

    .rightBadge{
      display:flex;
      align-items:center;
      gap:10px;
    }
    .shield{
      width:44px;height:44px;
      border-radius:16px;
      display:grid;
      place-items:center;
      border:1px solid rgba(255,255,255,.20);
      background: rgba(255,255,255,.08);
      box-shadow: 0 14px 35px rgba(0,0,0,.35);
    }
    .shield i{
      color: rgba(246,227,122,.95);
      font-size:18px;
    }

    .themeToggle{
      width:44px;height:44px;
      border-radius:16px;
      display:grid;
      place-items:center;
      border:1px solid rgba(255,255,255,.18);
      background: rgba(0,0,0,.14);
      cursor:pointer;
      transition:.25s ease;
      color: rgba(255,255,255,.80);
    }
    .themeToggle:hover{
      transform: translateY(-1px);
      border-color: rgba(255,255,255,.25);
      color:#fff;
    }

    .field{ margin-bottom:14px; }
    .label{
      font-size:12px;
      color: rgba(255,255,255,.78);
      margin:0 0 8px 2px;
      display:flex;
      align-items:center;
      gap:8px;
    }

    .control{ position:relative; }
    .control input{
      width:100%;
      height:52px;
      border-radius: var(--radius2);
      border:1px solid rgba(255,255,255,.16);
      background: rgba(255,255,255,.07);
      color: var(--text);
      padding:0 52px 0 14px;
      outline:none;
      transition:.22s ease;
    }
    .control input::placeholder{ color: rgba(255,255,255,.55); }
    .control input:focus{
      border-color: rgba(94,231,255,.55);
      box-shadow: 0 0 0 4px rgba(94,231,255,.10);
      transform: translateY(-1px);
    }

    .iconBtn{
      position:absolute;
      right:10px;
      top:50%;
      transform: translateY(-50%);
      width:36px;height:36px;
      border-radius:14px;
      display:grid;
      place-items:center;
      border:1px solid rgba(255,255,255,.14);
      background: rgba(0,0,0,.14);
      cursor:pointer;
      transition:.22s ease;
      color: rgba(255,255,255,.78);
      user-select:none;
    }
    .iconBtn:hover{
      transform: translateY(-50%) scale(1.03);
      border-color: rgba(255,255,255,.22);
      color:#fff;
    }

    .rowline{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      margin: 4px 2px 14px;
      font-size:12px;
      color: rgba(255,255,255,.74);
    }
    .remember{
      display:flex;
      align-items:center;
      gap:8px;
      cursor:pointer;
      user-select:none;
    }
    .remember input{ accent-color: var(--cyan); }

    .link{
      color: rgba(255,255,255,.86);
      text-decoration:none;
      border-bottom: 1px dashed rgba(255,255,255,.35);
    }
    .link:hover{ color:#fff; }

    .btnModern{
      height:52px;
      border:none;
      width:100%;
      border-radius: 20px;
      font-weight:1000;
      letter-spacing:.45px;
      color:#071531;
      background: linear-gradient(135deg, var(--gold1), var(--gold2), var(--cyan));
      box-shadow: 0 18px 55px rgba(0,0,0,.38);
      transition:.22s ease;
    }
    .btnModern:hover{
      transform: translateY(-2px);
      box-shadow: 0 22px 65px rgba(0,0,0,.48);
    }
    .btnModern:active{ transform: translateY(0); }

    .hint{
      margin-top:10px;
      font-size:12px;
      color: rgba(255,255,255,.70);
      display:flex;
      align-items:center;
      gap:8px;
    }
    .strength{
      flex:1;
      height:8px;
      border-radius:999px;
      background: rgba(255,255,255,.10);
      overflow:hidden;
      border:1px solid rgba(255,255,255,.14);
    }
    .strength > div{
      height:100%;
      width:0%;
      background: linear-gradient(90deg, rgba(255,90,90,.9), rgba(246,211,101,.9), rgba(94,231,255,.95));
      transition:.2s ease;
    }

    .footer{
      margin-top:14px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      font-size:12px;
      color: rgba(255,255,255,.72);
    }

    /* ===== toast ===== */
    .toasts{
      position:fixed;
      right:16px;
      top:16px;
      z-index:99999;
      display:flex;
      flex-direction:column;
      gap:10px;
      width: min(380px, calc(100vw - 32px));
      pointer-events:none;
    }
    .toast{
      pointer-events:auto;
      border:1px solid rgba(255,255,255,.18);
      background: rgba(10, 18, 40, .78);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-radius: 18px;
      box-shadow: 0 16px 55px rgba(0,0,0,.45);
      padding:12px 12px;
      display:flex;
      gap:10px;
      align-items:flex-start;
      transform: translateX(20px);
      opacity:0;
      animation: toastIn .35s ease forwards;
    }
    @keyframes toastIn{
      to{ transform: translateX(0); opacity:1; }
    }
    .toast .ic{
      width:36px;height:36px;
      border-radius:14px;
      display:grid;
      place-items:center;
      border:1px solid rgba(255,255,255,.16);
      background: rgba(255,255,255,.08);
      flex:0 0 auto;
    }
    .toast .ttl{ font-weight:900; font-size:13px; margin:0; }
    .toast .msg{ font-size:12px; color: rgba(255,255,255,.78); margin:4px 0 0; line-height:1.45; }
    .toast .close{
      margin-left:auto;
      cursor:pointer;
      color: rgba(255,255,255,.70);
      padding:6px 8px;
      border-radius:12px;
      border:1px solid rgba(255,255,255,.12);
      background: rgba(0,0,0,.10);
    }
    .toast .close:hover{ color:#fff; border-color: rgba(255,255,255,.22); }

    .t-success .ic{ outline: 2px solid rgba(94,231,255,.25); }
    .t-success .ic i{ color: rgba(94,231,255,.95); }
    .t-error .ic{ outline: 2px solid rgba(255,90,90,.22); }
    .t-error .ic i{ color: rgba(255,90,90,.95); }
    .t-info .ic{ outline: 2px solid rgba(246,211,101,.20); }
    .t-info .ic i{ color: rgba(246,211,101,.95); }

    /* loading overlay */
    .loading{
      position:fixed;
      inset:0;
      z-index:9999;
      background: rgba(2, 12, 34, .65);
      display:none;
      align-items:center;
      justify-content:center;
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }
    .spinner{
      width:74px;height:74px;
      border-radius:50%;
      border:6px solid rgba(255,255,255,.14);
      border-top:6px solid var(--gold2);
      animation: spin 1s linear infinite;
      box-shadow: 0 18px 50px rgba(0,0,0,.40);
    }
    @keyframes spin{ to{ transform: rotate(360deg); } }

    /* shake for error */
    .shake{
      animation: shake .45s ease;
    }
    @keyframes shake{
      0%,100%{ transform: translateX(0); }
      20%{ transform: translateX(-10px); }
      40%{ transform: translateX(10px); }
      60%{ transform: translateX(-7px); }
      80%{ transform: translateX(7px); }
    }

    /* theme alt (aurora) */
    body.aurora{
      background: radial-gradient(1100px 800px at 18% 20%, rgba(94,231,255,.18) 0%, transparent 55%),
                  radial-gradient(900px 700px at 80% 28%, rgba(246,211,101,.16) 0%, transparent 55%),
                  linear-gradient(135deg, #02111f, #062949, #0a3b56);
    }

    /* responsive */
    @media (max-width: 920px){
      .wrap{ grid-template-columns: 1fr; }
      .promo{ min-height:auto; padding:28px; }
      .headline{ font-size:32px; }
      .stats{ grid-template-columns: 1fr; }
    }
  </style>
</head>

<body>

<canvas id="space"></canvas>
<div class="glow" id="glow"></div>
<div class="floaters" id="floaters"></div>

<div class="toasts" id="toasts"></div>

<div class="loading" id="loading">
  <div class="spinner"></div>
</div>

<div class="wrap" id="wrap">
  <!-- LEFT -->
  <section class="panel promo">
    <div class="brand">
      <div class="badge"><i class="fas fa-graduation-cap"></i></div>
      <div>
        <h1>PPDB Online</h1>
        <p>Portal Login • Admin & User</p>
      </div>
    </div>

    <div class="headline">
      Masuk dan kelola proses PPDB WILAYAH BREBES dengan <span class="grad">lebih cepat</span> & <span class="grad">lebih aman</span>.
    </div>

    <div class="desc">
      Halaman ini digunakan untuk <b>semua akun</b> (admin maupun user).
      Setelah masuk, sistem otomatis mengarahkan berdasarkan level akun.
    </div>

    <div class="stats">
      <div class="stat">
        <div class="k">Fitur</div>
        <div class="v"><i class="fas fa-shield-alt"></i> Aman</div>
      </div>
      <div class="stat">
        <div class="k">Akses</div>
        <div class="v"><i class="fas fa-users"></i> Admin & User</div>
      </div>
      <div class="stat">
        <div class="k">UX</div>
        <div class="v"><i class="fas fa-bolt"></i> Cepat</div>
      </div>
    </div>

    <div class="chips">
      <div class="chip"><i class="fas fa-file-alt"></i> Validasi berkas</div>
      <div class="chip"><i class="fas fa-chart-line"></i> Monitoring</div>
      <div class="chip"><i class="fas fa-clock"></i> Log aktivitas</div>
      <div class="chip"><i class="fas fa-lock"></i> Session secure</div>
    </div>

    <div class="dividerGlow"></div>
  </section>

  <!-- RIGHT -->
  <section class="panel login" id="loginCard">
    <div class="topbar">
      <div class="rightBadge">
        <div class="shield"><i class="fas fa-user-shield"></i></div>
        <div>
          <h2 class="loginTitle">Login</h2>
          <div class="loginSub">Masuk untuk melanjutkan</div>
        </div>
      </div>

      <div class="themeToggle" id="themeToggle" title="Ganti tema">
        <i class="fas fa-magic"></i>
      </div>
    </div>

    <?php
      // ===== FLASHDATA CI4 =====
      // kamu sudah pakai 'pesan' untuk error login ("Email atau Password salah!")
      $pesan = session()->getFlashdata('pesan');
      $error = session()->getFlashdata('error');
      $errors = session()->getFlashdata('errors'); // array validation errors
    ?>

    <form action="<?= base_url('auth/cek_login_user') ?>" method="post" onsubmit="showLoading()">
      <div class="field">
        <div class="label"><i class="fas fa-envelope"></i> Email</div>
        <div class="control">
          <input id="email" type="email" name="email" placeholder="contoh: admin@domain.com" required autocomplete="username">
          <div class="iconBtn" id="emailHint" title="Tips: gunakan email terdaftar"><i class="fas fa-at"></i></div>
        </div>
      </div>

      <div class="field">
        <div class="label"><i class="fas fa-lock"></i> Password</div>
        <div class="control">
          <input id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
          <div class="iconBtn" onclick="togglePassword()" title="Tampilkan/Sembunyikan">
            <i class="fas fa-eye" id="eye"></i>
          </div>
        </div>

        <!-- Password strength hint (optional & ringan) -->
        <div class="hint">
          <span style="min-width:84px;opacity:.9"><i class="fas fa-signal"></i> Strength</span>
          <div class="strength"><div id="strengthBar"></div></div>
        </div>
      </div>

      <div class="rowline">
        <label class="remember">
          <input type="checkbox" id="rememberEmail">
          Ingat email saya
        </label>
        <a class="link" href="<?= base_url('') ?>">Kembali ke Website</a>
      </div>

      <button type="submit" class="btnModern" id="btnLogin">
        <i class="fas fa-sign-in-alt"></i> MASUK
      </button>

      <div class="footer">
        <span><i class="fas fa-globe"></i> PPDB Online</span>
        <span style="opacity:.85">AdminLTE • Modern UI</span>
      </div>
    </form>

    <!-- hidden server messages to JS -->
    <div id="serverMsg"
         data-pesan="<?= esc($pesan ?? '') ?>"
         data-error="<?= esc($error ?? '') ?>"
         data-errors="<?= esc(is_array($errors) ? implode(' | ', $errors) : ($errors ?? '')) ?>">
    </div>
  </section>
</div>

<script>
  // =========================
  // 1) Loading
  // =========================
  function showLoading(){
    document.getElementById('loading').style.display = 'flex';
    document.getElementById('btnLogin').disabled = true;
  }

  // =========================
  // 2) Toggle password
  // =========================
  function togglePassword(){
    const p = document.getElementById('password');
    const i = document.getElementById('eye');
    if(p.type === 'password'){
      p.type = 'text';
      i.classList.replace('fa-eye','fa-eye-slash');
    }else{
      p.type = 'password';
      i.classList.replace('fa-eye-slash','fa-eye');
    }
  }

  // =========================
  // 3) Remember email + autofocus
  // =========================
  (function initRemember(){
    const email = document.getElementById('email');
    const remember = document.getElementById('rememberEmail');

    const saved = localStorage.getItem('ppdb_login_email');
    if(saved){
      email.value = saved;
      remember.checked = true;
      document.getElementById('password').focus();
    }else{
      email.focus();
    }

    remember.addEventListener('change', () => {
      if(!remember.checked){
        localStorage.removeItem('ppdb_login_email');
      }else{
        if(email.value.trim()) localStorage.setItem('ppdb_login_email', email.value.trim());
      }
    });

    email.addEventListener('input', () => {
      if(remember.checked){
        localStorage.setItem('ppdb_login_email', email.value.trim());
      }
    });
  })();

  // =========================
  // 4) Theme switch (dark <-> aurora)
  // =========================
  (function initTheme(){
    const key = 'ppdb_theme';
    const toggle = document.getElementById('themeToggle');

    const saved = localStorage.getItem(key);
    if(saved === 'aurora') document.body.classList.add('aurora');

    toggle.addEventListener('click', () => {
      document.body.classList.toggle('aurora');
      localStorage.setItem(key, document.body.classList.contains('aurora') ? 'aurora' : 'dark');
      toast('info', 'Tema diubah', 'Tema tampilan berhasil diganti.');
    });
  })();

  // =========================
  // 5) Toast system
  // =========================
  const toastRoot = document.getElementById('toasts');

  function toast(type, title, message, ttl=4200){
    const t = document.createElement('div');
    t.className = `toast t-${type}`;
    const icon = type === 'success' ? 'fa-check-circle'
               : type === 'error' ? 'fa-exclamation-triangle'
               : 'fa-info-circle';

    t.innerHTML = `
      <div class="ic"><i class="fas ${icon}"></i></div>
      <div>
        <p class="ttl">${escapeHtml(title)}</p>
        <p class="msg">${escapeHtml(message)}</p>
      </div>
      <div class="close" title="Tutup"><i class="fas fa-times"></i></div>
    `;

    t.querySelector('.close').addEventListener('click', () => {
      t.style.opacity = '0';
      t.style.transform = 'translateX(20px)';
      setTimeout(()=> t.remove(), 220);
    });

    toastRoot.appendChild(t);
    setTimeout(() => {
      if(!t.isConnected) return;
      t.style.opacity = '0';
      t.style.transform = 'translateX(20px)';
      setTimeout(()=> t.remove(), 250);
    }, ttl);
  }

  function escapeHtml(str){
    return String(str || '')
      .replaceAll('&','&amp;')
      .replaceAll('<','&lt;')
      .replaceAll('>','&gt;')
      .replaceAll('"','&quot;')
      .replaceAll("'","&#039;");
  }

  // =========================
  // 6) Read server flashdata -> toast + shake
  // =========================
  (function flashToToast(){
    const el = document.getElementById('serverMsg');
    const pesan  = el.dataset.pesan || '';
    const error  = el.dataset.error || '';
    const errors = el.dataset.errors || '';

    // CI kamu pakai 'pesan' untuk login salah.
    if(pesan){
      // heuristik: kalau ada kata "salah" -> error
      if(/salah|gagal|error/i.test(pesan)){
        toast('error', 'Login gagal', pesan);
        shakeLogin();
      }else{
        toast('success', 'Info', pesan);
      }
    }

    if(error){
      toast('error', 'Terjadi kesalahan', error);
      shakeLogin();
    }

    if(errors){
      toast('error', 'Validasi form', errors);
      shakeLogin();
    }
  })();

  function shakeLogin(){
    const card = document.getElementById('loginCard');
    card.classList.remove('shake');
    void card.offsetWidth; // restart animation
    card.classList.add('shake');
  }

  // =========================
  // 7) Password strength (simple)
  // =========================
  (function strengthMeter(){
    const p = document.getElementById('password');
    const bar = document.getElementById('strengthBar');

    function score(s){
      let sc = 0;
      if(!s) return 0;
      if(s.length >= 6) sc += 25;
      if(s.length >= 10) sc += 20;
      if(/[A-Z]/.test(s)) sc += 15;
      if(/[0-9]/.test(s)) sc += 15;
      if(/[^A-Za-z0-9]/.test(s)) sc += 25;
      return Math.min(sc, 100);
    }

    p.addEventListener('input', () => {
      const val = p.value;
      bar.style.width = score(val) + '%';
    });
  })();

  // =========================
  // 8) Canvas particles + shooting stars
  // =========================
  (function spaceFX(){
    const canvas = document.getElementById('space');
    const ctx = canvas.getContext('2d', { alpha: true });

    let w, h, dpr;
    function resize(){
      dpr = Math.max(1, window.devicePixelRatio || 1);
      w = canvas.width = Math.floor(window.innerWidth * dpr);
      h = canvas.height = Math.floor(window.innerHeight * dpr);
      canvas.style.width = window.innerWidth + 'px';
      canvas.style.height = window.innerHeight + 'px';
    }
    window.addEventListener('resize', resize, { passive:true });
    resize();

    // particles
    const stars = [];
    const STAR_COUNT = Math.min(220, Math.floor((window.innerWidth * window.innerHeight) / 7000));
    for(let i=0;i<STAR_COUNT;i++){
      stars.push({
        x: Math.random() * w,
        y: Math.random() * h,
        r: (Math.random()*1.6 + 0.2) * dpr,
        a: Math.random()*0.8 + 0.15,
        tw: Math.random()*0.02 + 0.003,
        vx: (Math.random()*0.10 + 0.02) * dpr,
      });
    }

    // shooting stars
    const meteors = [];
    function spawnMeteor(){
      const startX = (Math.random() * 0.7 + 0.1) * w;
      const startY = (Math.random() * 0.3 + 0.05) * h;
      meteors.push({
        x:startX, y:startY,
        vx: (6 + Math.random()*4) * dpr,
        vy: (3 + Math.random()*2) * dpr,
        life: 0,
        max: (40 + Math.random()*40)
      });
    }
    setInterval(() => {
      if(Math.random() < 0.55) spawnMeteor();
    }, 1600);

    // parallax
    let mx = 0, my = 0;
    window.addEventListener('mousemove', (e)=>{
      mx = (e.clientX / window.innerWidth - 0.5);
      my = (e.clientY / window.innerHeight - 0.5);
      const glow = document.getElementById('glow');
      glow.style.transform = `translate(${mx*20}px, ${my*16}px)`;
    }, { passive:true });

    function draw(){
      ctx.clearRect(0,0,w,h);

      // soft vignette
      const g = ctx.createRadialGradient(w*0.5, h*0.5, 0, w*0.5, h*0.5, Math.max(w,h)*0.55);
      g.addColorStop(0, 'rgba(255,255,255,0)');
      g.addColorStop(1, 'rgba(0,0,0,0.35)');
      ctx.fillStyle = g;
      ctx.fillRect(0,0,w,h);

      // stars
      for(const s of stars){
        s.x += s.vx;
        if(s.x > w) s.x = 0;
        s.a += (Math.random()-0.5) * s.tw;
        s.a = Math.max(0.08, Math.min(1, s.a));

        ctx.beginPath();
        ctx.fillStyle = `rgba(255,255,255,${s.a})`;
        ctx.arc(s.x, s.y, s.r, 0, Math.PI*2);
        ctx.fill();
      }

      // meteors
      for(let i=meteors.length-1;i>=0;i--){
        const m = meteors[i];
        m.life++;
        m.x += m.vx;
        m.y += m.vy;

        // tail
        const tx = m.x - m.vx*8;
        const ty = m.y - m.vy*8;
        const grad = ctx.createLinearGradient(m.x, m.y, tx, ty);
        grad.addColorStop(0, 'rgba(246,211,101,0.85)');
        grad.addColorStop(0.35, 'rgba(94,231,255,0.55)');
        grad.addColorStop(1, 'rgba(255,255,255,0)');
        ctx.strokeStyle = grad;
        ctx.lineWidth = 2.2 * dpr;
        ctx.beginPath();
        ctx.moveTo(m.x, m.y);
        ctx.lineTo(tx, ty);
        ctx.stroke();

        if(m.life > m.max || m.x > w*1.2 || m.y > h*1.2){
          meteors.splice(i,1);
        }
      }

      requestAnimationFrame(draw);
    }
    draw();
  })();

  // =========================
  // 9) Floating graduation caps + sparkles
  // =========================
  (function floaters(){
    const el = document.getElementById('floaters');
    const count = 18;

    const variants = ['gold','blue','cyan',''];
    for(let i=0;i<count;i++){
      const d = document.createElement('div');
      const v = variants[i % variants.length];
      d.className = 'floater ' + v;
      d.innerHTML = `<i class="fas ${i%5===0 ? 'fa-star' : 'fa-graduation-cap'}"></i>`;
      d.style.left = (Math.random()*100) + 'vw';
      d.style.fontSize = (16 + Math.random()*22) + 'px';
      d.style.animationDuration = (10 + Math.random()*14) + 's';
      d.style.animationDelay = (Math.random()*-12) + 's';
      el.appendChild(d);
    }
  })();
</script>

<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js')?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>

</body>
</html>
