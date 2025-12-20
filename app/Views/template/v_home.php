<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>


<div class="container mt-4">

    <!-- ================= HERO ================= -->
    <div class="card hero-ppdb shadow-lg mb-4">
        <div class="card-body p-5">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <h2 class="fw-bold mb-3">
                        Pendaftaran Peserta Didik Baru
                    </h2>
                    <h5 class="mb-4">
                        Tahun Ajaran <strong>2025/2026</strong>
                    </h5>

                    <p class="mb-4">
                        Sistem PPDB Online SMA Wilayah Brebes yang
                        transparan, cepat, dan akuntabel.
                    </p>

                    <a href="<?= base_url('auth/daftar') ?>" class="btn btn-success btn-lg mr-2">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </a>
                    <a href="<?= base_url('pengumuman') ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-bullhorn"></i> Pengumuman
                    </a>
                </div>

                <div class="col-md-6 text-center">
                    <img src="<?= base_url('ppdb/ppdb1.jpg') ?>"
                         class="img-fluid rounded hero-img"
                         alt="PPDB Online">
                </div>

            </div>
        </div>
    </div>

    <!-- ================= STATISTIK ================= -->
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-user-graduate"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Pendaftar</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success">
                    <i class="fas fa-male"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Laki-laki</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="info-box shadow-sm">
                <span class="info-box-icon bg-warning">
                    <i class="fas fa-female"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Perempuan</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

    </div>

    <!-- ================= DESKRIPSI ================= -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <h4 class="text-center text-primary mb-4">
                PPDB Online SMA Wilayah Brebes
            </h4>

            <p>
                <strong>PPDB Online</strong> adalah sistem layanan pendaftaran
                yang dirancang untuk memfasilitasi proses
                <strong>Penerimaan Peserta Didik Baru (PPDB)</strong> secara daring,
                mulai dari pendaftaran, seleksi, hingga pengumuman hasil seleksi
                secara <strong>transparan, cepat, dan akuntabel</strong>.
            </p>

            <p>
                Melalui sistem ini, calon peserta didik dapat melakukan
                pendaftaran tanpa harus datang langsung ke sekolah,
                sehingga mempermudah akses layanan pendidikan bagi masyarakat.
            </p>

            <hr>

            <h6 class="fw-bold">Persyaratan Calon Peserta Didik Baru</h6>

            <ul class="list-unstyled mt-3">
                <li class="mb-2">
                    <i class="fas fa-check-circle text-success mr-2"></i>
                    Berusia maksimal 21 tahun pada saat pendaftaran
                </li>
                <li class="mb-2">
                    <i class="fas fa-check-circle text-success mr-2"></i>
                    Memiliki ijazah atau Surat Keterangan Lulus (SKL)
                </li>
                <li class="mb-2">
                    <i class="fas fa-check-circle text-success mr-2"></i>
                    Melengkapi data diri dan data orang tua/wali
                </li>
                <li class="mb-2">
                    <i class="fas fa-check-circle text-success mr-2"></i>
                    Mengunggah dokumen sesuai ketentuan
                </li>
            </ul>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
