<?php
$uri = service('uri')->getSegment(1);
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'No Title' ?> | <?= $subtitle ?? '' ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/sidebar-premium.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/school-theme.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand">
    
    <!-- SEARCH FORM -->
    <h3>Sistem PPDB Online</h3>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout')?>">
          <i class="fas fa-lock"></i> logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Admin')?>" class="brand-link">
      <img src="<?= base_url('assets/AdminLTE/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PPDB Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/AdminLTE/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      
       <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

                <!-- PROFILE SISWA -->
                <li class="nav-item">
                    <a href="<?= base_url('profile') ?>"
                      class="nav-link <?= ($uri == 'profile') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile Siswa</p>
                    </a>
                </li>


                <!-- SEKOLAH -->
                <li class="nav-item">
                    <a href="<?= base_url('sekolah') ?>"
                       class="nav-link <?= ($uri == 'sekolah') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-school"></i>
                        <p>Sekolah</p>
                    </a>
                </li>

                <!-- PENDIDIKAN -->
                <li class="nav-item">
                    <a href="<?= base_url('pendidikan') ?>"
                       class="nav-link <?= ($uri == 'pendidikan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Pendidikan</p>
                    </a>
                </li>

                <!-- AGAMA -->
                <li class="nav-item">
                    <a href="<?= base_url('agama') ?>"
                      class="nav-link <?= ($uri == 'agama') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-praying-hands"></i>
                        <p>Agama</p>
                    </a>
                </li>

            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?= $subtitle ?? '' ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
              <?= $this->renderSection('content') ?>
          
          
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js')?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>

<?= $this->renderSection('script') ?>

</body>
</html>
