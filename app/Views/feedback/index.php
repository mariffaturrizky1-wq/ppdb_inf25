<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Feedback PPDB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #eef4ff, #f8f9fb);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feedback-card {
            width: 100%;
            max-width: 720px;
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(0,0,0,.08);
            padding: 32px;
        }

        .feedback-title {
            font-weight: 700;
            background: linear-gradient(90deg, #0d6efd, #20c997);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .form-section {
            margin-bottom: 1.25rem;
        }

        .form-label {
            font-weight: 600;
        }

        .keluhan-item {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 14px;
            cursor: pointer;
            transition: all .2s ease;
        }

        .keluhan-item:hover {
            border-color: #0d6efd;
            background: #f8fbff;
        }

        .preview-img {
            max-height: 200px;
            border-radius: 12px;
            border: 1px solid #ddd;
        }

        .btn-kirim {
            padding: 14px;
            font-size: 1.05rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="feedback-card">

    <div class="text-center mb-4">
        <h3 class="feedback-title mb-1">Formulir Feedback</h3>
        <div class="text-muted">Sampaikan masukan untuk peningkatan layanan PPDB</div>
    </div>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $e): ?>
                    <li><?= esc($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('feedback') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- Nama -->
        <div class="form-section">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control form-control-lg"
                   placeholder="Masukkan nama lengkap" value="<?= old('nama') ?>">
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-section">
            <label class="form-label">Jenis Kelamin</label>
            <div class="d-flex gap-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>
        </div>

        <!-- Keluhan -->
        <div class="form-section">
            <label class="form-label">Keluhan</label>
            <div class="row g-2">
                <?php
                $opsi = [
                    'Antrian terlalu lama',
                    'Aplikasi lelet',
                    'Pelayanan kurang'
                ];
                ?>
                <?php foreach ($opsi as $o): ?>
                    <div class="col-md-4">
                        <label class="keluhan-item w-100">
                            <input type="checkbox" class="form-check-input me-2" name="keluhan[]" value="<?= esc($o) ?>">
                            <?= esc($o) ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Alamat -->
        <div class="form-section">
            <label class="form-label">Alamat</label>
            <select class="form-select mb-2" name="provinsi">
                <option value="">Pilih Provinsi</option>
                <option>Jawa Tengah</option>
            </select>
            <select class="form-select mb-2" name="kabupaten">
                <option value="">Pilih Kabupaten / Kota</option>
                <option>Brebes</option>
            </select>
            <select name="kecamatan" class="form-select mb-2">
                <option value="">Pilih Kecamatan</option>
                <?php foreach ($kecamatan as $kec): ?>
                    <option value="<?= $kec['nama_kecamatan'] ?>">
                        <?= $kec['nama_kecamatan'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="desa" class="form-select mb-2">
                <option value="">Pilih Desa</option>
                <?php foreach ($desa as $d): ?>
                    <option value="<?= $d['nama'] ?>">
                        <?= $d['nama'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

        <!-- Upload Foto -->
        <div class="form-section">
            <label class="form-label">Unggah Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control" id="fotoInput" accept="image/*">
            <div class="mt-3 d-none" id="previewBox">
                <img id="previewImg" class="preview-img img-fluid">
            </div>
        </div>

        <!-- Keterangan -->
        <div class="form-section">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" rows="4" class="form-control"
                    placeholder="Tuliskan detail feedback..."><?= old('keterangan') ?></textarea>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary w-100 btn-kirim">
            Kirim Feedback
        </button>
    </form>

    <div class="text-center mt-3 small text-muted">
        Terima kasih atas partisipasi Anda 🙏
    </div>

</div>

<script>
    const fotoInput = document.getElementById('fotoInput');
    const previewBox = document.getElementById('previewBox');
    const previewImg = document.getElementById('previewImg');

    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) {
            previewBox.classList.add('d-none');
            return;
        }
        previewImg.src = URL.createObjectURL(file);
        previewBox.classList.remove('d-none');
    });
</script>

</body>
</html>
