
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?>| <?= $subtitle ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/ppdb-premium.css') ?>">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- ================= NAVBAR ================= -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

      <!-- LOGO -->
      <a href="<?= base_url() ?>" class="navbar-brand">
        <img src="<?= base_url('assets/AdminLTE/dist/img/AdminLTELogo.png') ?>"
             alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity:.8">
        <span class="brand-text font-weight-bold">PPDB Online</span>
      </a>

      <!-- TOGGLER -->
      <button class="navbar-toggler order-1" type="button"
              data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- MENU KIRI -->
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pengumuman') ?>" class="nav-link">Pengumuman</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('contact') ?>" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>

      <!-- MENU KANAN (AKUN) -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <?php if (!session()->get('logged_in')) : ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-outline-primary px-3"
               href="#" data-toggle="dropdown">
              <i class="fas fa-user-circle"></i> Akun
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow">
              <a class="dropdown-item" href="<?= base_url('auth/login') ?>">
                <i class="fas fa-sign-in-alt mr-2 text-primary"></i> Login
              </a>
              <a class="dropdown-item" href="<?= base_url('register') ?>">
                <i class="fas fa-user-plus mr-2 text-success"></i> Daftar
              </a>
            </div>
          </li>

        <?php else : ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-primary text-white px-3"
               href="#" data-toggle="dropdown">
              <i class="fas fa-user"></i> <?= session()->get('nama_user') ?>
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow">
              <a class="dropdown-item" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
              </a>
            </div>
          </li>

        <?php endif; ?>

      </ul>

    </div>
  </nav>
  <!-- =============== END NAVBAR =============== -->


  <!-- ================= CONTENT ================= -->
  <div class="content-wrapper">
    <div class="content pt-3">
      <div class="container">

        <?= $this->renderSection('content') ?>

      </div>
    </div>
  </div>
  <!-- =============== END CONTENT =============== -->


  <!-- ================= FOOTER ================= -->
  <footer class="main-footer text-center">
    <strong>
      Copyright &copy; <?= date('Y') ?>
      <a href="#">PPDB Online</a>.
    </strong>
    All rights reserved.
  </footer>

</div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/AdminLTE/dist/js/demo.js')?>"></script>

<script src="<?= base_url('aassets/AdminLTE/dist/js/ppdb-premium.js') ?>"></script>

</body>



</html>