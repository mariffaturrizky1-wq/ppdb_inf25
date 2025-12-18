<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<style>
/* Hover tombol */
.btn-warning:hover,
.btn-danger:hover {
    transform: scale(1.08);
    transition: 0.2s ease;
}

/* Hover baris tabel */
.table tbody tr:hover {
    background-color: #f4f6f9;
}

/* Header tabel */
.table thead th {
    background-color: #1f2933;
    color: white;
    font-size: 14px;
}

/* Padding tabel */
.table td, .table th {
    padding: 10px;
}

/* Badge kuota */
.badge {
    font-size: 12px;
    padding: 6px 10px;
    border-radius: 12px;
}

.btn-success {
    border-radius: 20px;
    padding: 6px 18px;
}

</style>


<div class="col-sm-12">
    <div class="card shadow border-0">
        <div class="card-header bg-gradient-primary">
    <h3 class="card-title text-white">
        <i class="fas fa-school"></i> Data Sekolah
    </h3>
    <div class="card-tools float-right">

    <div class="card-tools">
    <button type="button"
            class="btn btn-light btn-sm btn-add"
            data-toggle="modal"
            data-target="#add">
        <i class="fas fa-plus-circle"></i> Tambah Sekolah
    </button>
</div>

</div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show">
    <i class="fas fa-check-circle"></i>
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php endif; ?>

<div class="card card-outline card-primary mb-3">
    <div class="card-body py-2"></div>
    <!--CODE UNTUK SEARCH-->
    <form method="get" action="<?= base_url('sekolah') ?>" class="mb-3">
    <div class="d-flex justify-content-start">
        <div class="input-group input-group-sm" style="max-width: 320px;">
            <input type="text"
                name="keyword"
                class="form-control form-control-sm shadow-sm"
                placeholder="🔍 Cari sekolah..."
                value="<?= esc($keyword ?? '') ?>">

            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <a href="<?= base_url('sekolah') ?>" class="btn btn-secondary btn-sm ml-2">
    Reset
        </a>
    </div>
</form>

    <!-- CODE BUAT TABEL #KYY -->

    <table id="example2" class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Sekolah</th>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($sekolah as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['id_sekolah']; ?></td>
                            <td><?= $row['nama_sekolah']; ?></td>
                            <td title="<?= $row['alamat'] ?>">
                                <?= substr($row['alamat'], 0, 50) ?>...
                            </td>


                            <td class="text-center">
                                <?php
                                $kuota = $row['kuota'];
                                $badge = 'success';
                                if ($kuota < 300) $badge = 'danger';
                                elseif ($kuota < 350) $badge = 'warning';
                                ?>
                                <span class="badge badge-<?= $badge ?>">
                                <?= $kuota ?>
                                </span>
                            </td>

    <!-- EDIT -->
    <td class="text-center">
    <div class="btn-group" role="group">
        <button 
            class="btn btn-warning btn-sm btn-edit"
            data-id="<?= $row['id_sekolah'] ?>"
            data-nama="<?= $row['nama_sekolah'] ?>"
            data-alamat="<?= $row['alamat'] ?>"
            data-kuota="<?= $row['kuota'] ?>"
            data-toggle="modal"
            data-target="#modalEdit"
            title="Edit">
            <i class="fas fa-edit"></i>
        </button>

        <button 
            class="btn btn-danger btn-sm btn-delete"
            data-id="<?= $row['id_sekolah'] ?>"
            data-toggle="modal"
            data-target="#modalDelete"
            title="Hapus">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
                    </div>

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Add Sekolah</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <?= form_open('sekolah/insertData') ?>
            <?= csrf_field() ?>

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>

                <div class="form-group">
                    <label>Kuota</label>
                    <input type="number" name="kuota" class="form-control" placeholder="Kuota" required>
                </div>

            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>

            <?= form_close() ?>

        </div>
    </div>
</div>

<!-- Modal Edit -->

<div class="modal fade" id="modalEdit">
    <div class="modal-dialog">
        <div class="modal-content">

        <form action="<?= base_url('sekolah/update') ?>" method="post">
        <?= csrf_field() ?>

        <!-- INI YANG WAJIB ADA -->
        <input type="hidden" name="id_sekolah" id="edit_id">

        <div class="modal-body">
        <div class="form-group">
            <label>Nama Sekolah</label>
            <input type="text" id="edit_nama" name="nama_sekolah" class="form-control">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea id="edit_alamat" name="alamat" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Kuota</label>
            <input type="number" id="edit_kuota" name="kuota" class="form-control">
        </div>
        </div>

        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
        </form>

        </div>
    </div>
</div>

<!-- MODAL HAPUS -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">

        <form action="<?= base_url('sekolah/delete') ?>" method="post">
        <?= csrf_field() ?>

        <input type="hidden" name="id_sekolah" id="delete_id">

        <div class="modal-body">
            <p class="text-danger font-weight-bold">
                Data yang dihapus tidak bisa dikembalikan!
            </p>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Batal
            </button>
        </div>

        </form>

        </div>
    </div>
</div>



<<?= $this->section('script') ?>

        <script>
        $(document).on('click', '.btn-edit', function () {
            console.log('EDIT CLICKED', $(this).data());

            $('#edit_id').val($(this).data('id'));
            $('#edit_nama').val($(this).data('nama'));
            $('#edit_alamat').val($(this).data('alamat'));
            $('#edit_kuota').val($(this).data('kuota'));
        });

        </script>

<?= $this->endSection() ?>

<<?= $this->section('script') ?>

        <script>
        $(document).on('click', '.btn-delete', function () {
            console.log('DELETE CLICKED', $(this).data());

            $('#delete_id').val($(this).data('id'));
        });
        </script>

<?= $this->endSection() ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
