<?php
$seg1 = service('uri')->getSegment(1); // contoh: admin, profile, validasi
$seg2 = service('uri')->getSegment(2); // contoh: validasi (kalau /admin/validasi)
$level = session()->get('level');      // admin / user
$nama  = session()->get('nama_user') ?? 'User';
$foto  = session()->get('foto');       // kalau kamu simpan path foto
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'No Title' ?> | <?= $subtitle ?? '' ?></title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css')?>">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css')?>">

  <!-- Optional custom CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/sidebar-premium.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/school-theme.css') ?>">

  <style>
    /* Biar sidebar lebih enak dilihat (opsional) */
    .brand-link { border-bottom: 1px solid rgba(255,255,255,.08); }
    .nav-sidebar .nav-link { border-radius: 10px; margin: 2px 6px; }
    .nav-sidebar .nav-link.active { box-shadow: 0 6px 14px rgba(0,0,0,.25); }
    .badge-role{
      font-size: 11px;
      padding: 4px 8px;
      border-radius: 999px;
      background: rgba(255,255,255,.12);
      border: 1px solid rgba(255,255,255,.12);
      color: #fff;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="container-fluid">

      <div class="d-flex align-items-center gap-2">
        <h5 class="mb-0 font-weight-bold">Sistem PPDB Online</h5>
        <span class="badge-role text-uppercase"><?= esc($level ?? '-') ?></span>
      </div>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand -->
    <a href="<?= ($level === 'admin') ? base_url('admin') : base_url('profile') ?>" class="brand-link">
      <img src="<?= base_url('assets/AdminLTE/dist/img/AdminLTELogo.png')?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PPDB Online</span>
    </a>

    <div class="sidebar">

      <!-- User panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if (!empty($foto)): ?>
            <img src="<?= base_url($foto) ?>" class="img-circle elevation-2" alt="User Image">
          <?php else: ?>
            <img src="<?= base_url('assets/AdminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= esc($nama) ?></a>
          <small class="text-muted text-uppercase"><?= esc($level ?? '-') ?></small>
        </div>
      </div>

      <!-- MENU -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

          <?php if ($level === 'user'): ?>
            <!-- ================= MENU SISWA ================= -->

            <li class="nav-header">MENU SISWA</li>

            <li class="nav-item">
              <a href="<?= base_url('profile') ?>"
                 class="nav-link <?= ($seg1 === 'profile') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>Profile Siswa</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('sekolah') ?>"
                 class="nav-link <?= ($seg1 === 'sekolah') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-school"></i>
                <p>Sekolah</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('informasi-ppdb') ?>"
                 class="nav-link <?= ($seg1 === 'informasi-ppdb') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>Informasi PPDB</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('pendaftaran') ?>"
                 class="nav-link <?= ($seg1 === 'pendaftaran') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>Pendaftaran</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('validasi') ?>"
                 class="nav-link <?= ($seg1 === 'validasi') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-check-circle"></i>
                <p>Status Validasi</p>
              </a>
            </li>

          <?php elseif ($level === 'admin'): ?>
            <!-- ================= MENU ADMIN ================= -->

            <li class="nav-header">MENU ADMIN</li>

            <li class="nav-item">
              <a href="<?= base_url('admin') ?>"
                 class="nav-link <?= ($seg1 === 'admin' && empty($seg2)) ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/validasi') ?>"
                 class="nav-link <?= ($seg1 === 'admin' && $seg2 === 'validasi') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-user-check"></i>
                <p>Validasi Pendaftar</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= base_url('admin/feedback') ?>"
                 class="nav-link <?= ($seg1 === 'admin' && $seg2 === 'feedback') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-comment-dots"></i>
                <p>Feedback</p>
              </a>
            </li>

            <!-- (opsional) menu lain admin -->
            <li class="nav-item">
              <a href="<?= base_url('sekolah') ?>"
                 class="nav-link <?= ($seg1 === 'sekolah') ? 'active' : '' ?>">
                <i class="nav-icon fas fa-school"></i>
                <p>Kelola Sekolah</p>
              </a>
            </li>

          <?php else: ?>
            <!-- Kalau belum login -->
            <li class="nav-item">
              <a href="<?= base_url('auth/login') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-in-alt"></i>
                <p>Login</p>
              </a>
            </li>
          <?php endif; ?>

        </ul>
      </nav>

    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $subtitle ?? '' ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?= $this->renderSection('content') ?>
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2020
      <a href="https://adminlte.io">AdminLTE.io</a>.
    </strong> All rights reserved.
  </footer>

</div>

<!-- Scripts -->
<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js')?>"></script>

<script src="<?= base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>

<?= $this->renderSection('script') ?>

</body>
</html>
