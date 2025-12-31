<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'PPDB Online Provinsi' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT & ICON -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">

    <style>
        body {
            background:#f4f6f9;
            font-family:'Source Sans Pro', sans-serif;
        }

        /* ================= TOPBAR ================= */
        .topbar-prov {
            background:#081f4d;
            color:#fff;
            font-size:13px;
            padding:6px 10px;
            text-align:center;
            letter-spacing:.4px;
        }

        /* ================= HEADER HERO ================= */
        .header-hero {
            position:relative;
            background:linear-gradient(135deg,#0a2a66,#123c8c);
            color:#fff;
            padding:34px 0;
            overflow:hidden;
        }

        .header-hero::after {
            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(120deg, rgba(249,198,66,.18), transparent 60%);
            pointer-events:none;
        }

        .header-brand {
            display:flex;
            align-items:center;
            gap:18px;
            position:relative;
            z-index:2;
        }

        .logo-circle {
            width:66px;
            height:66px;
            border-radius:50%;
            background:linear-gradient(135deg,#f9c642,#ffe08a);
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow:0 10px 25px rgba(0,0,0,.25);
        }

        .logo-circle i {
            font-size:34px;
            color:#0a2a66;
        }

        .brand-text h4 {
            margin:0;
            font-weight:800;
            letter-spacing:.6px;
        }

        .brand-text small {
            display:block;
            opacity:.9;
            font-weight:600;
        }

        /* ================= NAVBAR ================= */
        .nav-prov {
            background:#0a2a66;
            border-top:4px solid #f9c642;
        }

        .nav-prov .nav-link {
            color:#fff !important;
            font-weight:600;
            padding:14px 20px;
            transition:.3s;
        }

        .nav-prov .nav-link:hover {
            background:rgba(255,255,255,.12);
            color:#f9c642 !important;
        }

        .btn-akun {
            background:#f9c642;
            color:#000 !important;
            font-weight:800;
            border-radius:30px;
            padding:8px 24px;
            box-shadow:0 6px 16px rgba(0,0,0,.25);
        }

        .btn-akun:hover {
            background:#ffd76b;
        }

        /* ================= ANNOUNCEMENT ================= */
        .announcement {
            background:#f9c642;
            font-weight:700;
            font-size:14px;
            padding:8px 0;
            overflow:hidden;
            color:#000;
        }

        .announcement span {
            display:inline-block;
            white-space:nowrap;
            padding-left:100%;
            animation:marquee 18s linear infinite;
        }

        @keyframes marquee {
            from { transform:translateX(0); }
            to { transform:translateX(-100%); }
        }

        /* ================= FOOTER ================= */
        .footer-prov {
            background:#081f4d;
            color:#fff;
            margin-top:70px;
            padding:45px 0 20px;
        }

        .footer-prov h6 {
            color:#f9c642;
            font-weight:700;
        }

        .footer-prov a {
            color:#fff;
            text-decoration:none;
        }

        .footer-prov a:hover {
            color:#f9c642;
        }

        .footer-bottom {
            border-top:1px solid rgba(255,255,255,.25);
            margin-top:25px;
            padding-top:12px;
            font-size:13px;
            text-align:center;
        }
    </style>
</head>

<body class="layout-top-nav">
<div class="wrapper">

    <!-- TOPBAR -->
    <div class="topbar-prov">
        SISTEM RESMI DINAS PENDIDIKAN PROVINSI BREBES • PPDB ONLINE SMA TAHUN AJARAN 2025/2026
    </div>

    <!-- HEADER -->
    <div class="header-hero">
        <div class="container">
            <div class="header-brand">
                <div class="logo-circle">
                    <i class="fas fa-landmark"></i>
                </div>
                <div class="brand-text">
                    <h4>PPDB ONLINE SMA</h4>
                    <small>Dinas Pendidikan Provinsi</small>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md nav-prov">
        <div class="container">
            <button class="navbar-toggler bg-light" data-toggle="collapse" data-target="#navProv">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navProv">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link">
                            <i class="fas fa-home mr-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pengumuman') ?>" class="nav-link">
                            <i class="fas fa-bullhorn mr-1"></i> Pengumuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('contact') ?>" class="nav-link">
                            <i class="fas fa-envelope mr-1"></i> Kontak
                        </a>
                    </li>
                    <li class="nav-item ml-3">
                        <a href="<?= base_url('auth/login') ?>" class="btn btn-akun">
                            <i class="fas fa-user"></i> Akun
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ANNOUNCEMENT -->
    <div class="announcement">
        <span>
            ⚠️ PPDB ONLINE SMA TAHUN AJARAN 2025/2026 GRATIS • RESMI DINAS PENDIDIKAN PROVINSI • WASPADA PENIPUAN •
        </span>
    </div>

    <!-- CONTENT -->
    <div class="content-wrapper pt-4">
        <div class="content">
            <div class="container">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-prov">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h6>Dinas Pendidikan Provinsi</h6>
                    <p>Sistem resmi Penerimaan Peserta Didik Baru (PPDB) jenjang SMA.</p>
                </div>
                <div class="col-md-4">
                    <h6>Kontak Resmi</h6>
                    <p>
                        Email: disdik@prov.go.id<br>
                        Telp: (0283) xxxxx
                    </p>
                </div>
                <div class="col-md-4">
                    <h6>Tautan Terkait</h6>
                    <ul class="list-unstyled">
                        <li><a href="#">Kemendikbud RI</a></li>
                        <li><a href="#">Dapodik</a></li>
                        <li><a href="#">PPID Provinsi</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                © <?= date('Y') ?> Dinas Pendidikan Provinsi • All Rights Reserved
            </div>
        </div>
    </footer>

</div>

<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
