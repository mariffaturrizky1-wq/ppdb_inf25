<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="container py-5 pengumuman-detail">
    <a href="<?= base_url('pengumuman') ?>" class="text-decoration-none">
        ← Kembali ke Pengumuman
    </a>

    <div class="card mt-4 shadow-sm">
        <div class="card-body p-5">
            <span class="badge bg-primary mb-3">
                <?= esc($p['kategori']) ?>
            </span>

            <h3><?= esc($p['judul']) ?></h3>

            <div class="text-muted mb-4">
                <?= date('d F Y', strtotime($p['created_at'])) ?>
            </div>

            <div class="pengumuman-isi">
                <?= $p['isi'] ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
