<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="container mt-4">

    <h4 class="mb-4">Pendaftaran Tahun Ajaran 2025/2026</h4>

    <div class="row">

        <!-- KONTEN KIRI -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <img src="<?= base_url('ppdb/ppdb1.jpg') ?>"
                        class="img-fluid"
                        alt="PPDB Online">
                </div>
            </div>
        </div>

<!-- KONTEN KANAN -->
<div class="col-md-4">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <strong>Estimasi Pendaftar Tahun 2025</strong>
        </div>

        <div class="card-body">

            <div class="info-box mb-3">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-user-graduate"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Pendaftar</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>

            <div class="info-box mb-3">
                <span class="info-box-icon bg-success">
                    <i class="fas fa-male"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Laki-laki</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>

            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning">
                    <i class="fas fa-female"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Perempuan</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->

</div> <!-- /.col-md-4 -->


<!-- DESKRIPSI BERANDA -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header">
                <strong>Beranda</strong>
            </div>

            <div class="card-body">

                <h5 class="text-primary text-center mb-3">
                    PPDB Online SMA Wilayah Brebes Tahun Ajaran 2025/2026
                </h5>

                <p>
                    PPDB Online adalah sistem layanan yang dirancang untuk memfasilitasi
                    proses <strong>Penerimaan Peserta Didik Baru (PPDB)</strong> secara
                    daring, mulai dari pendaftaran, seleksi, hingga pengumuman hasil
                    seleksi yang dilakukan secara <strong>transparan, cepat, dan akuntabel</strong>.
                </p>

                <p>
                    Melalui sistem ini, calon peserta didik dapat melakukan proses
                    pendaftaran tanpa harus datang langsung ke sekolah, sehingga
                    mempermudah akses layanan pendidikan bagi masyarakat.
                </p>

                <hr>

                <h6><strong>Persyaratan Calon Peserta Didik Baru</strong></h6>

                <ol>
                    <li>Berusia maksimal 21 tahun pada saat pendaftaran.</li>
                    <li>Memiliki ijazah atau Surat Keterangan Lulus (SKL).</li>
                    <li>Melengkapi data diri dan data orang tua/wali.</li>
                    <li>Melampirkan dokumen persyaratan sesuai ketentuan.</li>
                </ol>

            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>
