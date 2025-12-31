<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<style>
/* ================= DISDIK PROVINSI PREMIUM ================= */
.home-disdik {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    background: #f4f6f9;
}

/* BACKGROUND IMAGE */
.home-disdik img.bg {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: 0;
    transform: scale(1.08);
}

/* OVERLAY LEBIH ELEGAN */
.home-disdik::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        rgba(8,35,90,.92),
        rgba(13,71,161,.78),
        rgba(255,255,255,.85)
    );
    z-index: 1;
}

/* LIGHT EFFECT HALUS */
.home-disdik::after {
    content: "";
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at top left, rgba(255,255,255,.18), transparent 40%),
        radial-gradient(circle at bottom right, rgba(255,193,7,.18), transparent 45%);
    z-index: 2;
    animation: floatBG 22s ease-in-out infinite;
}

@keyframes floatBG {
    0% { transform: translate(0,0); }
    50% { transform: translate(-18px,-12px); }
    100% { transform: translate(0,0); }
}

/* CONTENT */
.home-content {
    position: relative;
    z-index: 3;
    padding: 70px 0 40px;
}

/* HERO */
.hero-disdik {
    background: linear-gradient(135deg,#0a2a66,#0d47a1);
    color: #fff;
    border-radius: 20px;
    padding: 55px;
    box-shadow: 0 30px 60px rgba(0,0,0,.25);
}

/* ANIMASI SCROLL */
.reveal {
    opacity: 0;
    transform: translateY(50px);
    transition: all .9s ease;
}
.reveal.show {
    opacity: 1;
    transform: translateY(0);
}

/* STAT BOX */
.info-box {
    border-radius: 14px;
}

/* SECTION PUTIH */
.section-clean {
    background: #fff;
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0 18px 40px rgba(0,0,0,.08);
}

/* JALUR PPDB */
.jalur-card {
    border-radius: 18px;
    padding: 35px 25px;
    background: #fff;
    transition: .4s ease;
    height: 100%;
    box-shadow: 0 14px 30px rgba(0,0,0,.08);
}
.jalur-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 28px 60px rgba(0,0,0,.18);
}

.jalur-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    color: #fff;
    margin: 0 auto 18px;
}

.zonasi { background:#0d47a1; }
.afirmasi { background:#2e7d32; }
.prestasi { background:#f9a825; }
.mutasi { background:#6a1b9a; }
</style>

<div class="home-disdik">
    <img src="ppdb/ppdb4.jpg" class="bg" alt="PPDB">

    <div class="home-content">
        <div class="container">

            <!-- HERO -->
            <div class="hero-disdik mb-5 reveal">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-3">
                            Pendaftaran Peserta Didik Baru
                        </h2>
                        <h5 class="mb-3">
                            Tahun Ajaran <strong>2025 / 2026</strong>
                        </h5>
                        <p class="mb-4" style="max-width:520px;">
                            Sistem resmi <strong>PPDB Online SMA</strong> yang dikelola
                            oleh Dinas Pendidikan Provinsi secara
                            <strong>transparan, adil, dan akuntabel</strong>.
                        </p>

                        <a href="<?= base_url('auth/daftar') ?>" class="btn btn-success btn-lg mr-2">
                            <i class="fas fa-user-plus"></i> Daftar Sekarang
                        </a>
                        <a href="<?= base_url('pengumuman') ?>" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-bullhorn"></i> Pengumuman
                        </a>
                    </div>

                    <div class="col-md-6 text-center">
                        <img src="ppdb/ppdb1.jpg" class="img-fluid rounded" style="max-height:260px">
                    </div>
                </div>
            </div>

            <!-- STATISTIK -->
            <div class="row mb-5 reveal">
                <div class="col-md-4">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-info"><i class="fas fa-user-graduate"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Pendaftar</span>
                            <span class="info-box-number">0</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-success"><i class="fas fa-male"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Laki-laki</span>
                            <span class="info-box-number">0</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-warning"><i class="fas fa-female"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Perempuan</span>
                            <span class="info-box-number">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ALUR & JALUR -->
            <div class="section-clean reveal">
                <div class="text-center mb-5">
                    <h3 class="fw-bold text-primary">Alur & Jalur PPDB</h3>
                    <p class="text-muted">
                        Pelaksanaan PPDB dilaksanakan sesuai regulasi Dinas Pendidikan
                    </p>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="jalur-card text-center">
                            <div class="jalur-icon zonasi"><i class="fas fa-map-marked-alt"></i></div>
                            <h5 class="fw-bold">Zonasi</h5>
                            <p>Berdasarkan jarak domisili peserta didik ke sekolah.</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="jalur-card text-center">
                            <div class="jalur-icon afirmasi"><i class="fas fa-hands-helping"></i></div>
                            <h5 class="fw-bold">Afirmasi</h5>
                            <p>Bagi peserta didik dari keluarga tidak mampu.</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="jalur-card text-center">
                            <div class="jalur-icon prestasi"><i class="fas fa-award"></i></div>
                            <h5 class="fw-bold">Prestasi</h5>
                            <p>Prestasi akademik dan non-akademik.</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="jalur-card text-center">
                            <div class="jalur-icon mutasi"><i class="fas fa-exchange-alt"></i></div>
                            <h5 class="fw-bold">Mutasi</h5>
                            <p>Perpindahan tugas orang tua/wali.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
const reveals = document.querySelectorAll('.reveal');
const revealOnScroll = () => {
    reveals.forEach(el => {
        if (el.getBoundingClientRect().top < window.innerHeight - 100) {
            el.classList.add('show');
        }
    });
};
window.addEventListener('scroll', revealOnScroll);
revealOnScroll();
</script>

<?= $this->endSection() ?>
