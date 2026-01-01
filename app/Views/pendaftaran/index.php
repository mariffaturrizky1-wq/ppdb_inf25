<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>


<div class="container-fluid py-4">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Header -->
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary mb-1">
                    <i class="fa-solid fa-user-graduate me-2"></i>
                    Pendaftaran Peserta Didik Baru
                </h3>
                <p class="text-muted mb-0">
                    Silakan lengkapi formulir pendaftaran dengan data yang benar
                </p>
            </div>

            <!-- Card Form -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4 p-md-5">

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success d-flex align-items-center">
                            <i class="fa-solid fa-circle-check me-2"></i>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('pendaftaran/simpan') ?>" method="post">

                        <!-- Data Pribadi -->
                        <h6 class="fw-semibold text-secondary mb-3">
                            <i class="fa-solid fa-id-card me-2"></i>
                            Data Pribadi
                        </h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control form-control-lg" placeholder="Nama sesuai ijazah" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NISN</label>
                                <input type="number" name="nisn" class="form-control form-control-lg" placeholder="Nomor Induk Siswa Nasional" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control form-control-lg" placeholder="Nama sekolah asal" required>
                        </div>

                        <hr class="my-4">

                        <!-- Pilihan Sekolah -->
                        <h6 class="fw-semibold text-secondary mb-3">
                            <i class="fa-solid fa-school me-2"></i>
                            Pilihan Sekolah Tujuan
                        </h6>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-semibold">Sekolah Tujuan</label>
                                <select name="id_sekolah" class="form-select form-select-lg" required>
                                    <option value="">— Pilih Sekolah —</option>
                                    <?php foreach ($sekolah as $s): ?>
                                        <option value="<?= $s['id_sekolah'] ?>">
                                            <?= $s['nama_sekolah'] ?> (Kuota: <?= $s['kuota'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">Nilai Rata-rata</label>
                                <input type="number" step="0.01" name="nilai" class="form-control form-control-lg" placeholder="Contoh: 87.50" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Submit -->
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fa-solid fa-lock me-1"></i>
                                Data Anda tersimpan dengan aman
                            </small>

                            <button class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                <i class="fa-solid fa-paper-plane me-2"></i>
                                Kirim Pendaftaran
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
