<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="container py-5 pengumuman-wrapper ppdb-premium">
    <div class="text-center mb-5">
        <h3 class="fw-bold">📢 Pengumuman PPDB</h3>
        <p class="text-muted">
            Informasi resmi seputar PPDB Tahun Ajaran 2025/2026
        </p>
    </div>

    <?php if (!empty($pengumuman)): ?>
    <div class="row g-4">
    <?php foreach ($pengumuman as $p): ?>
        <div class="col-md-4">
            <div class="card pengumuman-card h-100 <?= $p['is_active'] == 1 ? 'highlight' : '' ?>">
                <span class="badge bg-primary badge-kategori">
                    <?= esc($p['kategori']) ?>
                </span>

                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="pengumuman-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div>
                            <h5><?= esc($p['judul']) ?></h5>
                            <div class="pengumuman-meta">
                                <?= date('d M Y', strtotime($p['created_at'])) ?>
                            </div>
                        </div>
                    </div>

                    <p><?= esc($p['ringkasan']) ?></p>

                    <a href="<?= base_url('pengumuman/'.$p['slug']) ?>"
                        class="btn btn-outline-primary btn-sm btn-detail">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach ?>


    </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            Belum ada pengumuman tersedia
        </div>
    <?php endif ?>
</div>

<?= $this->endSection() ?>
